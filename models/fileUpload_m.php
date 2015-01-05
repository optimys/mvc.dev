<?php

/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 23.12.2014
 * Time: 2:45
 */
class FileUpload_m
{

    static public function getPathToAvatar($source)
    {
        $fileName = "uploads/users/pictures/avatar/";
        if (!is_array($source)) {
            $fileName .=Input_h::get("login") . '_avatar.jpeg';
            copy($_FILES[$source]['tmp_name'], $fileName);
        }else{
            copy($source['avatar_url'], $fileName.$source['id'].".jpeg");
        }
        return $fileName.$source['id'].".jpeg";
    }


}