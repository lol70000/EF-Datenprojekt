<h1 style="color:rgb(87, 119, 143)">Welcome to my EF5_Databrojekt</h1>
<?php

$servername = "localhost";
$username = "root";
$password = "root";

//Connecting to Server and Setting Error Trap
try{
    $conn = new PDO("mysql:host=$servername;dbname=ef5_proj",$username,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    echo "<p style='color:rgb(87, 119, 143)'>Connected!<br></p>";
}catch(PDOException $e){
    echo "<p style='color:rgb(87, 119, 143)'>connection failed.<br>" . $e -> getmessage()."</p>";
}

//Preparing all Databases

$createTablePlace ='
    CREATE TABLE place(
        id_place INT AUTO_INCREMENT,
        name VARCHAR(100) NOT NULL,
        PRIMARY KEY(id_place)
    );';

$createTableLender ='
    CREATE TABLE lender(
        id_lender INT AUTO_INCREMENT,
        name VARCHAR(100) NOT NULL,
        money_owed VARCHAR(100) NOT NULL,
        PRIMARY KEY(id_lender)
    );';

$createTableMaterial ='
    CREATE TABLE material(
        id_material INT AUTO_INCREMENT,
        name VARCHAR(100) NOT NULL,
        anzahl_DMX TINYINT NOT NULL,
        watt_draw INT NOT NULL,
        connection_type VARCHAR(100),
        anzahl INT NOT NULL,
        place INT NOT NULL,
        lender INT NOT NULL,
        PRIMARY KEY(id_material),
        FOREIGN KEY(place) REFERENCES place(id_place),
        FOREIGN KEY(lender) REFERENCES lender(id_lender)
    );';

$createTableSchicht ='
    CREATE TABLE schicht(
        id_schicht INT AUTO_INCREMENT,
        name VARCHAR(100) NOT NULL,
        beginn INT NOT NULL,
        end INT NOT NULL,
        PRIMARY KEY(id_schicht)
    );';

$createTableOperator ='
    CREATE TABLE operator(
        id_operator INT AUTO_INCREMENT,
        name VARCHAR(100) NOT NULL,
        job VARCHAR(100) NOT NULL,
        PRIMARY KEY(id_operator)
    );';

$createTableConnect ='
    CREATE TABLE connection(
        id_connect INT AUTO_INCREMENT,
        op INT NOT NULL,
        schicht INT NOT NULL,
        place INT NOT NULL,
        PRIMARY KEY(id_connect),
        FOREIGN KEY(op) REFERENCES operator(id_operator),
        FOREIGN KEY(schicht) REFERENCES schicht(id_schicht),
        FOREIGN KEY(place) REFERENCES place(id_place)
    );';

//Creating Databases

try{
    $conn->exec($createTablePlace);
    $conn->exec($createTableLender);
    $conn->exec($createTableMaterial);
    $conn->exec($createTableSchicht);
    $conn->exec($createTableOperator);
    $conn->exec($createTableConnect);
    echo "<p style='color:rgb(87, 119, 143)'>Created<br></p>";
}catch(PDOException $e){
    echo "<p style='color:rgb(87, 119, 143)'>create failed:<br>" . $e->getMessage()."</p>";
}

?>