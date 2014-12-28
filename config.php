<?php
session_start();

require_once('core/init.php');
require_once('vendor/autoload.php');

$GLOBALS['config'] = array(
    'baseUrl' => 'http://mvc.dev/',
    'mysql'=>array(
        'user' => 'root',
        'db'=>'mvcdev',
        'host'=>'localhost',
        'password'=>""
    ),
    'sessionNames' => array(
        'errors', 'info', 'logged'
    ),

);


spl_autoload_register(function ($class) {
    $class = strtolower($class);
    $baseDir = __DIR__ . DIRECTORY_SEPARATOR;
    switch (explode("_", $class)[1]) {
        case "c":
            $folder = "controllers";
            break;
        case "h":
            $folder = "helpers";
            break;
        case "m":
            $folder = "models";
            break;
        case "v":
            $folder = "views";
            break;
    }

    require_once("{$baseDir}{$folder}" . DIRECTORY_SEPARATOR . $class . ".php");
});

