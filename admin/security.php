


<?php
session_start();
include('config/config.php');
if($connection)
{
    // echo "Database Connected";
}
else
{
    header("Location: config/config.php");
}

if(!$_SESSION['username']) 
{
    header('Location: login.php');
    
}

?>