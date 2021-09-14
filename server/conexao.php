<?php

$hostname = "localhost";
$database = "bd-login";
$user = "root";
$password = "";

$mysqli = new mysqli($hostname, $user, $password, $database);
if($mysqli->connect_errno){
    echo "falha ao conectar: (" . $mysqli->connect_errno . ")" . $mysqli->connect_error;
} else {
    return $mysqli;
}
