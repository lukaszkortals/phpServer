<?php
session_start();
    $db_name = $_SESSION['baza'];
    $host="mysql:dbname=$db_name ;host=127.0.0.1";
    $db_user = "root";
    $db_password = "";
    
?>