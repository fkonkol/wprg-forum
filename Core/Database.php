<?php

class Database
{
    private $db;
    private $stmt;

    public function __construct()
    {
        $dsn = "mysql:host=localhost;port=3306;dbname=wprg;charset=utf8mb4";
        $this->db = new PDO($dsn, 'root', '', [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
    }

    public function query($query, $params = [])
    {
        $this->stmt = $this->db->prepare($query);
        $this->stmt->execute($params);

        return $this;
    }

    public function fetch() {
        return $this->stmt->fetch();
    }

    public function fetchAll() {
        return $this->stmt->fetchAll();
    }

    // tryFetch attempts to fetch a single object from the database. 
    // In case there are no results, 404 page is shown.
    public function tryFetch() {
        $data = $this->fetch();

        if (empty($data)) {
            halt(); 
        }

        return $data;
    }
}
