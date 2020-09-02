<?php

declare(strict_types=1);

namespace Install;

use Exceptions\FailedCopyException;
use Exceptions\FailedCreateDirException;

class Install extends Base
{
    /**
     * Trying to copy the necessary files
     * @param string $dirSource
     * @param string $dirDest
     */
    public static function copyFileAndDirectory(string $dirSource, string $dirDest): void
    {
        $dir = opendir($dirSource);
        while (($file = readdir($dir)) !== false) {
            if (is_file($dirSource . "/" . $file)) {
                try {
                    parent::copyFile($dirSource . "/" . $file, $dirDest . "/" . $file);
                } catch (FailedCopyException $e) {
                }
            }
            if (is_dir($dirSource . "/" . $file) && !file_exists($dirDest . "/" . $file) && $file != "." && $file != "..") {
                try {
                    parent::makeDir($dirDest . "/" . $file);
                } catch (FailedCreateDirException $e) {
                }
                self::copyFileAndDirectory("$dirSource/$file", "$dirDest/$file");
            }
        }
        closedir($dir);
    }
}