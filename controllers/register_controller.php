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
        $register = new Home_view();
        $register->setData($data);
        $register->display('main',array('page_header','registr_form'));
    }

}