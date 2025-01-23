<?php

$sql = "SELECT * FROM posts WHERE id = :id";
$params = ["id" => $_GET["id"]];
$post = $db->query($sql, $params)->fetch();

if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST'){

    $errors = [];
    if(!Validator::string($_POST['content'], min: 1, max: 50)){
        $errors["content"] = "Saturam jābūt ievadītam, bet ne garākam par 50 rakstzīmēm";
    }


    if (empty($errors)) {
        $content = $_POST['content'];
        $id = $_POST["id"];
        $sql = "DELETE posts WHERE content = :content WHERE id = :id";

        $params = ["id" => $id, "content" => $content];
        $db->query($sql, $params);

        header("Location: /show?id=" . $_POST['id']);

        exit();
    }

}