<h1> MySQL go Br</h1>
<?php

$servername = "localhost";
$username = "root";
$password = "root";
try{
    include "delete.php";
    include "create.php";
    $link = new PDO("mysql:host=$servername;dbname=ef5_base", $username, $password);
    $link->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    

    $insert_beat = $link->prepare("INSERT INTO lehrperson(first_name, last_name ,schulfach) Values('Beat','Temperli','1')");
    $lol = $link->prepare("INSERT INTO schulfach(name) Values('Informatik')");
    $insert_Timon = $link->prepare("INSERT INTO lehrperson(first_name, last_name ,schulfach) Values('Timon','Ruther','1')");

    $lol->execute();
    $insert_beat->execute();
    $insert_Timon->execute();
}catch(PDOException $e){
    echo "connection failed.<br>" . $e -> getmessage();
}