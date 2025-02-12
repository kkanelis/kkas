<?php 

require "Validator.php";


date_default_timezone_set("Europe/Riga");

$months = [
    "January" => "janvāris",
    "February" => "februāris",
    "March" => "marts",
    "April" => "aprīlis",
    "May" => "maijs",
    "June" => "jūnijs",
    "July" => "jūlijs",
    "August" => "augusts",
    "September" => "septembris",
    "October" => "oktobris",
    "November" => "novembris",
    "December" => "decembris"
];

$datetime = date("Y") . ". gada " . date("j. F,") . " plkst. " . date("H.i");
$datetime = str_replace(array_keys($months), array_values($months), $datetime);


if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST'){

    $author = $_POST['author'];
    $comment = $_POST['comment'];
    $id = $_POST['id'];

    $errors = [];
    if(!Validator::string($_POST['author'], min: 3, max: 20)){
        $errors["author"] = "Autora vārdam ir jābut lielākam par 3 rakstīmēm un ne vairāk par 20";
    }

    if(!Validator::string($_POST['comment'], min: 1, max: 50)){
        $errors["comment"] = "Komentāram jābūt ievadītam, bet ne garākam par 50 rakstzīmēm";
    }


    if (empty($errors)) {
            
        $sql = "INSERT INTO comments (author, comment, date, post_id) VALUES (:author, :comment, :date, :post_id)";
        $params = ["author" => $author, "comment" => $comment, "date" => $datetime, "post_id" => $id];
        $db->query($sql, $params);

        header("Location: /show?id=" . $_POST['id']); 
        exit(); 

    }

}