<?php

declare(strict_types=1);

namespace exceptions;


class NotExistClassException extends \Error
{
    public function __construct($class)
    {
        $this->message = "Class not exist ->" . $class
            . "\nFile with problem: " . $this->getFile()
            . "\nLine with problem: " . $this->getLine();
        error_log("\n" . $this->getFile() .' / line:'. $this->getLine() . "/ final var is not valid, enter valid second param!", 3,
            "errors.log");
    }
}