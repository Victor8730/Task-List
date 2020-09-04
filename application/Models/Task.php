<?php

declare(strict_types=1);

namespace Models;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="task")
 */
class Task
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected int $id;

    /**
     * @ORM\Column(type="string")
     */
    protected string $name;

    /**
     * @ORM\Column(type="string")
     */
    protected string $email;

    /**
     * @ORM\Column(type="string")
     */
    protected string $task;

    /**
     * @ORM\Column(type="integer")
     */
    protected int $status;

    /**
     * @ORM\Column(type="integer")
     */
    protected int $check_admin;

    /**
     * @ORM\Column(type="string")
     */
    protected string $date_add;

    /**
     * @ORM\Column(type="string")
     */
    protected string $date_update;

    /**
     * @ORM\Column(type="string")
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getTask(): string
    {
        return $this->task;
    }

    /**
     * @param string $task
     */
    public function setTask(string $task): void
    {
        $this->task = $task;
    }

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @param int $status
     */
    public function setStatus(int $status): void
    {
        $this->status = $status;
    }

    /**
     * @return int
     */
    public function getCheckAdmin(): int
    {
        return $this->check_admin;
    }

    /**
     * @param int $check_admin
     */
    public function setCheckAdmin(int $check_admin): void
    {
        $this->check_admin = $check_admin;
    }

    /**
     * @return string
     */
    public function getDateAdd(): string
    {
        return $this->date_add;
    }

    /**
     * @param string $date_add
     */
    public function setDateAdd(string $date_add): void
    {
        $this->date_add = $date_add;
    }

    /**
     * @return string
     */
    public function getDateUpdate(): string
    {
        return $this->date_update;
    }

    /**
     * @param string $date_update
     */
    public function setDateUpdate(string $date_update): void
    {
        $this->date_update = $date_update;
    }


}