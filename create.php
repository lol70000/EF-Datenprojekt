<h1>My SQL Connection: Create Database</h1>

<?php

$servername = "localhost";
$username = "root";
$password = "root";

try{
    $conn = new PDO("mysql:host=$servername;dbname=ef5_base", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    echo "Connected!<br>";
}catch (PDOException $e){
    echo "connection failed.<br>" . $e -> getmessage();
}

//Beliebtheit lehrpersonen
// Entitäten:
//  -lehrpersonen
//  -id_lehrperson
//      --Name: String
//      --Vorname: String
//      --Schulfach: Fremdschlüssel Schulfach
//
//  -bewertung
//      --id_bewertung
//      --Humor: 1-6
//      --Unterricht: 1-6
//      --Prüfungen: 1-6
//      --Fachwissen: 1-6
//      --Querbezug: Boolean
//      --Lehrperson: Fremdschlüssel Lehrperson
//
//  -Schulfach
//      --id_schulfach
//      --Name:String

$createTableLehrperson ='
    Create Table lehrperson(
        id_lehrperson INT AUTO_INCREMENT,
        first_name VARCHAR(100) NOT NULL,
        last_name VARCHAR(100) NOT NULL,
        schulfach INT NOT NULL,
        PRIMARY KEY(id_lehrperson),
        FOREIGN KEY(schulfach) REFERENCES schulfach(id_schulfach)
    );';

$createTabeleBewertung ='
    Create Table bewertung(
        id_bewertung INT AUTO_INCREMENT,
        humor TINYINT NOT NULL,
        unterricht TINYINT NOT NULL,
        pruefungen TINYINT NOT NULL,
        fachwissen TINYINT NOT NULL,
        querbezug TINYINT NOT NULL,
        lehrperson INT NOT NULL,
        PRIMARY KEY(id_bewertung),
        FOREIGN KEY(lehrperson) REFERENCES lehrperson(id_lehrperson)
    );';

$createTabeleSchulfach ='
    Create Table schulfach(
        id_schulfach INT AUTO_INCREMENT,
        name VARCHAR(100) NOT NULL,
        PRIMARY KEY(id_schulfach)
    );';

$createTableVLS ='
    Create Table vls(
        id_vls INT AUTO_INCREMENT,
        lehrperson INT NOT NULL,
        schulfach INT NOT NULL,
        PRIMARY KEY(id_vls),
        FOREIGN KEY(lehrperson) REFERENCES lehrperson(id_lehrperson),
        FOREIGN KEY(schulfach) REFERENCES schulfach(id_schulfach)
    );';

try {
    $conn->exec($createTabeleSchulfach);
    $conn->exec($createTableLehrperson);
    $conn->exec($createTabeleBewertung);
    //$conn->exec($createTableVLS);
    echo "Created<br>";
}catch(PDOException $e){
    echo "Create Table Lehrpersonen failed:<br>" . $e->getMessage();
}

?>