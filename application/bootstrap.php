<?php

declare(strict_types=1);

namespace core;

spl_autoload_register(function ($className) {
    $className = str_replace('\\', '/', trim($className));
    include 'application/'.$className . '.php';
});

(new Route())->start();