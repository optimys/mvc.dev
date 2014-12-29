<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 03.12.2014
 * Time: 0:17
 */
class User_C extends Controller{

    public function index(){
        $this->view->display('main',array('page_header','user_profile'), $this->model);
    }

    public function change_password($action){
        if($action) {
            if($this->model->changePassword()){
                Redirect_h::redirect('user');
            }
        }
        $this->view->display('main', array('page_header', 'change_pass', 'error_list'), $this->model);
    }

    public function update_user_info($action){
        if($action) {
            if($this->model->updateUserInfo()){
                Redirect_h::redirect('user');
            }
        }
        $this->view->display('main',array('page_header','error_list','update_form'), $this->model);
    }

    public function login(){
        $this->model->login();
        Redirect_h::redirect('home');
    }

    public function logout(){
        $this->model->logOut();
        Redirect_h::redirect('home');
    }

}