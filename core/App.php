<?php
/**
 * This is test file
 */

/**
 * Info about class
 *
 * This class is for  Routing system
 * and to provide some background information or textual references.
 */
class App
{
    /**
     * Postfix that added when consructing
     * @property string $postfix
     */
    static $postfix = "_c";
    /**
     * Contain full address from url
     * @property string $path
     */
    private $path;
    /**
     * Default method of controller
     * @property string $method
     *
     */
    private $method = "index";

    /**
     * Default controller
     * @property string $controller
     *
     */
    private $controller = "Home_c";

    private function __construct()
    {
        $this->path = trim($_GET['url'], '/');
        $this->getRouter();
    }

    /**
     * For getting Router
     * @return object of object execute function
     */
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

    /**
     * Check if Controller is exists
     * @param $controller string
     * @return bool
     */
    private function controllerExist($controller)
    {
        $controller = ucfirst($controller . self::$postfix);
        if (file_exists("controllers/{$controller}.php")) {
            $this->controller = new $controller;
            return true;
        } else {
            return false;
        }
    }

    /**
     * For getting new instance of app
     *
     * A *description*, that can span multiple lines, to go _in-depth_ into the details of this element
     * and to provide some background information or textual references.
     *
     * @return object of App
     */
    public static function getNewApp()
    {
        return new App();
    }


}