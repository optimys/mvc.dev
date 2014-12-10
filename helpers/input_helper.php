<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 11.12.2014
 * Time: 2:20
 */

class Input_helper {
    public static function get($type, $field){
        if(isset($type[$field])){
            return $type[$field];
        }else{
            return Errors_helper::getLabel("no such input",'danger');
        }
    }
} 