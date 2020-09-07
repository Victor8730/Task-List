<?php

declare(strict_types=1);

namespace Controllers;

use Core\Controller;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\ORM\TransactionRequiredException;
use Exceptions\NotValidInputException;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Models\Task as Task;

class ControllerAdd extends Controller
{
    /**
     * Show page with template add
     */
    public function actionIndex(): void
    {
        try {
            echo $this->view->render('add/' . $this->getNameView(), ['adm' => $this->auth->isAuth()]);
        } catch (LoaderError $e) {
        } catch (RuntimeError $e) {
        } catch (SyntaxError $e) {
        }
    }

    /**
     * Check outside data validity
     * @return array
     */
    private function validate(): array
    {
        $task = $name = $site = $id = '';
        $status = ($_POST['status'] === 'on') ? 1 : 0;

        try {
            $site = $this->validator->checkUrl($_POST['site']);
        } catch (NotValidInputException $e) {
        }

        try {
            $name = $this->validator->checkEmpty($_POST['name']) ? $this->validator->checkStr($_POST['name']) : '';
            $task = $this->validator->checkEmpty($_POST['task']) ? $this->validator->checkStr($_POST['task']) : '';
        } catch (NotValidInputException $e) {
            echo $e->getMessage();
        }

        return [
            'name' => $name,
            'site' => $site,
            'task' => $task,
            'status' => $status
        ];
    }

    /**
     * Check all outside parameters and admin is authorized
     * Create Task object, set all parameters
     * Save valid data and returns json response
     * If Auth not true, send response with text "Log in"
     */
    public function actionPost(): void
    {
        $dataOutSide = $this->validate();
        $dataOutSide['date_add'] = new \DateTime("now");

        if ($this->validator->isErrors() === false) {
            if ($this->auth->isAuth() === true) {
                $task = new Task();
                $this->model->setParameters($task, $dataOutSide);

                try {
                    $this->model->entityManager->persist($task);
                } catch (ORMException $e) {
                    echo $e->getMessage();
                }

                try {
                    $this->model->entityManager->flush();
                } catch (OptimisticLockException $e) {
                    echo $e->getMessage();
                } catch (ORMException $e) {
                    echo $e->getMessage();
                }

                $this->ajaxResponse(true, 'Successfully added!');
            } else {
                $this->ajaxResponse(false, 'You need to <a href="/admin" target="_blank">log in</a>');
            }
        } else {
            $this->ajaxResponse(false, 'Send data not correct, check your input');
        }
    }

    /**
     * Updates data if admin is authorized
     */
    public function actionPut(): void
    {
        $id = $task = '';
        $dataOutSide = $this->validate();
        $dataOutSide['date_update'] = new \DateTime("now");

        try {
            $id = $this->validator->checkInt((int)$_POST['id-element']);
        } catch (NotValidInputException $e) {
            echo $e->getMessage();
        }

        if ($this->validator->isErrors() === false) {
            if ($this->auth->isAuth() === true) {
                try {
                    $task = $this->model->entityManager->find('\\Models\\Task', $id);
                } catch (OptimisticLockException $e) {
                } catch (TransactionRequiredException $e) {
                } catch (ORMException $e) {
                }

                $taskOldData = $this->model->getParameters($task, ['task']);
                $dataOutSide['check_admin'] = ($taskOldData['task'] === $dataOutSide['task']) ? 0 : 1;
                $this->model->setParameters($task, $dataOutSide);

                try {
                    $this->model->entityManager->flush();
                } catch (OptimisticLockException $e) {
                    echo $e->getMessage();
                } catch (ORMException $e) {
                    echo $e->getMessage();
                }

                $this->ajaxResponse(true, 'Successfully update!');
            } else {
                $this->ajaxResponse(false, 'You need to <a href="/admin" target="_blank">log in</a>');
            }
        } else {
            $this->ajaxResponse(false, 'Send data not correct, check your input');
        }
    }

    /**
     * Get the data of one record and display it on the edit page
     */
    public function actionEdit(): void
    {
        $id = $entityManager = '';

        try {
            $id = $this->validator->checkInt((int)$_GET['id']);
        } catch (NotValidInputException $e) {
            echo $e->getMessage();
        }

        try {
            $entityManager = $this->model->entityManager->find('\\Models\\Task', $id);
        } catch (OptimisticLockException $e) {
        } catch (TransactionRequiredException $e) {
        } catch (ORMException $e) {
        }

        $dataProvider = $this->model->getParameters($entityManager, ['id', 'name', 'site', 'task', 'status']);
        $dataProvider['adm'] = $this->auth->isAuth();

        try {
            echo $this->view->render('add/' . $this->getNameView(), $dataProvider);
        } catch (LoaderError $e) {
        } catch (RuntimeError $e) {
        } catch (SyntaxError $e) {
        }
    }

    public function actionDel(): void
    {
        $id = $task = '';

        try {
            $id = $this->validator->checkInt((int)$_GET['id']);
        } catch (NotValidInputException $e) {
            echo $e->getMessage();
        }

        $task = $this->model->entityManager->getPartialReference('\\Models\\Task', array('id' => $id));

        try {
            $this->model->entityManager->remove($task);
            $this->model->entityManager->flush();
            $this->ajaxResponse(true, 'Successfully delete!');
        } catch (ORMException $e) {
            $this->ajaxResponse(false, 'Something is wrong!!!');
        }
    }
}