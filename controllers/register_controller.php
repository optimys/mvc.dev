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
        if(Session_helper::exist('errors')){
            $data['title']="Error while register";
            $data['errors'] = Session_helper::get('errors');
            Session_helper::remove('errors');
        }
        $register = new View();
        $register->setData($data);
        $register->display('main',array('page_header','error_list','registr_form'));
    }

    public function newUser(){
        $model = new User_model();

        if(!$model->getErrors()){
            $model->newUser();
            Session_helper::set('success', Info_helper::getBeckGroundParagraph("You registered success!","success"));
            Redirect_helper::redirect('home');
        }else{
            Session_helper::set('errors',$model->getErrors());
            Redirect_helper::redirect('register');
        }
    }

}