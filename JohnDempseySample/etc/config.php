<?php

$ABSURL = "http://localhost/~N00241978/integrated_project_AngusWalker/IntegratedProject/JohnDempseySample/";

$dir = dirname(__DIR__);

require_once $dir . '/etc/global.php';

spl_autoload_register(function ($class) {
    global $dir;

    $class_path = str_replace('\\', '/', $class);

    $file = $dir . '/classes/' . $class_path . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
});

?>