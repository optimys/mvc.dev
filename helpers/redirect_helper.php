<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 14.12.2014
 * Time: 3:58
 */

class Redirect_helper {
    public static  function redirect($direction){
        header("Location: http://{$_SERVER['HTTP_HOST']}/{$direction}/");
    }
} 