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


    public function index(){
        $home = new View();

        if(Session_h::exist('success')){
            $data['info'] = Session_h::get('success');
            Session_h::remove('success');

        }elseif(Session_h::exist('errors')){
            $data['errors']=Session_h::get('errors');
            Session_h::remove('errors');
        }

        $home->display('main', array('jumbotron'));
    }

}