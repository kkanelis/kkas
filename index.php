<?php
include "functions.php";

$dsn = "mysql:host=localhost;port=3306;user=root;password=;dbname=blog;charset=utf8mb4;"; // Data Source Name
$pdo = new PDO($dsn);

$statement = $pdo->prepare("SELECT * FROM posts");
$statement->execute();

$posts = $statement->fetchAll(PDO::FETCH_ASSOC);

echo "<ul>";
foreach ($posts as $blogs) {
    echo "<li>", $blogs['content'], "</li>";
}
echo "</ul>";