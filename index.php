<?php

require "functions.php";
require "Database.php";

$config = require("config.php");

$db = new Database($config["database"]);
$posts = $db->query("SELECT * FROM posts")->fetchAll();

echo "<ul>";
foreach ($posts as $blogs) {
    echo "<li>", $blogs['content'], "</li>";
}
echo "</ul>";
