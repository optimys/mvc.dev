<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 03.12.2014
 * Time: 0:15
 */
class About_Controller extends Controller{
    public function index($name = "Alex"){
        $data=array();
        $data['title']="About page";
        $about = new Home_view();
        $about->setData($data);
        $about->display('main',array('page_header','list_group', 'panel'));
    }


}