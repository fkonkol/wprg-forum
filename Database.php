<?php

class Database
{
    private $db;

    public function __construct()
    {
        $dsn = "mysql:host=localhost;port=3306;dbname=wprg;charset=utf8mb4";
        $this->db = new PDO($dsn, 'root', '', [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
    }

    public function query($query, $params = [])
    {
        $stmt = $this->db->prepare($query);
        $stmt->execute($params);

        return $stmt;
    }
}
