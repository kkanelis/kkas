<?php

if($_SERVER['REQUEST_METHOD'] === 'GET') {
    redirectIfNotFound();
    exit;
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $sql = "DELETE FROM categories WHERE id = :id";
    $params ["id"] = $_POST["id"];
    
    $db->query($sql, $params)->fetch();

    header("Location: /categories/index");

    exit();

}