<?php

require_once "../etc/config.php";

$stories = Story::findAll();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Story Editing Article</title>
</head>

<body>
    <div class="container">
        <a href="<?= $ABSURL ?>">
            <h1>Home</h1>
        </a>
        <table border=2>
            <thead>
                <tr>
                    <th>id</th>
                    <th>headline</th>
                    <th>short_headline</th>
                    <th>article</th>
                    <th>img_url</th>
                    <th>author_id</th>
                    <th>category_id</th>
                    <th>location_id</th>
                    <th>created_at</th>
                    <th>updated_at</th>
            </thead>
            <tbody>
                <?php foreach ($stories as $story) { ?>

                    <tr>
                        <td><?= $story->id ?></td>
                        <td><?= $story->headline ?></td>
                        <td><?= $story->short_headline ?></td>
                        <td>
                            <div class="preview" id="preview-<?= $story->id ?>">
                                <?= htmlspecialchars(substr($story->article, 0, 100)) ?>...
                                <button type="button" onclick="expandArticle(<?= $story->id ?>)">Expand</button>
                            </div>
                            <div class="full-article" id="full-article-<?= $story->id ?>" style="display: none;">
                                <?= nl2br(htmlspecialchars($story->article)) ?>
                                <button type="button" onclick="collapseArticle(<?= $story->id ?>)">Collapse</button>
                            </div>
                        </td>
                        <td><?= $story->img_url ?></td>
                        <td><?= $story->author_id ?></td>
                        <td><?= $story->category_id ?></td>
                        <td><?= $story->location_id ?></td>
                        <td><?= $story->created_at ?></td>
                        <td><?= $story->updated_at ?></td>
                        <td style="disaply: flex">
                            <form method="POST" action="./deleteStory.php">
                                <input type="hidden" value="<?= $story->id ?>" name="delete-id">
                                <input type="submit" value="delete">
                            </form>
                        </td>
                        <td>
                            <form method="POST" action="./editStory.php">
                                <input type="hidden" value="<?= $story->id ?>" name="edit-id">
                                <input type="submit" value="edit">
                            </form>
                        </td>
                    </tr>

                <?php } ?>


            </tbody>
        </table>
    </div>
    <script>
        function expandArticle(id) {
            document.getElementById('preview-' + id).style.display = 'none';
            document.getElementById('full-article-' + id).style.display = 'block';
        }

        function collapseArticle(id) {
            document.getElementById('full-article-' + id).style.display = 'none';
            document.getElementById('preview-' + id).style.display = 'block';
        }
    </script>

</body>



</html>