<?php
require_once "../etc/config.php";
require_once "../etc/global.php";
require_once "../AuthorEdit/authorValidator.php";

try {
    if ($_SERVER["REQUEST_METHOD"] !== "POST") {
        throw new Exception("Invalid request method");
    }
    $validator = new AuthorValidator($_POST);
    $valid = $validator->validate();
    if ($valid) {
        // redirect the browser to the success page
        $author = new Author($_POST);
        print_r($author);
        $author->save();
        redirect(".");
    } else {
        $errors = $validator->errors();
        // redirect the browser back to the form
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION["form-data"] = $_POST;
        $_SESSION["form-errors"] = $errors;
        redirect(".");
        echo ("no success");
        print_r($_SESSION["form-errors"]);
    }
} catch (Exception $ex) {
    echo $ex->getMessage();
    exit();
}


?>