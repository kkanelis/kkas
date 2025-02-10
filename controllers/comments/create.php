<?php 

require "Validator.php";

if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST'){

    $author = $_POST['author'];
    $comment = $_POST['comment'];

    $errors = [];
    if(!Validator::string($_POST['author'], min: 3, max: 20)){
        $errors["author"] = "Autora vārdam ir jābut lielākam par 3 rakstīmēm un ne vairāk par 20";
    }

    if(!Validator::string($_POST['content'], min: 1, max: 50)){
        $errors["comment"] = "Komentāram jābūt ievadītam, bet ne garākam par 50 rakstzīmēm";
    }


    if (empty($errors)) {

        $sql = "SELECT posts.*, categories.category_name FROM posts LEFT JOIN categories ON posts.category_id = categories.id WHERE posts.id = :id";
        $params = ["id" => $_GET["id"]];
        $post_id = $db->query($sql, $params)->fetch();
            
        $sql = "INSERT INTO comments (author, comment, datetime, post_id) VALUES(:author, :comment, :datetime, :post_id)";
        $params = ["author" => $author, "comment" => $comment, "datetime" => date(), "post_id" => $post_id];
        $db->query($sql, $params);
        
        header("Location: /"); 
        exit(); 

    }

}