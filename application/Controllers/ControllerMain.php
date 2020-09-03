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
            setcookie("list", $dataOutSide['list'], time() + 7200, '/');
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
        $start = $_GET['start'] ?? 0;
        $limit = $_GET['limit'] ?? 4;
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
     * Create pagination and return string with pagination html code
     * @param int|null $count
     * @param array|null $url
     * @return string
     */
    private function createPagination(?int $count, ?array $url): string
    {
        $limit = $url['filter']['limit'] ?? 1;
        $elementPagination = '';
        $countPage = ceil($count / $limit);

        for ($i = 1, $num = 0; $i <= $countPage; $i++, $num++) {
            $numPage = $num * $limit;
            $elementPagination .= '<li class="page-item"><a class="page-link" href="/main/index?sort=' . $url['sort'] . '&list=' . $url['list'] . '&order=' . $url['order'] . '&start=' . $numPage . '">' . $i . '</a></li>';
        }

        return $elementPagination;
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
            $countDataRows = $this->model->getCountDataRows();
            $adm = $this->auth->isAuth();
            $pagination = $this->createPagination($countDataRows, $dataOutSide);

            return [
                'dataList' => $dataList,
                'pag' => $pagination,
                'countDataRows' => $countDataRows,
                'typeList' => $dataOutSide['list'],
                'adm' => $adm
            ];
        }
    }
}