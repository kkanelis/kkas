<?php

class Database {
    public function query($sql) {
        $dsn = "mysql:host=localhost;port=3306;user=root;password=;dbname=blog;charset=utf8mb4;"; // Data Source Name
        $pdo = new PDO($dsn);

        $statement = $pdo->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}