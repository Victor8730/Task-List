<?php

declare(strict_types=1);

namespace core;

use exceptions\NotExistFileException;

class Parser
{
    use Check;

    /**
     * @var array
     */
    private array $vars = [];

    /**
     * @var false|string
     */
    public string $template;

    /**
     * Parser constructor.
     * @param string $fileName
     */
    public function __construct(string $fileName)
    {
        try {
            $this->template = $this->checkFile($fileName, false);
        } catch (NotExistFileException $e) {
            Route::ErrorPage404();
        }
    }

    /**
     * Set template for replace
     * @param array $data
     */
    public function setTpl(array $data): void
    {
        foreach ($data as $key => $var) {
            $this->vars[$key] = $var;
        }
    }

    /**
     * Replace whatever is needed and return the string
     * @return false|string|string[]
     */
    public function parseTpl(): string
    {
        foreach ($this->vars as $find => $replace) {
            $this->template = str_replace($find, $replace, trim($this->template));
        }

        return $this->template;
    }

}