<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 04.12.2014
 * Time: 2:02
 */

class View {
    public function __construct($page = "home"){

    }

    public function  setData($data=array()){

    }

    public function display(){
        $data["Title"] = parse_url($_SERVER['REQUEST_URI'])['path'];
        require_once('/views/main/main_tpl.php');
    }

} 