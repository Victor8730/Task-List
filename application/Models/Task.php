<?php

declare(strict_types=1);

namespace Models;

use DateTime;

/**
 * Entity Task to work with doctrine
 * @Entity
 * @Table(name="task")
 */
class Task
{
    /**
     * @Id
     * @Column(name="id", type="integer")
     * @GeneratedValue(strategy="AUTO")
     * @var int
     */
    private int $id;

    /**
     * @Column(name="name", type="string")
     * @var string
     */
    private string $name;

    /**
     * @Column(name="site", type="string")
     * @var string
     */
    private string $site;

    /**
     * @Column(name="task", type="string")
     * @var string
     */
    private string $task;

    /**
     * @Column(name="status", type="integer")
     * @var ?int
     */
    private ?int $status;

    /**
     * @Column(name="check_admin", type="integer")
     * @var ?int
     */
    private ?int $checkAdmin;

    /**
     * @Column(name="date_add", type="datetime")
     * @var DateTime
     */
    private DateTime $dateAdd;

    /**
     * @Column(name="date_update", type="datetime")
     * @var DateTime
     */
    private DateTime $dateUpdate;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
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
    public function getSite(): string
    {
        return $this->site;
    }

    /**
     * @param string $site
     */
    public function setSite(string $site): void
    {
        $this->site = $site;
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
    public function getStatus(): ?int
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
    public function getCheckAdmin(): ?int
    {
        return $this->checkAdmin;
    }

    /**
     * @param int $checkAdmin
     */
    public function setCheckAdmin(int $checkAdmin): void
    {
        $this->checkAdmin = $checkAdmin;
    }

    /**
     * @return DateTime
     */
    public function getDateAdd(): DateTime
    {
        return $this->dateAdd;
    }

    /**
     * @param DateTime $dateAdd
     */
    public function setDateAdd(DateTime $dateAdd): void
    {
        $this->dateAdd = $dateAdd;
    }

    /**
     * @return DateTime
     */
    public function getDateUpdate(): DateTime
    {
        return $this->dateUpdate;
    }

    /**
     * @param DateTime $dateUpdate
     */
    public function setDateUpdate(DateTime $dateUpdate): void
    {
        $this->dateUpdate = $dateUpdate;
    }
}