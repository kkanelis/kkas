<?php

require "functions.php";
require "Database.php";

$config = require("config.php");

$db = new Database($config["database"]);

$sql = "SELECT * FROM categories";
$params = [];
if (isset($_GET["search_query"]) && $_GET["search_query"] != "") {
    $search_query = "%" . $_GET['search_query'] . "%";
    $sql .= " WHERE category_name LIKE :search_query;";
    $params = ["search_query" => $search_query];
}

$categories = $db->query($sql, $params)->fetchAll();

echo "<form>";
    echo "<input name='search_query' />";
    echo "<button>Meklē</button>";
echo "</form>";

echo "<ul>";
foreach ($categories as $category) {
    echo "<li>", $category['category_name'], "</li>";
}
echo "</ul>";
