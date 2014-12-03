<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 04.12.2014
 * Time: 1:34
 */

class contacts_controller extends Controller {
    public function index(){
        $home = new View();
        $home->setData();
        $home->display();
    }

    public function __call($name, $args){

    }
} 