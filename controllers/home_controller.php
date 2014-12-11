<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 03.12.2014
 * Time: 0:15
 */

class Home_Controller extends Controller{
    public function index($name = "Alex"){

        $user = new Model();
        $user->get('users',array(
            'field' => 'login',
            'operator' => '=',
            'value' => 'alex'
        ));
        $message = "DB results: ".$user->result['name'] ." | ". $user->result['email'];

        $home = new View();
        $home->setData( array('errors'=>Errors_helper::getBeckGroundParagraph($message, 'success')));
        $home->display('main',array('jumbotron','panel'));
    }

}