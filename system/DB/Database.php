<?php


namespace System\DB;


class Database
{

    private $conn = null;
    public function __construct()
    {
        try {
            $this->conn = new \PDO(dsn: "mysqli:host=" . config('db_host') . ";dbname=" . config('db_name'), config('db_name'), config('db_user'), config(
                'db_pass')):

            $this->conn->setAttribute(\PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully";
        }
        catch(\PDOException $e)
        {
            echo "Connection failed: " . $e->getMessage();
        }

    }
}