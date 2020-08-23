<?php

declare(strict_types=1);

namespace controllers;

use core\Controller;
use exceptions\NotValidInputException;

class ControllerAdd extends Controller
{
    /**
     * Show page with template add
     */
    public function actionIndex(): void
    {
        echo $this->view->render($this->getNameView(), null, $this->auth->isAuth());
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
            $email = $this->input->checkEmail($_POST['email']);
        } catch (NotValidInputException $e) {
            echo $e->getMessage();
        }

        try {
            $name = $this->input->checkStr($_POST['name']);
            $task = $this->input->checkStr($_POST['task']);
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
        $data = $this->validate();

        if ($this->input->isErrors() === false) {
            $this->model->saveData($data);
            echo json_encode(['success' => true, 'error' => false]);
        }
    }

    /**
     * Updates data if admin is authorized
     */
    public function actionPut(): void
    {
        $id = '';
        $data = $this->validate();

        try {
            $id = $this->input->checkInt((int)$_POST['id-element']);
        } catch (NotValidInputException $e) {
            echo $e->getMessage();
        }

        if ($this->input->isErrors() === false && $this->auth->isAuth() === true) {
            $currentElement = $this->model->getDataById($id);
            $data[] = ($currentElement['task'] === $data[2]) ? 0 : 1;
            $this->model->updateData($data, $id);
            echo json_encode(['success' => true, 'error' => false]);
        } else {
            echo json_encode([
                'success' => false,
                'error' => true,
                'auth' => ' You need to <a href="/admin" target="_blank">log in</a>'
            ]);
        }
    }

    /**
     * Get the data of one record and display it on the edit page
     */
    public function actionEdit(): void
    {
        $id = '';

        try {
            $id = $this->input->checkInt((int)$_GET['id']);
        } catch (NotValidInputException $e) {
            echo $e->getMessage();
        }

        $dataProvider = $this->model->getDataById($id);
        echo $this->view->render($this->getNameView(), $dataProvider, $this->auth->isAuth());
    }
}