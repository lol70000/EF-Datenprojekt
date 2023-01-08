<html>
    <body style="background-color:rgba(126,74,28,0.339);">
        <h1 style="color:rgb(87, 119, 143)"> Im happy you have made it to this Point</h1>
    </body>
</html>

<?php

//Conection to the server and Database is established

$servername = "localhost";
$user = "root";
$pw = "root";

try {
    $conn = new PDO("mysql:host=$servername;dbname=ef5_proj;charset=utf8", $user, $pw);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "<p style='color:rgb(87, 119, 143)'>Connected!<br></p>";
} catch (PDOException $e) {
    echo "<p style='color:rgb(87, 119, 143)'>Connection failed. " . $e->getMessage()."</p>";
};

//Getting the Value from the form.php document

$name_place = $_POST['pl_name'];

//Checking if the Value we got have something in them and if they do they are inserted into the database

if ($name_place != NULL) {
    $insertIntoPlace = $conn->prepare("INSERT INTO place(name) VALUES('$name_place')");

    try {
        $insertIntoPlace->execute();
        echo "<p style='color:rgb(87, 119, 143)'>Place eingefügt.<br></p>";
    } catch (PDOException $e) {
        echo "<p style='color:rgb(87, 119, 143)'>place has failed: " . $e->getMessage(). "<br></p>";
    };
};

//Getting the Values from the from.php document

$name_lender = $_POST['ln_name'];
$money_lender = $_POST['ln_money'];

//Checking if none of the Values are Null and if that is true the get Inserted into the Corresponding Database

if ($name_lender != NULL && $money_lender != NULL){
    $insertIntoLender = $conn->prepare("INSERT INTO lender(name, money_owed) VALUES('$name_lender',$money_lender)");

    try{
        $insertIntoLender->execute();
        echo "<p style='color:rgb(87, 119, 143)'>Lender eingefügt.<br></p>";
    }catch(PDOException $e){
        echo "<p style='color:rgb(87, 119, 143)'>Lender has failed: " . $e->getMessage(). "<br></p>";
    };
};

//Getting the Values from the Database

$name_material = $_POST['ma_name'];
$dmx_material = $_POST['ma_dmx'];
$watt_material = $_POST['ma_watt'];
$conn_material = $_POST['ma_con_type'];
$anzahl_material = $_POST['ma_anz'];
$place_material = $_POST['ma_place'];
$lender_material = $_POST['ma_lender'];

//checking if the place given is already existant in the Place Entity

$check_for_place_material = $conn->prepare("SELECT EXISTS(SELECT id_place FROM place WHERE name = '$place_material');");
$check_for_place_material->execute();
$place_material_definitiv = $check_for_place_material->fetchColumn();

if ($place_material_definitiv == 0){
    throw new Exception("Der angegebene Platz $place_material ist nicht in der Datenbank vorhanden oder falsch geschrieben!");
};

//Checking if the Lender given is already existant in the Place entity

$check_for_lender_material = $conn->prepare("SELECT EXISTS(SELECT id_lender FROM lender WHERE name = '$lender_material');");
$check_for_lender_material->execute();
$lender_material_definitiv = $check_for_lender_material->fetchColumn();

if ($lender_material_definitiv == 0){
    throw new Exception("Der angegebene Leier $lender_material ist nicht in der Datenbank vorhanden oder falsch geschrieben!");
};

//Checking if any of the nedded Values are Null and if not they are inserted into the material Entity

if ($name_material != NULL && $dmx_material != NULL && $watt_material != NULL && $conn_material != NULL && $anzahl_material != NULL && $place_material_definitiv != NULL && $lender_material_definitiv != NULL){
    $insertIntoMaterial = $conn->prepare("INSERT INTO material(name, anzahl_DMX, watt_draw, connection_type, anzahl, place, lender) VALUES('$name_material', $dmx_material, $watt_material, '$conn_material' , $anzahl_material, '$place_material_definitiv', $lender_material_definitiv)");

    try{
        $insertIntoMaterial->execute();
        echo "<p style='color:rgb(87, 119, 143)'>Material eingefügt.<br></p>";
    }catch(PDOException $e){
        echo "<p style='color:rgb(87, 119, 143)'>Material has failed: " . $e->getMessage()."<br></p>";
    };
};

