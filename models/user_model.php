<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 03.12.2014
 * Time: 0:23
 */
class User_model extends Model{
    private $formValid;//true | array('errors')


    public function __construct(){
        $validator = new Validator_Helper();
        $this->formValid = $validator->checkForm($_POST);
    }

    public function getValid(){
        return $this->formValid;
    }
}