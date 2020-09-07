<?php

declare(strict_types=1);

namespace application;

/**
 * Class Config needed to separate settings such as database name, user, password, etc.
 * @package Core
 */
class Config
{
    /**
     * @var array|string[]
     */
    protected array $paths;
    /**
     * @var array|string[]
     */
    protected array $dbParams;
    /**
     * @var bool
     */
    protected bool $isDevMode;

    /**
     * Config constructor.
     * The main model will inherit this config
     */
    protected function __construct()
    {
        $this->paths = ["/Models/"];
        $this->dbParams = [
            'driver' => 'pdo_mysql',
            'user' => 'user',
            'host' => 'localhost',
            'password' => 'dy4obhF46EMMZL80',
            'dbname' => 'task_manager',
        ];
        $this->isDevMode = false;
    }
}