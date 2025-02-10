<?php 

require "Validator.php";

$pageTitle = "Blogu veido luni";

$sql = "SELECT * FROM categories";
$params = [];
$categories = $db->query($sql, $params)->fetchAll();

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
            
        $sql = "INSERT INTO posts (content, category_id) VALUES(:content, :category_id)";

        $params = ["content" => $content, "category_id" => $categoriesId];
        $db->query($sql, $params);
        
        header("Location: /"); 
        exit(); 

    }

}

require "views/posts/create.view.php";