<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 03.12.2014
 * Time: 0:15
 */

class Home_Controller extends Controller{
    public function index($name = "Alex"){
        echo "Hello {$name}";
    }

    public function __call($name, $arguments){
        echo "That method <b>{$name}</b> don't exist in present controller<br>";
        $this->index();
    }
}