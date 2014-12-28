<?php

/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 23.12.2014
 * Time: 2:45
 */
class FileUpload_m
{

    static public function getPathToAvatar($inputName)
    {
        $fileName="uploads/users/pictures/avatar/default-avatar.png";
        if (empty($_FILES[$inputName]['error'])) {
            $fileName = "uploads/users/pictures/avatar/".Session_h::get("logged") . '_avatar.jpeg';
            copy($_FILES[$inputName]['tmp_name'], $fileName);
        }
        return $fileName;
    }


}