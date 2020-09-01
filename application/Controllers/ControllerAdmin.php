<?php

declare(strict_types=1);

namespace Controllers;

use Core\Controller;
use Exceptions\NotValidInputException;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

class ControllerAdmin extends Controller
{
    /**
     * Show page with template admin
     */
    public function actionIndex()
    {
        try {
            echo $this->view->render('admin/' . $this->getNameView(),
                [
                    'adm' => $this->auth->isAuth()
                ]);
        } catch (LoaderError $e) {
        } catch (RuntimeError $e) {
        } catch (SyntaxError $e) {
        }
    }

    /**
     * Check data validity
     * @return array
     */
    private function validate()
    {
        $name = $pass = '';

        try {
            $name = $this->validator->checkStr($_POST['name']);
            $pass = $this->validator->checkStr($_POST['pass']);
        } catch (NotValidInputException $e) {
            echo $e->getMessage();
        }

        return ['name' => $name, 'pass' => $pass];
    }

    /**
     * Check the data and try to log in
     */
    public function actionAuth(): void
    {
        $dataAuth = $this->validate();
        if ($this->validator->isErrors() === false && $this->isAjax === true) {
            if (!$this->auth->auth($dataAuth['name'], $dataAuth['pass'])) {
                $this->ajaxResponse(false, 'Password or login is not correct!');
            } else {
                $this->ajaxResponse(true, 'Successfully!');
            }
        }
    }

    /**
     * Log out of the account
     */
    public function actionLogOut(): void
    {
        $this->auth->out();
        $this->ajaxResponse(true,'Successfully logged out!');
    }
}
