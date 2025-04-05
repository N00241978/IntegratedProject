<?php require_once "./etc/config.php";
try { // $stories=Story::findAll(); //
    $stories = Story::findAll($options = array('limit' => 2));
    // $stories = Story::findAll($options = array('limit' => 2, 'offset' => 2));

    // $authorId = 7;
    // $stories = Story::findByAuthor($authorId);
    // $stories = Story::findByAuthor($authorId, $options = array('limit' => 3));
    // $stories = Story::findByAuthor($authorId, $options = array('limit' => 3, 'offset' => 2));

    // $categoryId = 4;
    // $stories = Story::findByCategory($categoryId);
    // $stories = Story::findByCategory($categoryId, $options = array('limit' => 3));
    // $stories = Story::findByCategory($categoryId, $options = array('limit' => 3, 'offset' => 2));

    $catagoryId = 6;
    // $stories = Story::findByLocation($locationId);
    // $stories = Story::findByLocation($locationId, $options = array('limit' => 3));
    $stories = Story::findByLocation($catagoryId, $options = array('limit' => 2, 'offset' => 0));

    $catagoryId2 = 4;
    // $stories = Story::findByLocation($locationId);
    // $stories = Story::findByLocation($locationId, $options = array('limit' => 3));
    $stories2 = Story::findByLocation($catagoryId2, $options = array('limit' => 1, 'offset' => 0));

    $catagoryId3 = 4;
    // $stories = Story::findByLocation($locationId);
    // $stories = Story::findByLocation($locationId, $options = array('limit' => 3));
    $stories3 = Story::findByLocation($catagoryId3, $options = array('limit' => 1, 'offset' => 0));

    $catagoryId4 = 3;
    // $stories = Story::findByLocation($locationId);
    // $stories = Story::findByLocation($locationId, $options = array('limit' => 3));
    $stories4 = Story::findByLocation($catagoryId4, $options = array('limit' => 5, 'offset' => 0));

    $catagoryId5 = 4;
    // $stories = Story::findByLocation($locationId);
    // $stories = Story::findByLocation($locationId, $options = array('limit' => 3));
    $stories5 = Story::findByLocation($catagoryId5, $options = array('limit' => 1, 'offset' => 0));

    $catagoryId6 = 4;
    // $stories = Story::findByLocation($locationId);
    // $stories = Story::findByLocation($locationId, $options = array('limit' => 3));
    $stories6 = Story::findByLocation($catagoryId6, $options = array('limit' => 1, 'offset' => 0));
} catch (Exception $e) {
    echo $e->getMessage();
    exit();
}
?>
<html>

<head>
    <title>Home Page</title>

    <link rel="stylesheet" href="css/all.min.css" />
    <link rel="stylesheet" href="css/reset.css" />
    <link rel="stylesheet" href="css/grid.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/style_view_story.css" />


</head>

<body>
    <?php require_once "./etc/navbar.php"; ?>

    <div class="width-12 mainTitle1">
        <h1>INTEGRATED</h1>
    </div>
    <div class="width-12 container">
        <!-- Small Story List -->
        <div class="width-4 sidePanel">
            <div class="width-4 panelTitle">
                <div class="rectangleVert"></div>
                <h2>TOP PICKS</h2>
            </div>

            <?php foreach ($stories4 as $s) { ?>
                <div class="width-4 smallStory">
                    <img src="<?= $s->img_url ?>">
                    <div class="content">
                        <div class="rectangle"></div>
                        <div class="text">
                            <h4><?= Category::findById($s->category_id)->name ?></h4>
                            <h3><a href="view_story.php?id=<?= $s->id ?>"><?= $s->headline ?></a></h3>
                            <div class="timeStamp">
                                <p><?= $s->created_at ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <!-- Main Content -->
        <div class="width-8 mainContent">
            <!-- Large Story -->
            <?php foreach ($stories2 as $s) { ?>
                <div class="width-8 largeStory">
                    <img src="<?= $s->img_url ?>" />
                    <div class="content">
                        <div class="body">
                            <div class="rectangle12"></div>
                            <div class="text">
                                <h4><?= Category::findById($s->category_id)->name ?></h4>
                                <h1><a href="view_story.php?id=<?= $s->id ?>"><?= $s->headline ?></a></h1>
                                <h3><?= substr($s->article, 0, 200) ?>...</h3>
                            </div>
                        </div>
                        <div class="auther_date">
                            <p><?= Author::findById($s->author_id)->first_name . " " . Author::findById($s->author_id)->last_name ?>
                            </p>
                            <p><?= $s->created_at ?></p>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <div class="width-8">
                <?php foreach ($stories as $s) { ?>
                    <div class="width-4 mediums1">
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
            </div>
        </div>
    </div>
    </div>
</body>

</html>