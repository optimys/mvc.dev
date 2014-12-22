<?php

/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 11.12.2014
 * Time: 2:20
 */
class Input_h
{
    public static function get($field, $type=null){
        $type = is_null($type) ? $_POST : $type;
        return isset($type[$field]) ? $type[$field] : false;
    }
}