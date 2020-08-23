<?php

declare(strict_types=1);

namespace controllers;

use core\Controller;

class Controller404 extends Controller
{
    /**
     * Show page with template 404
     */
    function actionIndex()
    {
        echo $this->view->render($this->getNameView());
    }

}