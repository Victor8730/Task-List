<?php

declare(strict_types=1);

namespace Core;


class Auth
{
    /**
     * @var string
     */
    private string $login = "admin";

    /**
     * @var string
     */
    private string $pass = "21238789";

    /**
     * Checks if the user is authorized or not
     * returns true if authorized, false otherwise
     * @return boolean
     */
    public function isAuth(): bool
    {
        if (isset($_SESSION["is_auth"])) {
            return $_SESSION["is_auth"];
        } else {
            return false;
        }
    }

    /**
     * User authorization, return true / false depending on successful input
     * @param string $login
     * @param string $pass
     * @return bool
     */
    public function auth(string $login, string $pass): bool
    {
        if ($login == $this->login && $pass == $this->pass) {
            $_SESSION["is_auth"] = true;
            $_SESSION["user"] = $login;
            return true;
        } else {
            $_SESSION["is_auth"] = false;
            return false;
        }
    }

    /**
     * Returns the username of the authorized user
     * @return string|null
     */
    public function getLogin(): ?string
    {
        if ($this->isAuth()) {
            return $_SESSION["user"];
        }
    }

    /**
     * Clear session and redirect to admin page
     */
    public function out(): void
    {
        $_SESSION = array();
        session_destroy();
    }
}