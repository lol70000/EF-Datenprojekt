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

$createTablePlace ='
    CREATE TABLE place(
        id_place INT AUTO_INCREMENT,
        name VARCHAR(100) NOT NULL,
        PRIMARY KEY(id_place),
    );';

$createTableLender ='
    CREATE TABLE lender(
        id_lender INT AUTO_INCREMENT,
        name VARCHAR(100) NOT NULL,
        money_owed VARCHAR(100) NOT NULL,
        PRIMARY KEY(id_lender),
    );';

$createTableMaterial ='
    CREATE TABLE material(
        id_material INT AUTO_INCREMENT,
        name VARCHAR(100) NOT NULL,
        anzahl_DMX TINYINT NOT NULL,
        watt_draw TINYINT NOT NULL,
        anzahl TINYINT NOT NULL,
        place INT NOT NULL,
        lender INT NOT NULL,
        PRIMARY KEY(id_material),
        FOREIGN KEY(place) REFRENCES(id_place),
        FOREIGN KEY(lender) REFRENCES(id_lender),
    );';

$createTableSchicht ='
    CREATE TABLE schicht(
        id_schicht INT AUTO_INCREMENT,
        name VARCHA(100) NOT NULL,
        from_to DATETIME NOT NULL,
        PRIMARY KEY(id_schicht),
    );';

$createTableOperator ='
    CREATE TABLE operator(
        id_operator INT AUTO_INCREMENT,
        name VARCHAR(100) NOT NULL,
        job VARCHAR(100) NOT NULL,
        schicht INT NOT NULL,
        place INT NOT NULL,
        PRIMARY KEY(id_operator),
        FOREIGN KEY(schicht) REFRENCES(id_schicht),
        FOREIGN KEY(place) REFRENCES(id_place),
    );';

try{
    $conn->exec($createTablePlace);
    $conn->exec($createTableLender);
    $conn->exec($createTableMaterial);
    $conn->exec($createTableSchicht);
    $conn->exec($createTableOperator);
    echo "Created<br>";
}catch(PDOException $e){
    echo "create failed:<br>" . $e->getMessage();
}

?>