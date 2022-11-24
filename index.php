<h1>Welcome to my EF5_Databrojekt</h1>
<?php

$servername = "localhost";
$username = "root";
$password = "root";

//Connecting to Server and Setting Error Trap
try{
    $conn = new PDO("mysql:host=$servername;dbname=ef5_proj",$username,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    echo "Connected!<br>";
}catch(PDOException $e){
    echo "connection failed.<br>" . $e -> getmessage();
}

$createTableMaterial ='
    CREATE TABLE material(
        id_material INT AUTO_INCREMENT,
        name VARCHAR(100) NOT NULL,
        anzahl_DMX TINYINT NOT NULL,
        watt_draw TINYINT NOT NULL,
        anzahl TINYINT NOT NULL,
    );';