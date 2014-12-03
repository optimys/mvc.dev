<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 03.12.2014
 * Time: 0:28
 */

abstract class Controller {
    abstract function __call($name, $args);
    abstract function index();
} 