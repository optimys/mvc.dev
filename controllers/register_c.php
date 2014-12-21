<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 03.12.2014
 * Time: 0:15
 */
class Register_C extends Controller{
    public function index(){
        $data['title']="Register page";
        if($data['errors'] = Session_h::get('errors')){
            $data['title']="Error while register";
            Session_h::remove('errors');
        }
        $register = new View();
        $register->setData($data);
        $register->display('main',array('page_header','error_list','registr_form'));
    }

    public function newUser(){
        $model = new User_m();

        if(!$model->getErrors()){
            $model->newUser();
            Session_h::set('success', Info_h::getBeckGroundParagraph("You registered success!","success"));
            Redirect_h::redirect('home');
        }else{
            Session_h::set('errors',$model->getErrors());
            Redirect_h::redirect('register');
        }
    }

}