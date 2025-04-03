<?php
require_once "./etc/config.php";

try {
    if (!isset($_GET["id"])) {
        throw new Exception("Story ID not provided.");
    }
    $id = $_GET["id"];
    $s = Story::findById($id);
    if ($s == null) {
        throw new Exception("Story not found.");
    }
    $category = Category::findById($s->category_id);
    $related_stories = Story::findByCategory($category->id, $options = array('limit' => 3, 'order_by' => 'updated_at', 'order' => 'DESC'));
} catch (Exception $e) {
    echo $e->getMessage();
    exit();
}
?>
<html>

<head>
    <title>Story</title>

    <link rel="stylesheet" href="css/all.min.css" />
    <link rel="stylesheet" href="css/reset.css" />
    <link rel="stylesheet" href="css/grid.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/style_view_story.css" />
</head>

<body>
    <!-- <?php require_once "./etc/navbar.php"; ?> -->
    <?php require_once "./etc/flash_message.php"; ?>
    <div class="container">
        <div class="width-8 viewingStory">
            <div class="titleBox">
                <div class="titleRectangle"></div>
                <div class="titleJunk">
                    <h3><?= Category::findById($s->category_id)->name ?></h3>
                    <h1><?= $s->headline ?></h1>
                    <h4>By
                        <?= Author::findById($s->author_id)->first_name . " " . Author::findById($s->author_id)->last_name ?>
                    </h4>
                    <p><?= date_format(new DateTime($s->created_at), "l, jS M Y") ?></p>
                </div>
            </div>
            <div class="viewingContent">
                <div class="viewingImg">
                    <img src="<?= $s->img_url ?>" />
                </div>
                <div>
                    <p><?= $s->article ?></p>
                </div>
            </div>
        </div>



        <div class="width-4 relatedStories">
            <div class="relatedTitle">
                <div class="rectangleVert"></div>
                <h2>RELATED STORIES</h2>
            </div>
            <?php foreach ($related_stories as $rs) { ?>
                <?php if ($rs->id == $s->id) {
                    continue;
                } ?>
                <div class="width-4 smallStory">
                    <img src="<?= $rs->img_url ?>">
                    <div class="content">
                        <div class="rectangle"></div>
                        <div class="text">
                            <h4><?= Category::findById($rs->category_id)->name ?></h4>
                            <h3><a href="view_story.php?id=<?= $rs->id ?>"><?= $rs->headline ?></a></h3>
                            <div class="timeStamp">
                                <p><?= $rs->created_at ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
</body>

</html>