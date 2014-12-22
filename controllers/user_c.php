<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 03.12.2014
 * Time: 0:17
 */
class User_C extends Controller{

    public function index(){
        if($data['info'] = Session_h::get('success')){
            Session_h::remove('success');
        }
        $data['title']="Users page";
        $view = new View();
        $view->setData($data);
        $view->display('main',array('page_header','user_profile'));
    }

    public function change_password($action){
        $data['title'] = "Change your password here";
        if($action) {
            $model = new User_m();
            if($model->changePassword()){
                Redirect_h::redirect('user');
                return;
            }
        }
        $view = new View();
        $view->setData($data);
        $view->display('main', array('page_header', 'change_pass', 'error_list'));
    }

    public function update_user_info($action){
        $data['title'] = "Change your info here";
        if($action) {
            $model = new User_m();
            if(!$errors = $model->getErrors()){
                $model->updateUserInfo();//Add check if updating is false
                Session_h::set('success', Info_h::getLabel('Info has been updated', 'success'));
                Redirect_h::redirect('user');
            }else{
                $data['errors']=$errors;
            }
        }
        $view = new View();
        $view->setData($data);
        $view->display('main',array('page_header','error_list','update_form'));
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