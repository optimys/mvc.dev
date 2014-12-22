<?php

/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 23.12.2014
 * Time: 2:45
 */
 class FileUpload_m
{
    static private function fileUpload($inputName){
        $fileName="";
        if (isset($_FILES[$inputName])) {
            $fileName .= Input_h::get('login') . '_avatar.jpeg';
            copy($_FILES[$inputName]['tmp_name'], "/path/");
            return $fileName;
        }
    }

    static public function getPathToFile($inputName){
        return self::fileUpload($inputName);
    }


}