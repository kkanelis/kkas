<?php

class Database {

    public $pdo;

    public function __construct($config) {

        $dsn = "mysql:" . http_build_query($config, "", ";"); // Data Source Name
        $this->pdo = new PDO($dsn);
    }
    
    public function query($sql) {
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        return $statement;
    }


}