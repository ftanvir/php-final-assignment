<?php

function dd($value) {
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
    die();
}

//make a redirect function
$base_url = "http://localhost/php-final-assignment/";
function redirect($path) {
    global $base_url;
    $path = $base_url . $path;
    // dd($path);
    header("Location: $path");
}