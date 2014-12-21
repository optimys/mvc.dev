<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 11.12.2014
 * Time: 2:20
 */

class Input_h {
    public static function get($type, $field){
        if(isset($type[$field])){
            return $type[$field];
        }else{
            return Info_h::getLabel("no such input",'danger');
        }
    }
} 