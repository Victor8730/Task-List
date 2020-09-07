<?php

declare(strict_types=1);

namespace Controllers;

use Core\Controller;
use Exception;
use Exceptions\NotValidInputException;
use JasonGrimes\Paginator;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;


class ControllerMain extends Controller
{
    /**
     * Show page with template main
     */
    public function actionIndex()
    {
        try {
            echo $this->view->render('main/' . $this->getNameView(), $this->dataProvider());
        } catch (LoaderError $e) {
        } catch (RuntimeError $e) {
        } catch (SyntaxError $e) {
        }
    }

    /**
     *Change type list task
     */
    public function actionChangeList()
    {
        if ($this->isAjax === true) {
            $dataOutSide = $this->validate();
            setcookie('list', $dataOutSide['list'], time() + 7200, '/');
            $this->ajaxResponse(true, 'Successfully updated!');
        }
    }

    /**
     *Change count element per page
     */
    public function actionChangePerPage()
    {
        if ($this->isAjax === true) {
            $dataOutSide = $this->validate();
            setcookie('limit', strval($dataOutSide['filter']['limit']), time() + 7200, '/');
            $this->ajaxResponse(true, 'Successfully updated!');
        }
    }

    /**
     * Check data validity
     * @return array
     */
    private function validate(): array
    {
        $sort = $_GET['sort'] ?? 'id';
        $order = $_GET['order'] ?? 'DESC';
        $name = $_POST['name'] ?? $_GET['name'] ?? '';
        $list = $_POST['list'] ?? $_COOKIE['list'] ?? $_GET['list'] ?? 'list';
        $limit = ($list !== 'card') ? $_POST['limit'] ?? $_COOKIE['limit'] ?? $_GET['limit'] ?? 3 : 3;
        $start = $_GET['start'] ?? 1;
        $filter = [];

        try {
            $sort = $this->validator->checkStr($sort);
            $order = $this->validator->checkStr($order);
            $list = $this->validator->checkStr($list);
            $name = $this->validator->checkStr($name);
        } catch (NotValidInputException $e) {
            echo $e->getMessage();
        }

        try {
            $start = $this->validator->checkInt((int)$start);
            $limit = $this->validator->checkInt((int)$limit);
            $filter = ['start' => $start, 'limit' => $limit];
        } catch (NotValidInputException $e) {
            echo $e->getMessage();
        }

        return ['sort' => $sort, 'list' => $list, 'name' => $name, 'order' => $order, 'filter' => $filter];
    }

    /**
     * Data provider for page rendering, return array with data
     * @return array
     */
    private function dataProvider(): array
    {
        $dataFromOutside = $this->validate();

        if ($this->validator->isErrors() === false && $this->isAjax === false) {
            $entityManager = $paginator = '';
            $search = (!empty($dataFromOutside['name'])) ? ['name' => $dataFromOutside['name']] : [];

            try {
                $entityManager = $this->model->entityManager->getRepository('\\Models\\Task');
            } catch (Exception $e) {
                echo $e->getMessage();
            }

            $tasks = $entityManager->findBy(
                $search,
                [$dataFromOutside['sort'] => $dataFromOutside['order']],
                $dataFromOutside['filter']['limit'],
                ($dataFromOutside['filter']['start'] - 1) * $dataFromOutside['filter']['limit']
            );
            $countAllRows = $entityManager->count($search);

            try {
                $paginator = new Paginator(
                    $countAllRows,
                    $dataFromOutside['filter']['limit'],
                    $dataFromOutside['filter']['start'],
                    '/main/index?sort=' . $dataFromOutside['sort'] . '&list=' . $dataFromOutside['list'] . '&name=' . $dataFromOutside['name'] . '&order=' . $dataFromOutside['order'] . '&start=(:num)'
                );
                $paginator->setMaxPagesToShow(5);
            } catch (Exception $e) {
                echo $e->getMessage();
            }

            $search['status'] = 1;

            return [
                'dataList' => $tasks,
                'paginator' => $paginator,
                'countDataRows' => $countAllRows,
                'countStatusComplete' => $entityManager->count($search),
                'typeList' => $dataFromOutside['list'],
                'name' => $dataFromOutside['name'],
                'filter' => $dataFromOutside['filter'],
                'adm' => $this->auth->isAuth()
            ];
        }
    }
}