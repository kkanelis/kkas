<?php 

require "Validator.php";

$pageTitle = "Blogu veido luni";

if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST'){

    $errors = [];
    if(!Validator::string($_POST['content'], min: 1, max: 50)){
        $errors["content"] = "Saturam jābūt ievadītam, bet ne garākam par 50 rakstzīmēm";
    }


    if (empty($errors)) {
        $content = $_POST['content'];
        $sql = "INSERT INTO posts (content) VALUES(:content)";

        $params = ["content" => $content];
        $db->query($sql, $params);
        
        header("Location: /"); 
        exit();
    }

}

require "views/posts/create.view.php";