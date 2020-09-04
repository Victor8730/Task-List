<?php

declare(strict_types=1);

namespace Core;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMException;
use Doctrine\ORM\Tools\Setup;

class Controller extends Base
{
    /**
     * Object model
     * @var Model|object
     */
    protected object $model;

    /**
     * Object view
     * @var \Twig\Environment|object
     */
    protected object $view;

    /**
     * Object authentication
     * @var Auth|object
     */
    protected object $auth;

    /**
     * Working with XMLHttpRequest or not
     * @var bool
     */
    protected bool $isAjax;

    protected object $entityManager;

    /**
     * Controller constructor.
     */
    public function __construct()
    {

        $paths = array(Base::PATH_APPLICATION."/Model");
        $isDevMode = false;

        $dbParams = array(
            'driver' => 'pdo_mysql',
            'user' => 'user',
            'password' => 'dy4obhF46EMMZL80',
            'dbname' => 'task_manager',
        );

        $config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
        try {
            $this->entityManager = EntityManager::create($dbParams, $config);
        } catch (ORMException $e) {
            echo $e->getMessage();
        }
        $this->model = new Model();
        $this->auth = new Auth();
        $loader = new \Twig\Loader\FilesystemLoader(Base::PATH_APPLICATION . '/' . Base::PATH_VIEWS);
        $this->view = new \Twig\Environment($loader, [
            'cache' => Base::PATH_APPLICATION . '/' . Base::PATH_CACHE,
            'auto_reload' => true
        ]);
        $this->isAjax = isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest';
        parent::__construct();
    }

    /**
     * Return name class
     * @return string
     */
    public function __toString(): string
    {
        return get_class($this);
    }

    protected function ajaxResponse(bool $success = true, string $message = ''): void
    {
        $response = array(
            'success' => $success,
            'message' => $message
        );

        exit(json_encode($response));
    }

    /**
     * Get the name of the view and return a low-case string
     * @return string
     */
    protected function getNameView(): string
    {
        $nameTemplate = explode('\Controller', $this->__toString());
        return mb_strtolower($nameTemplate[1]) . '.twig';
    }

}