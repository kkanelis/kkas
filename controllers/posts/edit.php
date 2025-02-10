<?php 

require "Validator.php";

$pageTitle = "Blogu veido luni";

$sql = "SELECT * FROM posts WHERE id = :id";
$params = ["id" => $_GET["id"]];
$post = $db->query($sql, $params)->fetch();

$sql = "SELECT * FROM categories";
$params = [];
$categories = $db->query($sql, $params)->fetchAll();

$sql = "SELECT posts.*, categories.category_name FROM posts LEFT JOIN categories ON posts.category_id = categories.id WHERE posts.id = :id";
$params = ["id" => $_GET["id"]];
$catevalue = $db->query($sql, $params)->fetch();


if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST'){

    $content = $_POST['content'];
    $categoriesId = $_POST['id'];

    $errors = [];
    if(!Validator::string($_POST['content'], min: 1, max: 50)){
        $errors["content"] = "Saturam jābūt ievadītam, bet ne garākam par 50 rakstzīmēm";
    }

    if(!Validator::number($categoriesId, min: 1, max: INF)) {
        $errors["id"] = "Kategorijas id nav cipars";
    }


    if (empty($errors)) {
            
        $sql = "UPDATE posts SET content = :content, category_id = :category_id WHERE id = :id";

        $params = ["id" => $_GET["id"], "content" => $content, "category_id" => $categoriesId];
        $db->query($sql, $params);
        
        header("Location: /"); 
        exit(); 

    }

}

require "views/posts/edit.view.php";