<?php
require_once "../etc/config.php";
require_once "../etc/global.php";

try {
    if ($_SERVER["REQUEST_METHOD"] !== "POST") {
        throw new Exception("Invalid request method");
    }

    $deleteId = $_POST["delete-id"];
    $story = Story::findById($deleteId);
    $story->delete();
    redirect("./StoryOverview.php");

} catch (Exception $ex) {
    echo $ex->getMessage();
    exit();
}
?>