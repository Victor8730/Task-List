<?php

namespace Core;

class Db
{
    /**
     * @var string
     */
    private string $dbPrefix;

    /**
     * @var string
     */
    private string $dbUser;

    /**
     * @var string
     */
    private string $dbPass;

    /**
     * @var string
     */
    private string $table;

    /**
     * Db constructor.
     */
    public function __construct()
    {
        $this->dbPrefix = '';
        $this->dbUser = 'user';
        $this->dbPass = 'dy4obhF46EMMZL80';
        $this->table = 'task';
    }

    /**
     * @return \PDO
     */
    function connect(): ?object
    {
        try {
            $dbConnect = new \PDO('mysql:host=localhost;dbname=task_manager;charset=utf8', $this->dbUser,
                $this->dbPass);
            $dbConnect->exec("set names utf8");
        } catch (\PDOException $e) {
            error_log("\n " . date("Y-m-d H:i:s") . " : Script with problem: " . $e->getFile() . " | Line with problem: " . $e->getLine() . " | " . $e->getMessage(),
                3, 'errors.log');
            return null;
        }
        if (isset($dbConnect)) {
            return $dbConnect;
        }
    }


    /**
     * Get data from the database
     * @param int|null $id
     * @param string|null $param
     * @param array|null $limit
     * @return array
     */
    function load(
        ?int $id = null,
        ?string $param = null,
        ?array $limit = null
    ): ?array {
        $dbConnect = $this->connect();
        $table = $this->dbPrefix . $this->table;
        try {
            if (isset($dbConnect)) {
                if ($id !== null) {
                    $dbs = $dbConnect->prepare("SELECT * FROM $table WHERE  id = :id");
                    $dbs->bindParam(':id', $id, \PDO::PARAM_INT);
                } else {
                    if ($limit === null) {
                        $dbs = $dbConnect->prepare("SELECT COUNT(*) as count FROM $table");
                    } else {
                        $dbs = $dbConnect->prepare("SELECT * FROM $table ORDER BY $param LIMIT :start, :number ");
                        $dbs->bindParam(':start', $limit['start'], \PDO::PARAM_INT);
                        $dbs->bindParam(':number', $limit['limit'], \PDO::PARAM_INT);
                    }
                }
                $dbs->setFetchMode(\PDO::FETCH_ASSOC);
                $dbs->execute();
            }
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }

        if (isset($dbs)) {
            return $dbs->fetchall();
        }
    }


    /**
     * @param $updateArrField
     * @param $updateArrData
     * @param $id
     * @return bool
     */
    function update($updateArrField, $updateArrData, $id)
    {
        $dbConnect = $this->connect();
        $table = $this->dbPrefix . $this->table;
        if (count($updateArrField) > 1) {
            $placeholder = '';
            foreach ($updateArrField as $value) {
                $placeholder .= $value . '=?,';
            }
            $placeholder = substr($placeholder, 0, -1);
        } else {
            $updateArrData = explode('-+=+-', $updateArrData);
            $placeholder = $updateArrField . "=?";
        }
        try {
            $dbs = $dbConnect->prepare("UPDATE $table SET $placeholder WHERE id='$id'");
            $dbs->execute($updateArrData);
            return true;
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Insert new row on database and return last insert id
     * @param array $arrField
     * @param array $arrData
     * @return string
     */
    function insert(array $arrField, array $arrData): string
    {
        $dbConnect = $this->connect();
        $table = $this->dbPrefix . $this->table;
        $placeholder = $strField = '';
        if (count($arrField) > 1) {
            foreach ($arrField as $value) {
                $placeholder .= ' ?,';
            }
            $placeholder = substr($placeholder, 0, -1);
            $strField = implode(',', $arrField);
        } else {
            $arrData = $arrData[0];
            $placeholder = "?";
        }
        try {
            $dbs = $dbConnect->prepare("INSERT INTO $table ($strField) VALUES ($placeholder)");
            $dbs->execute($arrData);
            return $dbConnect->lastInsertId();
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }


    /**
     * Delete a database record by id
     * @param int $id
     */
    function del(int $id): void
    {
        $dbConnect = $this->connect();
        $table = $this->dbPrefix . $this->table;
        try {
            if (isset($dbConnect)) {
                $dbs = $dbConnect->prepare("DELETE FROM $table WHERE id= :id");
                $dbs->bindParam(':id', $id, \PDO::PARAM_INT);
                $dbs->execute();
            }
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }
}