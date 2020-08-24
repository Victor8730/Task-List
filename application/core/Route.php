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
        $this->controllerName = 'main';
        $this->actionName = 'index';
    }

    /**
     *starting the router
     */
    public function start(): void
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            if (strpos($_SERVER['REQUEST_URI'], '?') == true) {
                $routes = explode('/', strstr($_SERVER['REQUEST_URI'], '?', true));
            } else {
                $routes = explode('/', $_SERVER['REQUEST_URI']);
            }

            $arrRoutes = array_diff($routes, ['']);
            $arrRoutes = array_reverse($arrRoutes);
            if (count($arrRoutes) > 0) {
                try {
                    $this->checkFile('application/controllers/Controller' . ucfirst($arrRoutes[0]) . '.php', false);
                    $this->controllerName = $arrRoutes[0];
                } catch (NotExistFileException $e) {
                    try {
                        if (!empty($arrRoutes[1])) {
                            $this->checkFile('application/controllers/Controller' . ucfirst($arrRoutes[1]) . '.php',
                                false);
                            $this->controllerName = $arrRoutes[1];
                            $this->actionName = $arrRoutes[0];
                        } else {
                            self::ErrorPage404();
                        }
                    } catch (NotExistFileException $e) {
                        self::ErrorPage404();
                    }
                }
            }
        }

        $controllerName = 'controllers\Controller' . ucfirst($this->controllerName);

        try {
            $this->checkFile('application/controllers/Controller' . ucfirst($this->controllerName) . '.php', false);
        } catch (NotExistFileException $e) {
            self::ErrorPage404();
        }

        $controller = null;

        try {
            if (class_exists($controllerName)) {
                $controller = new $controllerName;
            }
        } catch (NotExistClassException $e) {
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
        $host = 'http://' . $_SERVER['HTTP_HOST'] . '/404';
        header('Location:' . $host);
    }
}