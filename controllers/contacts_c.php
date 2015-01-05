<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 04.12.2014
 * Time: 1:34
 */

class Contacts_c extends Controller {
    public function index(){
        $contact = new View();
        $contact->display('main',array(
            'page_header',
            'contact_form',
            'panel'), $this->model);
    }

} 