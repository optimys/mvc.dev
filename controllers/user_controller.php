<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 03.12.2014
 * Time: 0:17
 */
class User_Controller extends Controller{

    public function index(){
        if($data['info'] = Session_helper::get('success')){
            Session_helper::remove('success');
        }
        $data['title']="Users page";
        $user = new View();
        $user->setData($data);
        $user->display('main',array('page_header','user_profile'));
    }

    public function change_password($action){
        $data['title'] = "Change your password here";
        if($action) {
            $model = new User_model();
            if(!$errors = $model->getErrors()){
                $model->changePassword();//Add check if updating is false
                Session_helper::set('success', Info_helper::getLabel('Password changed', 'success'));
                Redirect_helper::redirect('user');
            }else{
                $data['errors']=$errors;
            }
        }
        $view = new View();
        $view->setData($data);
        $view->display('main', array('page_header', 'change_pass', 'error_list'));
    }

    public function update_user_info(){
        //Don't forget to update session data, otherwise data in session wil be not in date!
        if(Session_helper::exist('errors')){

        }else{

        }
    }

}