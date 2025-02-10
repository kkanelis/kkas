<?php 

require "Validator.php";

$pageTitle = "Redige";

$sql = "SELECT * FROM categories WHERE id = :id";
$params = ["id" => $_GET["id"]];
$category = $db->query($sql, $params)->fetch();

if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST'){

    $errors = [];
    if(!Validator::string($_POST['category_name'], min: 3, max: 25)){
        $errors["category_name"] = "Saturam jābūt ievadītam, bet ne garākam par 25 rakstzīmēm";
    }


    if (empty($errors)) {
        $category = $_POST['category_name'];
        $id = $_POST["id"];
        $sql = "UPDATE categories SET category_name = :category_name WHERE id = :id";

        $params = ["id" => $id, "category_name" => $category];
        $db->query($sql, $params);

        header("Location: /categories/show?id=" . $_POST['id']);

        exit();
    }

}

require "views/categories/edit.view.php";