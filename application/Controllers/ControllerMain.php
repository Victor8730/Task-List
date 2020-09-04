<?php

declare(strict_types=1);

namespace Controllers;

use Core\Controller;
use Exceptions\NotValidInputException;
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

        $productRepository = $this->entityManager->getRepository('Task');
        $products = $productRepository->findAll();

        foreach ($products as $product) {
            echo sprintf("-%s\n", $product->getName());
        }

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
        $list = $_POST['list'] ?? $_COOKIE['list'] ?? $_GET['list'] ?? 'list';
        $limit = $_POST['limit'] ?? $_COOKIE['limit'] ?? $_GET['limit'] ?? 3;
        $start = $_GET['start'] ?? 0;
        $filter = [];

        try {
            $sort = $this->validator->checkStr($sort);
            $order = $this->validator->checkStr($order);
            $list = $this->validator->checkStr($list);
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

        return ['sort' => $sort, 'list' => $list, 'order' => $order, 'filter' => $filter];
    }

    /**
     * Data provider for page rendering, return array with data
     * @return array
     */
    private function dataProvider(): array
    {
        $dataOutSide = $this->validate();

        if ($this->validator->isErrors() === false && $this->isAjax === false) {
            $sortData = $dataOutSide['sort'] . ' ' . $dataOutSide['order'];
            $dataList = $this->model->getData($sortData, $dataOutSide['filter']);
            $CountAllRows = $this->model->getCountAllRows();
            $countStatusComplete = $this->model->getCountAllRows();
            $adm = $this->auth->isAuth();

            $urlPattern = '/main/index?sort=' . $dataOutSide['sort'] . '&list=' . $dataOutSide['list'] . '&order=' . $dataOutSide['order'] . '&start=(:num)';
            $paginator = new \JasonGrimes\Paginator($CountAllRows, $dataOutSide['filter']['limit'], $dataOutSide['filter']['start'], $urlPattern);

            return [
                'dataList' => $dataList,
                'paginator' => $paginator,
                'countDataRows' => $CountAllRows,
                'countStatusComplete' => $countStatusComplete,
                'typeList' => $dataOutSide['list'],
                'perPage' => $dataOutSide['filter']['limit'],
                'adm' => $adm
            ];
        }
    }
}