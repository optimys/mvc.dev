<?php

/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 03.12.2014
 * Time: 1:18
 */
class App
{
    private $path;
    static $postfix     = "_controller";
    private $method     = "index";
    private $controller = "Home_controller";

    public static function getNewApp()
    {
        return new App();
    }

    private function __construct()
    {
        $urlPartsArray = parse_url($_SERVER['REQUEST_URI']);
        $this->path = trim($urlPartsArray['path'], '/');
        $this->getRouter();
    }

    public function getRouter()
    {
        $parts = explode("/", $this->path);

        if($parts[0]===""){
            $object = new $this->controller;
            $objectMethod = $this->method;
            return $object->$objectMethod();
        }else {
            $controller = array_shift($parts);          // 0-вой элемент всегда будет контроллером
            $method = count($parts) ? array_shift($parts) : "index";   //если что-то осталось, извлекаме и присваеваем методу
            $params = count($parts) ? $parts : false;                   // если что-то осталось то это уже параметы, пусть будут в массиве.

            if ($this->controllerExist($controller)) {
                $object = $this->controller;
                return $object->$method($params);
            }
        }
    }

    private function controllerExist($controller)
    {
        $controller = ucfirst($controller . self::$postfix);
        try {
            $this->controller = new $controller;
            return true;
        } catch (Exception $e) {
            return false;
        }
    }



}