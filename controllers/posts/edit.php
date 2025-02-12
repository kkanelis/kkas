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
    $categoriesId = $_POST['category_id'] !== "" ? $_POST['category_id'] : NULL; // Ja tukšs, saglabājam kā NULL


    $errors = [];

    if(!Validator::string($_POST['content'], min: 1, max: 255)){
        $errors["content"] = "Saturam jābūt ievadītam, bet ne garākam par 255 rakstzīmēm";
    }

    if($categoriesId !== NULL && !Validator::number($categoriesId, min: 1, max: INF)) {
        $errors["category_id"] = "Kategorijas ID nav derīgs";
    }

    if (empty($errors)) {
        $sql = "UPDATE posts SET content = :content, category_id = :category_id WHERE id = :id";
        $params = ["id" => $_GET["id"], "content" => $content, "category_id" => $categoriesId];
        $db->query($sql, $params);
        
        header("Location: show?id=" . $_GET["id"]); 
        exit(); 
    }
}


require "views/posts/edit.view.php";