<?php

/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 03.12.2014
 * Time: 1:18
 */

/**
 * Class App
 * This is Router
 */
class App
{
    private $path;
    static $postfix = "_controller";
    private $method = "index";
    private $controller = "Home_controller";

    public static function getNewApp()
    {
        return new App();
    }

    private function __construct()
    {
        $this->path = trim($_GET['url'], '/');
        $this->getRouter();
    }

    public function getRouter()
    {
        $parts = explode("/", $this->path);
        if ($parts[0] !== "") {
            $controller = array_shift($parts);          // 0-вой элемент всегда будет контроллером
            $method = count($parts) ? array_shift($parts) : $this->method;   //если что-то осталось, извлекаме и присваеваем методу
            $params = count($parts) ? $parts : false;                   // если что-то осталось то это уже параметы, пусть будут в массиве.

            if ($this->controllerExist($controller)) {
                $object = $this->controller;
                return $object->$method($params);
            }
        }
        $object = new $this->controller;
        $objectMethod = $this->method;
        return $object->$objectMethod();
    }

    private function controllerExist($controller)
    {
        $controller = ucfirst($controller . self::$postfix);
        if(file_exists("controllers/{$controller}.php")) {
            $this->controller = new $controller;
            return true;
        } else{
            return false;
        }
    }


}