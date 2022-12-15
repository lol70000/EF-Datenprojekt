<html>
    <body style="background-color:rgba(126,74,28,0.339);">
        <h1 style="color:rgb(87, 119, 143)"> Welcome to my Database Project</h1>
    </body>
</html>

<?php

$servername = "localhost";
$username = "root";
$password = "root";

//Including other documents and establishing connection with the Database

try{
    include "delete.php";
    include "create.php";
    $link = new PDO("mysql:host=$servername;dbname=ef5_proj", $username, $password);
    $link->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

}catch(PDOException $e){
    echo "<p style='color:rgb(87, 119, 143)'>connection failed.<br></p>" . $e -> getmessage();
};

try{

    //Inseting the Values for the Table Place into a list
    
    $place = ["Turnhalle", "Robotic", "Aula"];

    //inserting all Values into the Table Place 

    foreach ($place as $number){
        $insert_place = $link->prepare("INSERT INTO place(`name`) VALUES('$number')");
        $insert_place->execute();
    };
    echo "<p style='color:rgb(87, 119, 143)'>Place has been created<br></p>";

    //Inseting the Values for the Table Lender into a list

    $lender = [["Dürst Eventtechnik","7000"],
    ["Hunghäfä","300"]];

    foreach ($lender as $element){
        $insert_lender = $link->prepare("INSERT INTO lender(`name`,money_owed) VALUES('$element[0]','$element[1]')");
        $insert_lender->execute();
    };
    echo "<p style='color:rgb(87, 119, 143)'>Lender has been created<br></p>";

    //Inseting the Values for the Table Material into a list

    $material = [["MAC550",16,300,"DMX",8,1,1],
    ["MAC600",18,250,"DMX",6,1,1],
    ["Astera AX3",4,15,"CRMX",8,2,1],
    ["Astera AX5",4,45,"CRMX",8,2,1],
    ["Mikrofon Set",0,0,"XLR",3,1,1],
    ["Bühnen Teile und Trassen",0,0,"Mechanical",200,1,1],
    ["PA System",0,900,"XLR/DATACON",1,1,1],
    ["Hallen Boden",0,0,"Klebeband",1,1,2]];

    foreach ($material as $mat){
        $insert_material = $link->prepare("INSERT INTO material(`name`,anzahl_DMX,watt_draw,connection_type,anzahl,place,lender) VALUES('$mat[0]',$mat[1],$mat[2],'$mat[3]',$mat[4],$mat[5],$mat[6])");
        $insert_material->execute();
    };
    echo "<p style='color:rgb(87, 119, 143)'>Material has been created<br></p>";

    //Inseting the Values for the Table Schicht into a list

    $schicht = [["Donnerstag_Abend",1700,2400],
    ["Freitag_Morgen",800,1200],
    ["Freitag_Nachmittag",1300,1930],
    ["Freitag_Kaba1",1930,2300],
    ["Freitag_Kaba",2300,300],
    ["Samstag_Aufräumen",300,1200],
    ["All",1700,1200]];

    foreach ($schicht as $sic){
        $insert_schicht = $link->prepare("INSERT INTO schicht(`name`, `beginn`, `end`) VALUES('$sic[0]',$sic[1],$sic[2])");
        $insert_schicht->execute();
    };
    echo "<p style='color:rgb(87, 119, 143)'>Schicht has been created<br></p>"; 

    //Inseting the Values for the Table Operator into a list
    
    $operator = [["Cyrill","slave"],
    ["Alicia","helper"],
    ["Laurin","slave2.0"],
    ["Tobias","Chief"],
    ["Sebastian","second Chief"],
    ["Kajanan","helper with knowledge"]];

    foreach ($operator as $op){
        $insert_operator = $link->prepare("INSERT INTO operator(`name`,`job`) VALUES('$op[0]','$op[1]')");
        $insert_operator->execute();
    };
    echo "<p style='color:rgb(87, 119, 143)'>Operator has been created<br></p>";
    //Inseting the Values for the Table Connect into a list

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
    [6,4,3]];

    foreach ($connect as $conne){
        $check_for_operator_connection = $link->prepare("SELECT EXISTS(SELECT id_operator FROM operator WHERE name = '$conne[0]');");
        $check_for_operator_connection->execute();
        $operator_connection_definitiv = $check_for_operator_connection->fetchColumn();

        $check_for_schicht_connection = $link->prepare("SELECT EXISTS(SELECT id_operator FROM operator WHERE name = '$conne[0]');");
        $check_for_schicht_connection->execute();
        $schicht_connection_definitiv = $check_for_schicht_connection->fetchColumn();

        $check_for_place_connection = $link->prepare("SELECT EXISTS(SELECT id_operator FROM operator WHERE name = '$conne[0]');");
        $check_for_place_connection->execute();
        $place_connection_definitiv = $check_for_place_connection->fetchColumn();

        $insert_connect = $link->prepare("INSERT INTO connection(op, schicht, place) VALUES($operator_connection_definitiv,$schicht_connection_definitiv,$place_connection_definitiv)");
        $insert_connect->execute();
    };
    echo "<p style='color:rgb(87, 119, 143)'>Connection has been created<br></p>";

}catch(PDOException $e){
    echo "<p style='color:rgb(87, 119, 143)'>creation failed.<br></p>" . $e -> getmessage();
}

?>
<a href="http://localhost/us_opt1/db_structure.php?server=1&db=ef5_proj" target="_blank">php MyAdmin</a>
<br><a href="http://localhost/form.php" target="_blank">Insert Values</a>
<a href="http://localhost/test.php" target="_blank">Lets Test this shit</a>