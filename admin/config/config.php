<?php

$server_name = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "1905136";

$connection = mysqli_connect($server_name,$db_username,$db_password,$db_name);

if(!$connection)
{
    die("Connection failed: " . mysqli_connect_error());
    echo 'Check your conection';
}
?>