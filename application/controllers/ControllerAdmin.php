<?php

declare(strict_types=1);

namespace controllers;

use core\Controller;
use exceptions\NotValidInputException;

class ControllerAdmin extends Controller
{
    /**
     * Show page with template admin
     */
    public function actionIndex()
    {
        echo $this->view->render($this->getNameView(), null, $this->auth->isAuth());
    }

    /**
     * Check data validity
     * @return array
     */
    private function validate()
    {
        $name = $pass = '';

        try {
            $name = $this->input->checkStr($_POST['name']);
            $pass = $this->input->checkStr($_POST['pass']);
        } catch (NotValidInputException $e) {
            echo $e->getMessage();
        }

        return ['name' => $name, 'pass' => $pass];
    }

    /**
     * Check the data and try to log in
     */
    public function actionAuth()
    {
        $dataAuth = $this->validate();
        if ($this->input->isErrors() === false) {
            if (!$this->auth->auth($dataAuth['name'], $dataAuth['pass'])) {
                echo json_encode([
                    'success' => false,
                    'error' => true,
                    'auth' => '<br>Password or login is not correct'
                ]);
            } else {
                echo json_encode(['success' => true, 'error' => false]);
            }
        }
    }

    /**
     * Log out of the account
     */
    public function actionLogOut()
    {
        $this->auth->out();
    }
}
