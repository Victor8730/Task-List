<?php

declare(strict_types=1);

namespace Install;

$dirFrontEnd = dirname(__DIR__, 2);

require_once $dirFrontEnd . '/application/vendor/autoload.php';

$install = new Install();

$install->copyFileAndDirectory($dirFrontEnd . '/application/vendor/twbs/bootstrap/dist', $dirFrontEnd);
$install->initialData([
    ['Victor', 'aa@a.ua', 'task1'],
    ['Victor', 'bb@a.ua', 'task2'],
    ['Victor', 'cc@a.ua', 'task3'],
    ['Victor', 'dd@a.ua', 'task4'],
    ['Victor', 'ee@a.ua', 'task5'],
    ['Victor', 'ff@a.ua', 'task65'],
    ['Victor', 'gg@a.ua', 'task7']
]);

