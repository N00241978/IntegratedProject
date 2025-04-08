<?php
require_once "../etc/config.php";
require_once "../etc/global.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// echo "<pre>";
// if (array_key_exists("form-data", $_SESSION)) {
//     print_r($_SESSION["form-data"]);
// }
// if (array_key_exists("form-errors", $_SESSION)) {
//     print_r($_SESSION["form-errors"]);
// }
// echo "</pre>";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Story Edit Form</title>
    <style>
        .error {
            color: red;
        }
    </style>
</head>

<body>

    <h2>Story Edit Form</h2>

    <form action="storyProcess_form.php" method="POST">
        <p>

            <input type="hidden" name="id" value="<?= old("id") ?>">
            <span class="error"><?= error("id") ?></span>
        </p>
        <p>
            Headline:
            <input type="text" name="headline" value="<?= old("headline") ?>">
            <span class="error"><?= error("headline") ?></span>
        </p>
        <p>
            Sub Heading:
            <input type="text" name="short_headline" value="<?= old("short_headline") ?>">
            <span class="error"><?= error("short_headline") ?></span>
        </p>
        <p>
            Article:
            <textarea name="article"> <?= parsePlainArticle(old("article")) ?> </textarea>
            <span class="error"><?= error("article") ?></span>

        </p>
        <p>
            Image Url:
            <input type="text" name="img_url" value="<?= old("img_url") ?>">
            <span class="error"><?= error("img_url") ?></span>
        </p>
        <p>
            Author ID:
            <input type="number" name="author_id" value="<?= old("author_id") ?>">
            <span class="error"><?= error("author_id") ?></span>
        </p>
        <p>
            Category ID:
            <input type="number" name="category_id" value="<?= old("category_id") ?>">
            <span class="error"><?= error("category_id") ?></span>
        </p>
        <p>
            Location ID:
            <input type="number" name="location_id" value="<?= old("location_id") ?>">
            <span class="error"><?= error("location_id") ?></span>
        </p>
        <p>
            Created Date:
            <input type="datetime-local" name="created_at" value="<?= old("created_at") ?>">
            <span class="error"><?= error("created_at") ?></span>
        </p>
        <p>
            Updated Date:
            <input type="datetime-local" name="updated_at" value="<?= old("updated_at") ?>">
            <span class="error"><?= error("updated_at") ?></span>
        </p>
        <button type="submit">Submit</button>
    </form>

    <a href="<?= $ABSURL ?>">
        <h4>Home</h4>
    </a>

</body>

</html>
<?php
if (array_key_exists("form-data", $_SESSION)) {
    unset($_SESSION["form-data"]);
}
if (array_key_exists("form-errors", $_SESSION)) {
    unset($_SESSION["form-errors"]);
}
?>