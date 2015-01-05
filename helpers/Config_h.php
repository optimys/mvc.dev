<?php

/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 27.12.2014
 * Time: 14:57
 */
class Config_h
{
    private static $config = array(
        'baseUrl' => 'http://mvc.dev/',
        'mysql' => array(
            'user' => 'root',
            'db' => 'mvcdev',
            'host' => 'localhost',
            'password' => ""
        ),
        'sessionNames' => array(
            'errors', 'info', 'logged'
        ),
        'social' => array(
            'facebook'=>array(
                'FbId'  => "1547080372195701",
                'FbSecret' => "3572134e7c25a5320d706e361e42e172"
            )
        )

    );

    public static function get($param)
    {
        $value="";
        array_walk_recursive(self::$config,function($val , $key) use($param, &$value){
            if($key === $param){
              $value = $val;
            }
        });
        return $value;
    }

    public static function getList($source){
        return self::$config[$source];
    }
}