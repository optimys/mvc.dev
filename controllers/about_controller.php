<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 03.12.2014
 * Time: 0:15
 */
class About_Controller extends Controller{
    public function index(){
        echo "I am About controller!";
    }

    public function __call($name, $arguments){
        echo "That method {$name} don't exist in present controller";
    }

}