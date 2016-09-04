<?php

$servername = 'localhost';
$username = 'komijost_kaczi';
$password = '34vPGSxRxK';
$baseName = 'komijost_rekrutkaczi';

$conn= new mysqli ($servername, $username, $password, $baseName);


if ($conn->connect_error){
    die("Blad przy polaczeniu do bazy danych: $conn->connect_error");
}
$conn->set_charset("utf8");