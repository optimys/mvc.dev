<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 03.12.2014
 * Time: 0:15
 */
class Register_Controller extends Controller{
    public function index(){
        echo "I am Register controller index";
    }

    public function __call($name, $arguments){
        echo "That method <b>{$name}</b> don't exist in present controller";
    }
}