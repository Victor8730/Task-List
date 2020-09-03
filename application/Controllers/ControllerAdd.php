<?php

declare(strict_types=1);

namespace Controllers;

use Core\Controller;
use Exceptions\NotValidInputException;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

class ControllerAdd extends Controller
{
    /**
     * Show page with template add
     */
    public function actionIndex(): void
    {
        try {
            echo $this->view->render('add/' . $this->getNameView() , ['adm' => $this->auth->isAuth()]);
        } catch (LoaderError $e) {
        } catch (RuntimeError $e) {
        } catch (SyntaxError $e) {
        }
    }

    /**
     * Check data validity
     * @return array
     */
    private function validate(): array
    {
        $task = $name = $email = $id = '';
        $status = ($_POST['status'] === 'on') ? 1 : 0;

        try {
            $email = $this->validator->checkEmail($_POST['email']);
        } catch (NotValidInputException $e) {
            echo $e->getMessage();
        }

        try {
            $name = $this->validator->checkStr($_POST['name']);
            $task = $this->validator->checkStr($_POST['task']);
        } catch (NotValidInputException $e) {
            echo $e->getMessage();
        }

        return [$name, $email, $task, $status, date("Y-m-d H:i:s")];
    }

    /**
     * Save valid data and returns json response
     */
    public function actionPost(): void
    {
        $dataOutSide = $this->validate();

        if ($this->validator->isErrors() === false && $this->auth->isAuth() === true) {
            $fields = ['name', 'email', 'task', 'status', 'date_add'];
            $this->model->saveData($fields, $dataOutSide);
            $this->ajaxResponse(true,'Successfully added!');
        }else{
            $this->ajaxResponse(false, 'You need to <a href="/admin" target="_blank">log in</a>');
        }
    }

    /**
     * Updates data if admin is authorized
     */
    public function actionPut(): void
    {
        $id = '';
        $dataOutSide = $this->validate();

        try {
            $id = $this->validator->checkInt((int)$_POST['id-element']);
        } catch (NotValidInputException $e) {
            echo $e->getMessage();
        }

        if ($this->validator->isErrors() === false && $this->auth->isAuth() === true) {
            $currentElement = $this->model->getDataById($id);
            $dataOutSide[] = ($currentElement['task'] === $dataOutSide[2]) ? 0 : 1;
            $fields = ['name', 'email', 'task', 'status', 'date_update', 'check_admin'];
            $this->model->updateData($fields, $dataOutSide, $id);
            $this->ajaxResponse(true, 'Successfully update!');
        } else {
            $this->ajaxResponse(false, 'You need to <a href="/admin" target="_blank">log in</a>');
        }
    }

    /**
     * Get the data of one record and display it on the edit page
     */
    public function actionEdit(): void
    {
        $id = '';

        try {
            $id = $this->validator->checkInt((int)$_GET['id']);
        } catch (NotValidInputException $e) {
            echo $e->getMessage();
        }

        $dataProvider = $this->model->getDataById($id);
        $dataProvider['adm'] = $this->auth->isAuth();

        try {
            echo $this->view->render('add/'.$this->getNameView(), $dataProvider);
        } catch (LoaderError $e) {
        } catch (RuntimeError $e) {
        } catch (SyntaxError $e) {
        }
    }
}