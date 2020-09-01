<?php

namespace Core;

use Exceptions\{NotExistFileException, NotExistMethodException, NotExistClassException, NotValidInputException};

class  Validator
{
    /**
     * Variable showing if there are errors
     * @var bool
     */
    private bool $errors;

    /**
     * Input constructor.
     * We say that initially there are no mistakes
     */
    public function __construct()
    {
        $this->errors = false;
    }

    /**
     * Checking for errors
     * @return bool
     */
    public function isErrors(): bool
    {
        return $this->errors;
    }

    /**
     * Writing down errors
     * @param bool $errors
     */
    private function setErrors(bool $errors): void
    {
        $this->errors = $errors;
    }

    /**
     * String validation
     * @param $val
     * @return string
     * @throws NotValidInputException
     */
    public function checkStr($val): string
    {
        if (!is_string($val) || empty($val)) {
            $this->setErrors(true);
            throw new NotValidInputException($val);
        } else {
            return trim(strip_tags($val));
        }
    }

    /**
     * Email validation
     * @param string $val
     * @return string
     * @throws NotValidInputException
     */
    public function checkEmail(?string $val): string
    {
        $check = filter_var($val, FILTER_VALIDATE_EMAIL);
        if ($check !== false) {
            return $val;
        } else {
            $this->setErrors(true);
            throw new NotValidInputException($val);
        }
    }

    /**
     * Int validate
     * @param int $val
     * @return int
     * @throws NotValidInputException
     */
    public function checkInt(int $val)
    {
        $check = filter_var($val, FILTER_VALIDATE_INT);
        if ($check !== false) {
            return $val;
        } else {
            $this->setErrors(true);
            throw new NotValidInputException(strval($val));
        }
    }

    /**
     * Checks the existence of a file
     * @param string $file
     * @return false|string
     * @throws NotExistFileException
     */
    public function checkFileExist(string $file):bool
    {
        if (!file_exists($file)) {
            throw new NotExistFileException($file);
        }else{
            return true;
        }
    }

    /**
     * checking if a method exists in the class
     * @param object|null $controller
     * @param string $actionName
     * @throws NotExistMethodException
     */
    public function checkMethodExist(?object $controller, string $actionName): void
    {
        if (!method_exists($controller, $actionName)) {
            throw new NotExistMethodException($controller, $actionName);
        }
    }


    /**
     * checking if a class exists in the file controller
     * @param string $className
     * @throws NotExistClassException
     */
    public function checkClassExist(string $className): void
    {
        if (!class_exists($className)) {
            throw new NotExistClassException($className);
        }
    }
}