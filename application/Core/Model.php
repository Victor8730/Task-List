<?php

namespace Core;

class Model extends Db
{
    /**
     * Get data from the database
     * First parameter type sorting
     * Second - filter, num and count
     * Third - if need get one row, select id. But it's better to use getDataById
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
    public function getDataById(int $id): ?array
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
     * Write data to database, use parameter ['field','field-1'] and ['value-field','value-field-1']
     * @param array $fields
     * @param array $data
     */
    public function saveData(array $fields, array $data): void
    {
        $this->insert($fields, $data);
    }

    /**
     * Update data in the database use first parameter ['field','field-1'] and second ['value-field','value-field-1']  and third - id row in db
     * @param array $fields
     * @param array $data
     * @param int $id
     */
    public function updateData(array $fields, array $data, int $id): void
    {
        $this->update($fields, $data, $id);
    }
}