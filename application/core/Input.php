<?php

declare(strict_types=1);

namespace core;

use exceptions\NotValidInputException;

class  Input
{
    /**
     * @var bool
     */
    private bool $errors;

    /**
     * Input constructor.
     */
    public function __construct()
    {
        $this->errors = false;
    }

    /**
     * @return bool
     */
    public function isErrors(): bool
    {
        return $this->errors;
    }

    /**
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
}