<?php

$server = "localhost";
$username = "root";
$password = "thispass";
$database = "project";

try {
    $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password)    ;
} catch(PDOexception $e){
    die("Connection Failed:".$e->getmessage());

}