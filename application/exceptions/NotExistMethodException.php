<?php

declare(strict_types=1);

namespace exceptions;

class NotExistMethodException extends \Exception
{
    /**
     * NotExistMethodException constructor.
     * @param object $controller
     * @param string $method
     */
    public function __construct(object $controller, string $method)
    {
        $this->message = 'Method ' . $method . ' not exist in controller ' . $controller;
        error_log("\n" . date("Y-m-d H:i:s") . " : Script with problem: " . $this->getFile() . " | Line with problem: " . $this->getLine() . " | " . $this->message,
            3,
            'errors.log');
    }
}