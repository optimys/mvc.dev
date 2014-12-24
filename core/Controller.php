<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 03.12.2014
 * Time: 0:28
 */

/**
 * Class Controller
 * This is base class for all controllers
 */
abstract class Controller {

    protected $view;
    protected $model;

    public function __construct(){
        $this->view = new View();
        $this->model= new User_m();
    }

    public  function __call($name, $args){
        $data['errors'] = Info_h::getParagraph("No such method",'warning');
        $error = new View();
        $error->setData($data);
        $error->display('error',array('panel'));
    }
    public  function index(){
        $data = "This is default method ".__METHOD__;
        $home = new View();
        $home->setData($data)->display('main');

    }
} 