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
    <title>Form</title>
    <style>
        .error {
            color: red;
        }
    </style>
</head>

<body>
    <h2>Author Form</h2>
    <form action="process_form.php" method="POST">
        <p>

            <input type="hidden" name="id" value="<?= old("id") ?>">
            <span class="error"><?= error("id") ?><span>
        </p>
        <p>
            first name:
            <input type="text" name="first_name" value="<?= old("first_name") ?>">
            <span class="error"><?= error("name") ?><span>
        </p>
        <p>
            last name:
            <input type="text" name="last_name" value="<?= old("last_name") ?>">
            <span class="error"><?= error("ppsn") ?><span>
        </p>
        <button type="submit">Submit</button>
    </form>
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