<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 03.12.2014
 * Time: 1:18
 */

class App {

    private $url;
    static $postfix = "_controller";
    private $method = "";
    private $controller;

    public static function getNewApp(){
        return new App();
    }
    private function __construct(){
        $this->url = $this->parceUrl();
    }

    private  function parceUrl()
    {
        $url = parse_url($_SERVER['REQUEST_URI']);
        if ($url['path'] !== "/") {
            $path = trim($url['path'], "/");
            return explode("/", $path);
        }else{
            return false;
        }
    }

    public function getRouter(){
        if($this->url){
            $parts = $this->url;
            $controller = array_shift($parts);                       // 0-вой элемент всегда будет контроллером
            $method = count($parts) ? array_shift($parts) : "index";   //есди что-то осталось, извлекаме и присваеваем методу
            $params = count($parts) ? $parts : false;                   // если что-то осталось то это уже параметы, пусть будут в массиве.

            if($this->controllerExist($controller, $method) ){
                $object = $this->controller;
                $objectMethod = $this->method;
                return $object->$objectMethod($params);
            }else{
                return "Incorrect data!";
            }
        }else{
            $default = new Home_Controller();
            $default -> index();
        }
    }

    private function controllerExist($controller, $method = false){
        $controller = ucfirst($controller.self::$postfix);
        try{
            $this->controller = new $controller;
            return $this->methodExist($this->controller , $method);
        }catch (Exception $e){
            $this->controller = false;
            return false;
        }
    }

    private function methodExist($object, $method){
        if(method_exists($object, $method)){
            $this->method = $method;
            return $object;
        }else{
            $this->method = "index";
        }
    }




} 