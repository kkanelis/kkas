<?php

function dd($data) {
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
    
    die();
}

function redirectIfNotFound($location = "/") {
    http_response_code(302);
    echo "<script>pagenotfound()</script>";
    header("Location: $location", true, 302);
}