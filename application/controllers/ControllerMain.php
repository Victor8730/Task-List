<?php

declare(strict_types=1);

namespace controllers;

use core\Controller;
use exceptions\NotValidInputException;


class ControllerMain extends Controller
{
    /**
     * Show page with template main
     */
    public function actionIndex()
    {
        echo $this->view->render($this->getNameView(), $this->dataProvider(), $this->auth->isAuth());
    }

    /**
     * Check data validity
     * @return array
     */
    private function validate(): array
    {
        $sort = $_GET['sort'] ?? 'id';
        $order = $_GET['order'] ?? 'DESC';
        $start = $_GET['start'] ?? 0;
        $limit = $_GET['limit'] ?? 3;
        $filter = [];

        try {
            $sort = $this->input->checkStr($sort);
            $order = $this->input->checkStr($order);
        } catch (NotValidInputException $e) {
            echo $e->getMessage();
        }

        try {
            $start = $this->input->checkInt((int)$start);
            $limit = $this->input->checkInt((int)$limit);
            $filter = ['start' => $start, 'limit' => $limit];
        } catch (NotValidInputException $e) {
            echo $e->getMessage();
        }

        return ['sort' => $sort, 'order' => $order, 'filter' => $filter];
    }

    /**
     * Data provider for page rendering, return array with data
     * @return array
     */
    private function dataProvider(): array
    {
        $dataInputGet = $this->validate();

        if ($this->input->isErrors() === false) {
            $sortData = $dataInputGet['sort'] . ' ' . $dataInputGet['order'];
            $dataList = $this->model->getData($sortData, $dataInputGet['filter']);
            $countDataRows = $this->model->getCountDataRows();

            return ['dataList' => $dataList, 'countDataRows' => $countDataRows, 'url' => $dataInputGet];
        }
    }
}