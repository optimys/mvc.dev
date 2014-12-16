<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 03.12.2014
 * Time: 0:15
 */

class Home_Controller extends Controller{
    private $home;
    private $user;


    public function index($name = "Alex"){

        $data = array();
        $home = new View();
        $user = new Model();

        if(Session_helper::exist('success')){
            $data['info'] = Session_helper::get('success');
            Session_helper::remove('success');

        }elseif(Session_helper::exist('errors')){
            $data['errors']=Session_helper::get('errors');
            Session_helper::remove('errors');
        }
        $home->setData($data);
        $home->display('main', array('jumbotron'));
    }

    public function login(){
        $login = new User_model();
        $login->login();
        Redirect_helper::redirect('home');

    }

    public function logout(){
        Session_helper::remove('logged');
        Redirect_helper::redirect('home');
    }

}