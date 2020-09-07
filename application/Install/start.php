<?php

declare(strict_types=1);

namespace Install;

$dirFrontEnd = dirname(__DIR__, 2);

require_once $dirFrontEnd . '/application/vendor/autoload.php';

$install = new Install();

$install->copyFileAndDirectory($dirFrontEnd . '/application/vendor/twbs/bootstrap/dist', $dirFrontEnd);
$install->initialData([
    ['name' => 'Victor', 'site' => 'aaa.ua', 'task' => 'task1', 'date_add' => new \DateTime("now")],
    ['name' => 'Victor', 'site' => 'bbb.ua', 'task' => 'task2', 'date_add' => new \DateTime("now")],
    ['name' => 'Victor', 'site' => 'ccc.ua', 'task' => 'task3', 'date_add' => new \DateTime("now")],
    ['name' => 'Victor', 'site' => 'ddd.ua', 'task' => 'task4', 'date_add' => new \DateTime("now")],
    ['name' => 'Victor', 'site' => 'eee.ua', 'task' => 'task5', 'date_add' => new \DateTime("now")],
    ['name' => 'Victor', 'site' => 'fff.ua', 'task' => 'task65', 'date_add' => new \DateTime("now")],
    ['name' => 'Victor', 'site' => 'ggg.ua', 'task' => 'task7', 'date_add' => new \DateTime("now")]
]);

