<?php

/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 03.12.2014
 * Time: 0:15
 */
class Home_C extends Controller
{
    public function index()
    {

        $this->view->display('main', array('jumbotron'), $this->model);
    }

}