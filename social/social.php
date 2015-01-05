<?php

/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 06.01.2015
 * Time: 3:01
 */
abstract class Social
{
    abstract function getLoginUrl();

    abstract function getProfile();
}