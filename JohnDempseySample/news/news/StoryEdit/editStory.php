<?php
require_once "../etc/config.php";
require_once "../etc/global.php";

if (!$_SERVER["REQUEST_METHOD"] === "POST") {
    redirect(".");
}

try {
    $data = Story::findById($_POST["edit-id"]);
} catch (PDOException $ex) {
    echo $ex->getMessage();
}

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$_SESSION["form-data"] = (array) $data;
redirect("storyForm.php");
print_r($_SESSION["form-data"]);