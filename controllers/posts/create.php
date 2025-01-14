<?php 

$pageTitle = "Blogu veido luni";

if (isset($_POST["content"]) && $_POST["content"] != "") {
    $sql = "INSERT INTO posts";
    $params = ["content" => $_POST["content"]];
    $post = $db->query($sql, $params)->fetchAll();
}

require "views/posts/create.view.php";