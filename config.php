<?php
session_start();
const BASEURL = "http//mvc/";
require_once('core/init.php');

spl_autoload_register(function($class){
    $class = strtolower($class);
    $baseDir = __DIR__ . DIRECTORY_SEPARATOR;
    $folder = explode("_", $class)[1];
    require_once( "{$baseDir}{$folder}s".DIRECTORY_SEPARATOR.$class.".php");
});

