<?php

declare(strict_types=1);

namespace core;

use exceptions\NotExistFileException;
use exceptions\NotExistMethodException;

trait Check
{
    /**
     * Checks the existence of a file, if the file exists, it adds it to the script, or returns as a string
     * @param string $file
     * @param bool $include
     * @return false|string
     * @throws NotExistFileException
     */
    public function checkFile(string $file, bool $include)
    {
        if (!file_exists($file)) {
            throw new NotExistFileException($file);
        } else {
            if ($include == true) {
                include($file);
            } else {
                return file_get_contents($file);
            }
        }
    }

    /**
     * checking if a method exists in the controller
     * @param object $controller
     * @param string $actionName
     * @throws NotExistMethodException
     */
    public function checkMethod(?object $controller, string $actionName): void
    {
        if (method_exists($controller, $actionName)) {
            $controller->$actionName();
        } else {
            throw new NotExistMethodException($controller, $actionName);
        }
    }
}