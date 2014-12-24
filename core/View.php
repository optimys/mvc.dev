<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 04.12.2014
 * Time: 2:02
 */

/**
 * Class View
 * THis is base class for all Views
 */
class View
{

    public $data = array();

    public function  setData($data = array())
    {
        $this->data = $data;
        return $this;
    }

    public function display($page, $blocks = array(), User_m $user)
    {
        $baseUrl = "http://{$_SERVER['HTTP_HOST']}/";
        $data = $this->data;
        require_once("/views/layouts/{$page}_tpl.php");
    }

} 