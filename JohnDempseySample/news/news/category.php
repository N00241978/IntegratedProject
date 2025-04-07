<?php
require_once "./etc/config.php";

try {
    if (!isset($_GET["id"])) {
        throw new Exception("Category ID not provided.");
    }
    $categoryId = $_GET["id"];
    $category = Category::findById($categoryId);
    if ($category == null) {
        throw new Exception("Category not found.");
    }
    // $stories = Story::findByCategory($categoryId);
    $stories = Story::findByCategory($categoryId, $options = array('limit' => 4));
    // $stories = Story::findByCategory($categoryId, $options = array('limit' => 3, 'offset' => 2));
} catch (Exception $e) {
    echo $e->getMessage();
    exit();
}
?>
<html>

<head>
    <title><?= $category->name ?></title>
    <link rel="stylesheet" href="css/all.min.css" />
    <link rel="stylesheet" href="css/reset.css" />
    <link rel="stylesheet" href="css/grid.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/category.css" />
</head>

<body>
    <?php require_once "./etc/navbar.php"; ?>
    <?php require_once "./etc/flash_message.php"; ?>
    <div class="container">
        <div class="width-12 catTitle">
            <div class="catRectangle"></div>
            <h1><?= $category->name ?></h1>
        </div>
        <!-- Medium Stories -->
        <?php foreach ($stories as $s) { ?>
            <div class="width-3 mediumStory">
                <div class="rectangle"></div>
                <div class="content">
                    <div class="text">
                        <h4><?= Category::findById($s->category_id)->name ?></h4>
                        <img src="<?= $s->img_url ?>" />
                        <h3><a href="view_story.php?id=<?= $s->id ?>"><?= $s->headline ?></a></h3>
                        <p><?= substr($s->article, 0, 90) ?>...</p>
                    </div>
                    <div class="auther_date">
                        <p><?= Author::findById($s->author_id)->first_name . " " . Author::findById($s->author_id)->last_name ?>
                        </p>
                        <p>|</p>
                        <p><?= $s->created_at ?></p>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</body>

</html>