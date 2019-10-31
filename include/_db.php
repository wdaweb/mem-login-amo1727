<?php 
    $db_server='localhost';
    $db_user='mydbuser';
    $db_pwd='3edr5';
    $db_name='mydb';
    $conn=new PDO("mysql:host=$db_server;charset=utf8;dbname=$db_name",$db_user,$db_pwd);
?>