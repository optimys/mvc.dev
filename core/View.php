<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 04.12.2014
 * Time: 2:02
 */

class View {

    private $data;
    protected static $baseUrl;

    public function __construct(){
        self::$baseUrl = $_SERVER['HTTP_HOST'];
    }

    public function  setData($data){
        $this->data = $data;
        return $this;
    }

    public function display($page, $blocks=false){
        $data = $this->data;
        require_once("/views/layouts/{$page}_tpl.php");
    }

} 