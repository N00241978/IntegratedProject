<?php

try {
    $categories = Category::findAll();
} catch (Exception $e) {
    echo $e->getMessage();
    exit();
}
?>
<ul class="navbar">
    <li><a href="index.php">Home</a></li>
    <?php foreach ($categories as $c) { ?>
        <div class="navBar">
            <a href="category.php?id=<?= $c->id ?>"><?= $c->name ?></a>
        </div>
    <?php } ?>
</ul>