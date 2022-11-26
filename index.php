<h1> MySQL go Br</h1>
<?php

$servername = "localhost";
$username = "root";
$password = "root";
try{
    include "delete.php";
    include "create.php";
    $link = new PDO("mysql:host=$servername;dbname=ef5_proj", $username, $password);
    $link->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    echo "connection failed.<br>" . $e -> getmessage();
}