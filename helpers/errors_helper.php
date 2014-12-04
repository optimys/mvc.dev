<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 05.12.2014
 * Time: 0:34
 */

class Errors_helper {
    private  $message;

    public function __construct(){

    }

    private  function setMessage(){

    }

    static  function getPrettyMessage($message, $type='info'){
      return "<div class='alert alert-{$type}' role='alert'>".strtoupper($message)."</div>";
    }
} 