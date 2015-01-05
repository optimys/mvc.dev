<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 06.01.2015
 * Time: 3:13
 */

class AllInOneSoc {
    private $facebook;

    public function __construct(){
        $this->facebook     = new FacebookUser();
//        $this->twetter      = new TwetterUser();
//        $this->linkedin     = new LinkedinUser();
//        $this->google       = new GoogleUser();
//        $this->mailru       = new MailruUser();
        return $this;
    }

    public function getLoginUrl($source=null){
        if($this->check($source)){
            return $this->$source->__METHOD__;
        }
        return false;
    }

    public function getProfile($source=null){
        if($this->check($source)){
            return $this->$source->__METHOD__;
        }
        return false;
    }

    private function check($source=null){
        if($source && in_array($source, Config_h::getList('social'))){
            return true;
        }
            return false;
    }

}