<?php

try {
    $categories = Category::findAll();
} catch (Exception $e) {
    echo $e->getMessage();
    exit();
}
?>
<div class="width-12 navbar">
    <ul>
        <li><a href="index.php">Home</a></li>
        <?php foreach ($categories as $c) { ?>
            <li><a href="category.php?id=<?= $c->id ?>"><?= $c->name ?></a></li>
        <?php } ?>
    </ul>
    <div class="width-12 navbarBottom">

    </div>
</div>