<?php
$servername = "localhost";
$user = "root";
$pw = "root";

try {
    $conn = new PDO("mysql:host=$servername;dbname=ef5_proj", $user, $pw);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "<p style='color:rgb(87, 119, 143)'>Connected!<br></p>";
} catch (PDOException $e) {
    echo "<p style='color:rgb(87, 119, 143)'>Connection failed. " . $e->getMessage()."</p>";
};


$name_place = $_POST['pl_name'];

if ($name_place != NULL) {
    $insertIntoPlace = $conn->prepare("INSERT INTO place(name) VALUES('$name_place')");

    try {
        $insertIntoPlace->execute();
        echo "<p style='color:rgb(87, 119, 143)'>Place eingefügt.<br></p>";
    } catch (PDOException $e) {
        echo "<p style='color:rgb(87, 119, 143)'>place has failed: " . $e->getMessage(). "<br></p>";
    };
};

$name_lender = $_POST['ln_name'];
$money_lender = $_POST['ln_money'];

if ($name_lender != NULL && $money_lender != NULL){
    $insertIntoLender = $conn->prepare("INSERT INTO lender(name, money_owed) VALUES('$name_lender',$money_lender)");

    try{
        $insertIntoLender->execute();
        echo "<p style='color:rgb(87, 119, 143)'>Lender eingefügt.<br></p>";
    }catch(PDOException $e){
        echo "<p style='color:rgb(87, 119, 143)'>Lender has failed: " . $e->getMessage(). "<br></p>";
    };
};

$name_material = $_POST['ma_name'];
$dmx_material = $_POST['ma_dmx'];
$watt_material = $_POST['ma_watt'];
$conn_material = $_POST['ma_con_type'];
$anzahl_material = $_POST['ma_anz'];
$place_material = $_POST['ma_place'];
$lender_material = $_POST['ma_lender'];

if ($name_material != NULL && $dmx_material != NULL && $watt_material != NULL && $conn_material != NULL && $anzahl_material != NULL && $place_material != NULL && $lender_material!= NULL){
    $insertIntoMaterial = $conn->prepare("INSERT INTO material(name, anzahl_DMX, watt_draw, connection_type, anzahl, place, lender) VALUES('$name_material', $dmx_material, $watt_material, '$conn_material' , $anzahl_material, $place_material, $lender_material)");

    try{
        $insertIntoMaterial->execute();
        echo "<p style='color:rgb(87, 119, 143)'>Material eingefügt.<br></p>";
    }catch(PDOException $e){
        echo "<p style='color:rgb(87, 119, 143)'>Material has failed: " . $e->getMessage()."<br></p>";
    };
};

$name_schicht = $_POST['sh_name'];
$beginn_schicht = $_POST['sh_beginn'];
$end_schicht = $_POST['sh_end'];

if ($name_schicht != NULL && $beginn_schicht != NULL && $end_schicht != NULL){
    $insertIntoSchicht = $conn->prepare("INSERT INTO schicht(name, beginn, end) VALUES($name_schicht, $beginn_schicht, $end_schicht)");

    try{
        $insertIntoSchicht->execute();
        echo "<p style='color:rgb(87, 119, 143)'>Schicht eingefügt.<br></p>";
    }catch(PDOException $e){
        echo "<p style='color:rgb(87, 119 ,143)'>Schicht has failed: " . $e->getMessage(). "<br></p>";
    };
};

$name_operator = $_POST['op_name'];
$job_operator = $_POST['op_job'];

if ($name_operator != NULL && $job_operator != NULL){
    $insertIntoOperator = $conn->prepare("INSERT INTO operator(name, job) VALUES('$name_operator',' $job_operator')");

    try{
        $insertIntoOperator->execute();
        echo "<p style='color:rgb(87, 119, 143)>Operator eingefügt.<br></p>";
    }catch(PDOException $e){
        echo "<p style='color:rgb(87, 119, 143)>Operator has failed: " . $e->getMessage() . "<br></p>";
    };
};

$operator_connection = $_POST['con_op'];
$schicht_connection = $_POST['con_sh'];
$place_connection = $_POST['con_pl'];

if ($operator_connection != NULL && $schicht_connection != NULL && $place_connection != NULL){
    $insertIntoConnection = $conn->prepare("INSERT INTO(op, schicht, place) VALUES($operator_connection, $schicht_connection, $place_connection)");

    try{
        $insertIntoConnection->execute();
        echo "<p style='color:rgb(87, 119 ,143)>Connection eingefügt.<br></p>";
    }catch(PDOException $e){
        echo "<p style='color:rgb(87, 119, 143)>Connection has failed: ". $e->getMessage() . "<br></p>";
    };
};


?>