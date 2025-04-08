<?php
require_once "../etc/config.php";
require_once "../etc/global.php";
require_once "../StoryEdit/storyValidator.php";

try {
    if ($_SERVER["REQUEST_METHOD"] !== "POST") {
        throw new Exception("Invalid request method");
    }
    $validator = new StoryValidator($_POST);
    $valid = $validator->validate();
    if ($valid) {
        $story = new Story($_POST);
        $story->article = formatHTMLArticle($story->article);
        // print_r($story);
        $story->save();
        redirect(".");
    } else {
        $errors = $validator->errors();
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION["form-data"] = $_POST;
        $_SESSION["form-errors"] = $errors;
        redirect(".");
        echo ("no success");
        // print_r($_SESSION["form-errors"]);
    }
} catch (Exception $ex) {
    echo $ex->getMessage();
    exit();
}


?>