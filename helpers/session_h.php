<?php

/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 14.12.2014
 * Time: 4:09
 */
class Session_h
{
    public static function set($name, $value){
        $_SESSION[$name] = $value;
    }

    public static function get($name){
        return $_SESSION[$name];
    }

    public static function exist($name){
        return isset($_SESSION[$name]) ? true : false;
    }

    public static function remove($name){
        unset($_SESSION[$name]);
    }
} 