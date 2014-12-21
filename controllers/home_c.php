<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 03.12.2014
 * Time: 0:15
 */

class Home_C extends Controller{
    private $home;
    private $user;


    public function index($name = "Alex"){

        $data = array();
        $home = new View();
        $user = new Model();

        if(Session_h::exist('success')){
            $data['info'] = Session_h::get('success');
            Session_h::remove('success');

        }elseif(Session_h::exist('errors')){
            $data['errors']=Session_h::get('errors');
            Session_h::remove('errors');
        }
        $home->setData($data);
        $home->display('main', array('jumbotron'));
    }

    public function login(){
        $login = new User_m();
        $login->login();
        Redirect_h::redirect('home');

    }

    public function logout(){
        Session_h::remove('logged');
        session_destroy();
        Redirect_h::redirect('home');
    }

}