<?php

declare(strict_types=1);

namespace core;

class Model extends Db
{
    /**
     * Get data from the database
     * @param string|null $sort
     * @param array|null $filter
     * @param int|null $id
     * @return array
     */
    public function getData(?string $sort = null, ?array $filter = null, ?int $id = null): ?array
    {
        return $this->load($id, $sort, $filter);
    }

    /**
     * Get data by id
     * @param int $id
     * @return array
     */
    public function getDataById(int $id): array
    {
        $dataId = $this->load($id);
        return $dataId[0];
    }

    /**
     * Get the number of lines in the database
     * @return int
     */
    public function getCountDataRows(): int
    {
        $arrayCount = $this->getData();
        return (int)$arrayCount[0]['count'];
    }

    /**
     * Write data to database
     * @param array $data
     */
    public function saveData(array $data): void
    {
        $this->insert(['name', 'email', 'task', 'status', 'date_add'], $data);
    }


    /**
     * Update data in the database
     * @param array $data
     * @param int $id
     */
    public function updateData(array $data, int $id): void
    {
        $this->update(['name', 'email', 'task', 'status', 'date_update', 'check_admin'], $data, $id);
    }
}