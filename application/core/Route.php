<?php

declare(strict_types=1);

namespace core;

use exceptions\{NotExistClassException, NotExistMethodException, NotExistFileException};

class Route
{
    use Check;

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
     */
    public function __construct()
    {
        $this->controllerName = 'Main';
        $this->actionName = 'index';
    }

    /**
     *starting the router
     */
    public function start(): void
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            if(strpos($_SERVER['REQUEST_URI'], '?') == true){
                $routes = explode('/', strstr($_SERVER['REQUEST_URI'], '?', true));
            }else{
                $routes = explode('/', $_SERVER['REQUEST_URI']);
            }

            if (!empty($routes[1])) {
                $this->controllerName = ucfirst($routes[1]);
            }

            if (!empty($routes[2])) {
                $this->actionName = $routes[2];
            }
        }

        $controllerName = 'controllers\Controller' . $this->controllerName;

        try {
            $this->checkFile('application/controllers/Controller' . $this->controllerName . '.php', false);
        } catch (NotExistFileException $e) {
            self::ErrorPage404();
        }

        $controller = null;

        try{
            $controller = new $controllerName;
        }catch(NotExistClassException $e){
            self::ErrorPage404();
        }

        $actionName = 'action' . ucfirst($this->actionName);

        try {
            $this->checkMethod($controller, $actionName);
        } catch (NotExistMethodException $e) {
            self::ErrorPage404();
        }
    }

    /**
     * Redirect 404 page
     */
    public static function ErrorPage404(): void
    {
        $host = 'http://' . $_SERVER['HTTP_HOST'] . '/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:' . $host . '404');
    }
}