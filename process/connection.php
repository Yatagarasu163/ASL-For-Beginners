<?php

$server = 'localhost';
$user = 'root';
$password = '';
$database = 'asldb';

$connection = $connection = mysqli_connect($server, $user, $password, $database);

if($connection == false){
    die('Connection Failed! ' .mysqli_connect_error());
}
?>