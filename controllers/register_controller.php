<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 03.12.2014
 * Time: 0:15
 */
class Register_Controller extends Controller{
    public function index(){
        $data['title']="Register page";
        $register = new View();
        $register->setData($data);
        $register->display('main',array('page_header','registr_form'));
    }

    public function newUser(){
        $check      = new Validator_Helper();
        $register   = new View();
        $model      = new Model();

        $hasErrors = $check->checkForm($_POST);
        if( is_null($hasErrors) ){
            $model->insert('users', array(
                'login'     => Input_helper::get($_POST,'login'),
                'password'  => Input_helper::get($_POST,'password'),
                'email'     => Input_helper::get($_POST,'email')
            ));
            $register->display('main',array('jumbotron','panel'));
        }else{
            if(!is_null($hasErrors)){
                var_dump($hasErrors);
                echo "FUCK!";
            };
            $data['errors'] = $hasErrors;
            $data['title']="Error while register";
            $register->setData($data);
            $register->display('main',array('page_header','error_list','registr_form'));
        }
    }

}