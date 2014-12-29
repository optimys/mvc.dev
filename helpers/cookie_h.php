<?php

/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 29.12.2014
 * Time: 23:58
 */
class Cookie_h
{
    public static function setCookie($name, $value)
    {
        setcookie($name, $value, time() + 216000, '/');
    }

    public static function unSetCookie($name)
    {
        setcookie($name, "", time() - 20, '/');
    }

    public static function isCookieSet($name)
    {
        if (isset($_COOKIE['remember'])) {
            return true;
        }
    }

    public static function getCookie($name)
    {
        return $_COOKIE[$name];
    }
}