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

    public function register(){
        $user       = new User_model();
        $register   = new View();

        $check = $user->getValid();
        if( empty($check) ){
            $register->setData(array(
                'message'=>array(
                    'type'=>'info',
                    'text'=>$user->getValid()
                )
            ));
            $register->display('main',array('jumbotron','panel'));
        }else{
            $data['error'] = $check;
            $register->setData($data);
            $register->display('main',array('page_header','registr_form'));
        }
    }

}