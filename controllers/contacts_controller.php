<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 04.12.2014
 * Time: 1:34
 */

class contacts_controller extends Controller {
    public function index($name = "Alex"){
        $data=array();
        $data['title']="Contact page";
        $contact = new Home_view();
        $contact->setData($data);
        $contact->display('main',array('page_header','contact_form','panel'));
    }

} 