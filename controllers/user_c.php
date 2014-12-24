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
        $this->view->setData($data);
        $this->view->display('main',array('page_header','user_profile'), $this->model);
    }

    public function change_password($action){
        $data['title'] = "Change your password here";
        if($action) {
            if($this->model->changePassword()){
                Redirect_h::redirect('user');
            }
        }
        $this->view->setData($data);
        $this->view->display('main', array('page_header', 'change_pass', 'error_list'), $this->model);
    }

    public function update_user_info($action){
        $data['title'] = "Change your info here";
        if($action) {
            if(!$errors = $this->model->getErrors()){
                $this->model->updateUserInfo();//Add check if updating is false
                Session_h::set('success', Info_h::getLabel('Info has been updated', 'success'));
                Redirect_h::redirect('user');
            }else{
                $data['errors']=$errors;
            }
        }
        $this->view->setData($data);
        $this->view->display('main',array('page_header','error_list','update_form'), $this->model);
    }

    public function login(){
        $this->model->login();
        Redirect_h::redirect('home');
    }

    public function logout(){
        session_destroy();
        Redirect_h::redirect('home');
    }

}