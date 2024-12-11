<?php
include "functions.php";
require "Database.php";

$db = new Database();
$posts = $db->query();

echo "<ul>";
foreach ($posts as $blogs) {
    echo "<li>", $blogs['content'], "</li>";
}
echo "</ul>";