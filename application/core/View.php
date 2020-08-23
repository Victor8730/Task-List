<?php

declare(strict_types=1);

namespace core;

use exceptions\NotExistFileException;

class View
{
    use Check;

    /**
     * content page
     * @var string
     */
    private string $content;

    /**
     * list of headers, with sorting methods
     * @var string
     */
    private string $head;

    /**
     * task list
     * @var string
     */
    private string $list;

    /**
     * form for creating and editing tasks
     * @var string
     */
    private string $form;

    /**
     * pagination
     * @var string
     */
    private string $pagination;

    /**
     * @var string
     */
    private string $dirRoot;

    /**
     * View constructor.
     */
    public function __construct()
    {
        $this->content = '';
        $this->head = '';
        $this->list = '';
        $this->form = '';
        $this->pagination = '';
    }

    /**
     * Render content page
     * @param string $contentView
     * @param array|null $data
     * @param bool $adm
     * @return string
     */
    public function render(string $contentView, ?array $data = null, bool $adm = false): string
    {
        $root = str_replace('\\', '/', __DIR__);
        $dir = explode($_SERVER['DOCUMENT_ROOT'], $root);
        $dirFile = strstr($dir[1], '/application/core', true);
        $this->dirRoot = $dirFile;

        $this->head = $this->createHeaders($data['url']);

        if (isset($data['dataList'])) {
            foreach ($data['dataList'] as $val) {
                $this->list .= $this->createListItem($val, $adm);
            }
        }

        $this->form = ($adm === true) ? $this->form = $this->createForm($data) : $this->createForm(null);
        $logoutButton = ($adm === true) ? '<button url="' . $this->dirRoot . '/admin/logout" class="navbar-toggler logout-button" title="Exit"><i class="fa fa-sign-out fa-2x" aria-hidden="true"></i></button>' : '';

        try {
            if ($adm === true && $contentView === 'admin.php') {
                $this->content = '<div class="col-md-12 text-center"><i class="fa fa-shield fa-3x" aria-hidden="true"></i><h1 class="h3 mb-3 font-weight-normal">You have successfully signed in</h1>' . $logoutButton . '</div>';
            } else {
                $this->content = $this->checkFile('application/views/' . $contentView, false);
            }
        } catch (NotExistFileException $e) {
            Route::ErrorPage404();
        }

        $this->pagination = $this->createPagination($data['countDataRows'], $data['url']);

        $parser = new Parser('application/views/template.php');
        $parser->setTpl([
            '#CONTENT#' => $this->content,
            '#HEAD#' => $this->head,
            '#ELEMENTS#' => $this->list,
            '#PAGINATION#' => $this->pagination,
            '#FORM#' => $this->form,
            '#COUNT#' => $data['countDataRows'],
            '#LOGOUT#' => $logoutButton,
            '#ROOT#' => $this->dirRoot,
        ]);

        return $parser->parseTpl();
    }

    /**
     * Create list headers and return html code
     * @param array|null $url
     * @return string
     */
    private function createHeaders(?array $url): string
    {
        $parser = new Parser('application/views/head.php');
        $parser->setTpl([
            '#start#' => $url['filter']['start'] ?? 0,
        ]);

        return $parser->parseTpl();
    }

    /**
     * Create a list of all tasks and return string with html code
     * @param array $data
     * @param bool $adm
     * @return string
     */
    private function createListItem(array $data, bool $adm): string
    {
        $status = ($data['status'] == 1) ? '<i class="fa fa-check color-green" aria-hidden="true"></i>' : '<i class="fa fa-minus-circle" aria-hidden="true"></i>';
        $check = ($data['check_admin'] == 1) ? '<i class="fa fa-pencil" aria-hidden="true"></i>' : '';
        $edit = ($adm === false) ? '' : '<a href="' . $this->dirRoot . '/add/edit/?id=' . $data['id'] . '"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>';
        $parser = new Parser('application/views/list.php');
        $parser->setTpl([
            '#name#' => $data['name'],
            '#email#' => $data['email'],
            '#task#' => $data['task'],
            '#status#' => $status,
            '#check#' => $check,
            '#edit#' => $edit,
        ]);

        return $parser->parseTpl();
    }

    /**
     * Create a form for editing or adding a new task and return string with html code
     * @param array|null $data
     * @return string
     */
    private function createForm(?array $data): string
    {
        $parser = new Parser('application/views/form.php');
        $parser->setTpl([
            '#valuename#' => $data['name'] ?? '',
            '#valuemail#' => $data['email'] ?? '',
            '#valuetask#' => $data['task'] ?? '',
            '#valueid#' => $data['id'] ?? '',
            '#button#' => $data['id'] ? 'Edit task' : 'Add new task',
            '#valuestatuschecked#' => $data['status'] ? 'checked' : '',
            '#action#' => $data['id'] ? 'put' : 'post',
        ]);
        return $parser->parseTpl();
    }

    /**
     * Create pagination and return string with pagination html code
     * @param int|null $count
     * @param array $url
     * @return string
     */
    private function createPagination(?int $count, ?array $url): string
    {
        $limit = $url['filter']['limit'] ?? 1;
        $elementPagination = '';
        $countPage = ceil($count / $limit);

        for ($i = 1, $num = 0; $i <= $countPage; $i++, $num++) {
            $numPage = $num * $limit;
            $elementPagination .= '<li class="page-item"><a class="page-link" href="' . $this->dirRoot . '/main/index?sort=' . $url['sort'] . '&order=' . $url['order'] . '&start=' . $numPage . '">' . $i . '</a></li>';
        }

        $parser = new Parser('application/views/pagination.php');
        $parser->setTpl([
            '#elementpag#' => $elementPagination ?? '',
        ]);

        return $parser->parseTpl();
    }
}