<?php

/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 29.12.2014
 * Time: 23:56
 */
class Hash_h
{
    public static function hash()
    {
        return md5( uniqid() );
    }
}