<?php
session_start();
const BASEURL = "http//mvc/";
require_once('core/init.php');

spl_autoload_register(function($class){
    $class = strtolower($class);
    $baseDir = __DIR__ . DIRECTORY_SEPARATOR;
    switch(explode("_", $class)[1]){
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

    require_once( "{$baseDir}{$folder}".DIRECTORY_SEPARATOR.$class.".php");
});

