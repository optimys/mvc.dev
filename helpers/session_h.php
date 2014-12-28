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

    public static function flash($name, $text=null)
    {
        if (self::exist($name)) {
            $info = self::get($name);
            self::remove($name);
            return $info;
        }elseif(!is_null($text)) {
            self::set($name, $text);
            return false;
        }
        return false;
    }


} 