<?php

declare(strict_types=1);

namespace Install;

use Exceptions\FailedCopyException;
use Exceptions\FailedCreateDirException;

class Base
{
    /**
     * Try copy file from one location to another
     * @param string $dirSource
     * @param string $dirDest
     * @throws FailedCopyException
     */
    protected static function copyFile(string $dirSource, string $dirDest): void
    {
        if (!copy($dirSource, $dirDest)) {
            throw new FailedCopyException($dirSource);
        }else{
            echo 'ok copied to'.$dirDest;
        }
    }

    protected static function makeDir(string $dirSource): void
    {
        if (!mkdir($dirSource)) {
            throw new FailedCreateDirException($dirSource);
        }
    }

}