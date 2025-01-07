<?php

require "functions.php";
require "Database.php";

$config = require("config.php");

$db = new Database($config["database"]);
$posts = $db->query("SELECT * FROM posts")->fetchAll();


if (isset($_GET["search_query"]) && $_GET["search_query"] != "") {
    dad("SELECT * FROM posts WHERE content LIKE '". $_GET['search_query'] . "';");
    $posts = $db->query("SELECT * FROM posts WHERE content LIKE '". $_GET['search_query'] . "';");
}

echo "<form>";
    echo "<input name='search_query' />";
    echo "<button>Meklē</button>";
echo "</form>";

echo "<ul>";
foreach ($posts as $blogs) {
    echo "<li>", $blogs['content'], "</li>";
}
echo "</ul>";
