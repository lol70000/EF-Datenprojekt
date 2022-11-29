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

    $place = ["Turnhalle","Robotic", "Aula"];
    foreach ($place as $number){
        $lol = $link->prepare("INSERT INTO place(name) Values('$number')");
    }
        

}catch(PDOException $e){
    echo "connection failed.<br>" . $e -> getmessage();
}