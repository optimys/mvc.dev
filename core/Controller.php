<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 03.12.2014
 * Time: 0:28
 */

abstract class Controller {
    public  function __call($name, $args){
        $data = "This method {$name}, doesn't exists";
        $error = new Error_view();
        $error->setData($data);
        $error->display('error');
    }
    public  function index(){
        $data = "This is default method ".__METHOD__;
        $home = new View();
        $home->setData($data)->display('main');

    }
} 