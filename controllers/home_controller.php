<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 03.12.2014
 * Time: 0:15
 */

class Home_Controller extends Controller{
    public function index($name = "Alex"){
        $home = new Home_view();
        $home->setData("Hello");
        $home->display('main',array('jumbotron','panel'));
    }

}