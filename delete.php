<h1>
MySQL: Delete Database
</h1>

<?php

$servername = "localhost";
$username = "root";
$password = "root";

//Establish connection with database
try{
    $conn = new PDO("mysql:host=$servername;dbname=ef5_base", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected!<br>";
} catch (PDOException $e){
    echo "Connection failed.<br>". $e->getMessage();
}

try{
    $conn->exec("DROP DATABASE ef5_proj;");
    $conn->exec("CREATE DATABASE ef5_proj");
    echo "Database flushed.<br>";
} catch(PDOException $e){
    echo "Action failed: ".$e->getMessage()."<br>";
}

$conn = null;

?>