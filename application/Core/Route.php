<?php

namespace Core;

use Exceptions\{NotExistClassException, NotExistMethodException, NotExistFileException};

class Route extends Base
{
    /**
     * @var string
     */
    private string $controllerName;

    /**
     * @var string
     */
    private string $actionName;

    /**
     * Route constructor.
     * Fill in the required data, controller name and method name.
     */
    public function __construct()
    {
        $this->controllerName = 'main';
        $this->actionName = 'index';
        parent::__construct();
    }

    /**
     * Starting the router, get uri
     * if url contains "?" then we take the line before it
     * remove all empty values from the array, reverse it
     * check how many elements are in the url, if 0 then go to the main page
     * check if there is a controller with this name, if not, then send a 404 error
     * Check if there is a class with this name and create a new instance of the class
     * if the method is also in the url, we check its existence in the object
     */
    public function initialize(): void
    {
        $parseUrl = parse_url($_SERVER['REQUEST_URI']);

        if (!empty($parseUrl['path'])) {
            $routes = explode('/', $parseUrl['path']);

            if (!empty($parseUrl['query'])) {
                parse_str($parseUrl['query'], $queryUrl);
            }

            $arrRoutes = array_reverse(array_diff($routes, ['']));

            try {
                if (count($arrRoutes) > 0) {
                    $nameController = $arrRoutes[1] ?? $arrRoutes[0];
                    $this->validator->checkFileExist(parent::PATH_APPLICATION . '/' . parent::PATH_CONTROLLERS . '/Controller' . ucfirst($nameController) . '.php');

                    if (!empty($arrRoutes[1])) {
                        $this->actionName = $arrRoutes[0];
                    }

                    $this->controllerName = $nameController;
                }
            } catch (NotExistFileException $e) {
                self::errorPage404();
            }
        }

        $controllerName = parent::PATH_CONTROLLERS . '\Controller' . ucfirst($this->controllerName);
        $controller = '';

        try {
            $this->validator->checkClassExist($controllerName);
            $controller = new $controllerName;
        } catch (NotExistClassException $e) {
            self::errorPage404();
        }

        $actionName = 'action' . ucfirst($this->actionName);

        try {
            $this->validator->checkMethodExist($controller, $actionName);
            $controller->$actionName();
        } catch (NotExistMethodException $e) {
            self::errorPage404();
        }
    }

    /**
     * Redirect 404 page
     */
    public static function errorPage404(): void
    {
        $host = 'http://' . $_SERVER['HTTP_HOST'] . '/404';
        header("HTTP/1.1 404 Not Found");
        header('Location:' . $host);
    }
}