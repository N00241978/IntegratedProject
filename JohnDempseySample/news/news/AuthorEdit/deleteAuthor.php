<?php
require_once "../etc/config.php";
require_once "../etc/global.php";

try {
    if ($_SERVER["REQUEST_METHOD"] !== "POST") {
        throw new Exception("Invalid request method");
    }

    $deleteId = $_POST["delete-id"];
    $author = Author::findById($deleteId);
    $author->delete();
    redirect("./AuthorOverview.php");

} catch (Exception $ex) {
    echo $ex->getMessage();
    exit();
}
?>