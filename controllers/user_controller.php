<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 03.12.2014
 * Time: 0:17
 */
class User_Controller extends Controller{

    public function index($name = "Alex"){
        $data['title']="Users page";
        $user = new View();
        $user->setData($data);
        $user->display('main',array('page_header','user_profile','user_profile','user_profile','user_profile'));
    }

    public function newUser(){
        echo "I am User newUser controller method";
    }

    public function showAllUsers(){
        echo "I am USer showAllUsers controller method";
    }

}