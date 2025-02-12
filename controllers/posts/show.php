<?php 

if (!isset($_GET["id"]) || $_GET["id"] == "") {
    redirectIfNotFound();
}

$sql = "SELECT posts.*, categories.category_name FROM posts LEFT JOIN categories ON posts.category_id = categories.id WHERE posts.id = :id";
$params = ["id" => $_GET["id"]];
$post = $db->query($sql, $params)->fetch();

$sql = "SELECT comments.* 
        FROM comments 
        JOIN posts ON posts.id = comments.post_id 
        WHERE posts.id = :id";
$params = ["id" => $_GET["id"]];
$comments = $db->query($sql, $params)->fetchAll();


if (!$post) {
    redirectIfNotFound();
}

require "views/posts/show.view.php";