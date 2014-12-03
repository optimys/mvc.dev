<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 03.12.2014
 * Time: 0:17
 */
class User_Controller extends Controller{
    public function index(){
        echo "I am USer index controller method";
    }

    public function newUser(){
        echo "I am USer newUser controller method";
    }

    public function showAllUsers(){
        echo "I am USer showAllUsers controller method";
    }

    public function __call($name, $arguments){
        echo "That method {$name} don't exist in present controller";
    }
}