//Getting the Schicht vaalues from the from.php document

$name_schicht = $_POST['sh_name'];
$beginn_schicht = $_POST['sh_beginn'];
$end_schicht = $_POST['sh_end'];

//Checking if none of the given Values are Null and if not they are inserted into the Database

if ($name_schicht != NULL && $beginn_schicht != NULL && $end_schicht != NULL){
    $insertIntoSchicht = $conn->prepare("INSERT INTO schicht(name, beginn, end) VALUES($name_schicht, $beginn_schicht, $end_schicht)");

    try{
        $insertIntoSchicht->execute();
        echo "<p style='color:rgb(87, 119, 143)'>Schicht eingefügt.<br></p>";
    }catch(PDOException $e){
        echo "<p style='color:rgb(87, 119 ,143)'>Schicht has failed: " . $e->getMessage(). "<br></p>";
    };
};

//Getting the Values for the opperator from the from.php document

$name_operator = $_POST['op_name'];
$job_operator = $_POST['op_job'];

//Checking if none of the given Values are Null and if not they are inserted into the Database

if ($name_operator != NULL && $job_operator != NULL){
    $insertIntoOperator = $conn->prepare("INSERT INTO operator(name, job) VALUES('$name_operator',' $job_operator')");

    try{
        $insertIntoOperator->execute();
        echo "<p style='color:rgb(87, 119, 143)>Operator eingefügt.<br></p>";
    }catch(PDOException $e){
        echo "<p style='color:rgb(87, 119, 143)>Operator has failed: " . $e->getMessage() . "<br></p>";
    };
};

//Getting the Values from the from.php document

$operator_connection = $_POST['con_op'];
$schicht_connection = $_POST['con_sh'];
$place_connection = $_POST['con_pl'];

//checking if the operator already exists in the operator entity

$check_for_operator_connection = $conn->prepare("SELECT EXISTS(SELECT id_operator FROM operator WHERE name = '$operator_connection');");
$check_for_operator_connection->execute();
$operator_connection_definitiv = $check_for_operator_connection->fetchColumn();

if ($operator_connection_definitiv == 0){
    throw new Exception("Der angegebene Operator $operator_connection ist nicht in der Datenbank vorhanden oder falsch geschrieben!");
};

//Checking if the schicht given is already existant in the schicht entity

$check_for_schicht_connection = $conn->prepare("SELECT EXISTS(SELECT id_schicht FROM schicht WHERE name = '$schicht_connection');");
$check_for_schicht_connection->execute();
$schicht_connection_definitiv = $check_for_schicht_connection->fetchColumn();

if ($schicht_connection_definitiv == 0){
    throw new Exception("Die angegebene Schicht $schicht_connection ist nicht in der Datenbank vorhanden oder falsch geschrieben!");
};

//Checking if the place given is already existant in the Place entity

$check_for_place_connection = $conn->prepare("SELECT EXISTS(SELECT id_place FROM place WHERE name = '$place_connection');");
$check_for_place_connection->execute();
$place_connection_definitiv = $check_for_place_connection->fetchColumn();

if ($operator_connection_definitiv == 0){
    throw new Exception("Der angegebene Platz $place_connection ist nicht in der Datenbank vorhanden oder falsch geschrieben!");
};

//Inserting the Values if none of them are Null

if ($operator_connection_definitiv != NULL && $schicht_connection_definitiv != NULL && $place_connection_definitiv != NULL){
    $insertIntoConnection = $conn->prepare("INSERT INTO(op, schicht, place) VALUES($operator_connection_definitiv, $schicht_connection_definitiv, $place_connection_definitiv)");

    try{
        $insertIntoConnection->execute();
        echo "<p style='color:rgb(87, 119 ,143)>Connection eingefügt.<br></p>";
    }catch(PDOException $e){
        echo "<p style='color:rgb(87, 119, 143)>Connection has failed: ". $e->getMessage() . "<br></p>";
    };
};


?>