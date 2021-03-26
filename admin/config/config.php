<?php

$server_name = "www.1905136.sandwichmelody.com";
$db_username = "sandwich_arturjancik";
$db_password = "makaka2000";
$db_name = "sandwich_1905136";

$connection = mysqli_connect($server_name,$db_username,$db_password,$db_name);

if(!$connection)
{
    die("Connection failed: " . mysqli_connect_error());
    echo 'Check your conection';
}
?>