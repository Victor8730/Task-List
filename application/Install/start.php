<?php

declare(strict_types=1);

namespace Install;

$dirFrontEnd = dirname(__DIR__, 2);

require_once $dirFrontEnd.'/application/vendor/autoload.php';

(new Install())->copyFileAndDirectory($dirFrontEnd.'/application/vendor/twbs/bootstrap/dist', $dirFrontEnd);

