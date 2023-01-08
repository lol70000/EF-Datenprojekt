<h1 style="color:rgb(87, 119, 143)">
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
    echo "<p style='color:rgb(87, 119, 143)'>Connected!<br></p>";
} catch (PDOException $e){
    echo "<p style='color:rgb(87, 119, 143)'>Connection failed.<br></p>". $e->getMessage();
}

//Droping Database and creating it again in order to enshure no items are accidentaly in the Database twice at initiation

try{
    $conn->exec("DROP DATABASE ef5_proj");
    $conn->exec("CREATE DATABASE ef5_proj");
    echo "<p style='color:rgb(87, 119, 143)'>Database flushed.<br></p>";
} catch(PDOException $e){
    echo "<p style='color:rgb(87, 119, 143)'>Action failed: ".$e->getMessage()."<br></p>";
}

$conn = null;

?>