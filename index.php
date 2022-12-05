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

    $place = ["Turnhalle", "Robotic", "Aula"];

    foreach ($place as $number){
        $insert_place = $link->prepare("INSERT INTO place(name) VALUES('$number')");
        $insert_place->execute();
    };
    echo "Place has been created<br>";

    $lender = [["Dürst Eventtechnik","7000"],
    ["Hunghäfä","300"]]

    foreach ($lender as $element){
        $insert_lender = $link->prepare("INSERT INTO lender(name,money_owed) VALUES('$element[0]','$element[1]')");
        $insert_lender->execute();
    };
    echo "Lender has been created<br>";

    $material = [["MAC550",16,300,8,1,1],
    ["MAC600",18,250,6,1,1],
    ["Astera AX3",4,15,8,2,1],
    ["Astera AX5",4,45,8,2,1],
    ["Mikrofon Set",0,0,3,1,1],
    ["Bühnen Teile und Trassen",0,0,200,1,1],
    ["PA System",0,900,1,1,1],
    ["Hallen Boden",0,0,1,1,2]];

    foreach ($material as $mat){
        $insert_material = $link->prepare("INSERT INTO material(name,anzahl_DMX,watt_draw,anzahl,place,lender) VALUES('$mat[0]','$mat[1]','$mat[2]','$mat[3]','$mat[4]','$mat[5]')");
        $insert_material->execute();
    };
    echo "Material has been created<br>";

    $schicht = [["Donnerstag_Abend",1700,2400],
    ["Freitag_Morgen",0800,1200],
    ["Freitag_Nachmittag",1300,1930],
    ["Freitag_Kaba1",1930,2300],
    ["Freitag_Kaba",2300,0300],¨
    ["Samstag_Aufräumen",0300,1200],
    ["All",1700,1200]];

    foreach ($schicht as $sic){
        $insert_schicht = $link->prepare("INSERT INTO schicht(name, from, to) VALUES('$sic[0]','$sic[1]','$sic[2])");
        $insert_schicht->execute();
    };
    echo "Schicht has been created<br>"; 
    
    $operator = [["Cyrill","slave"],
    ["Alicia","helper"],
    ["Laurin","slave2.0"],
    ["Tobias","Chief"],
    ["Sebastian","second Chief"],
    ["Kajanan","helper with knowledge"]];

    foreach ($operator as $op){
        $insert_operator = $link->prepare("INSERT INTO operator(name,job) VALUES('$op[0]','$op[1])");
        $insert_operator->execute();
    };

    $connect = [[1,1,1],
    [1,2,1],
    [1,4,2],
    [2,4,2],
    [3,5,2],
    [3,1,1],
    [4,7,1],
    [5,4,1],
    [5,5,1],
    [5,6,1],
    [6,3,3],
    [6,4,3]]

    foreach ($connect as $conn){
        $insert_connect = $link->prepare("INSERT INTO connect(op, schicht, place) VALUES('$conn[0]','$conn[1]','$conn[2])");
        $insert_connect->execute();
    };

}catch(PDOException $e){
    echo "connection failed.<br>" . $e -> getmessage();
}