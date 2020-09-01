<?php

declare(strict_types=1);

namespace Install;

require_once '../vendor/autoload.php';
(new Install())->copyFileAndDirectory('../vendor/twbs/bootstrap/dist', '../../');

