<?php

declare(strict_types=1);

namespace core;


class Controller
{
    /**
     * @var Model|object
     */
    protected object $model;

    /**
     * @var View|object
     */
    protected object $view;

    /**
     * @var Input|object
     */
    protected object $input;

    /**
     * @var Auth|object
     */
    protected object $auth;

    /**
     * Controller constructor.
     */
    public function __construct()
    {
        $this->model = new Model();
        $this->view = new View();
        $this->input = new Input();
        $this->auth = new Auth();
    }

    /**
     * Return name class
     * @return string
     */
    public function __toString(): string
    {
        return get_class($this);
    }

    /**
     * Get the name of the view and return a low-case string
     * @return string
     */
    protected function getNameView(): string
    {
        $nameTemplate = explode('\Controller', $this->__toString());
        return mb_strtolower($nameTemplate[1]) . '.php';
    }
}