<?php

/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 03.12.2014
 * Time: 0:15
 */
class Register_C extends Controller
{
    public function index()
    {
        $this->view->display('main', array('page_header', 'error_list', 'registr_form'), $this->model);
    }

    public function newUser()
    {
        if ($this->model->newUser()) {
            Redirect_h::redirect('home');
        } else {
            Redirect_h::redirect('register');
        }
    }

}