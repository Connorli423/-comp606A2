<?php

error_reporting(0);

$user = "testuser";
$password = "123456";
$database = "safetrade";
$host = "localhost";

$connect = mysqli_connect($host, $user, $password, $database);
if ($connect == false){
    echo "<h2>Site is down</h2>";
    exit(0);
}

$connect->autocommit(true);

error_reporting(E_ALL);

?>