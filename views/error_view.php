<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 05.12.2014
 * Time: 0:20
 */

class Error_view extends View {
    private $massage;

    public function __construct(){
        parent::__construct();
    }

    public function  setData($data){
        $this->massage = Errors_helper::getPrettyMessage($data,'warning');
    }

    public function display($page){
        $baseUrl = self::$baseUrl;
        $massage = $this->massage;
        require_once("/views/layouts/{$page}_tpl.php");
    }
} 