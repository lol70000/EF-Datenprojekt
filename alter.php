<html>
    <body style="background-color:rgba(126,74,28,0.339);">
        <h1 style="color:rgb(87, 119, 143)"> You will never stop Altering</h1>
        <p style="color:rbg(87,119,143)">Get it?</p>
    </body>
</html>

<?php
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

$data_to_alter = $_POST['alter_data'];
$table_data = $_POST['where'];
$what_in_data = $_POST['what'];
$new_data = $_POST['new_data'];

if ($table_data == "place"){
    $id_table_data = "id_place";
}elseif($table_data == "lender"){
    $id_table_data = "id_lender";
}elseif($table_data == "material"){
    $id_table_data = "id_material";
}elseif($table_data == "schicht"){
    $id_table_data = "id_schicht";
}elseif($table_data == "operator"){
    $id_table_data = "id_operator";
};

try{
    $check_id_data = $conn->prepare("SELECT $id_table_data FROM $table_data WHERE name = '$data_to_alter'");
    $check_id_data->execute();
    $id_data = $check_id_data->fetchColumn();
    $pre_update = $conn->prepare("UPDATE $table_data SET $what_in_data = '$new_data' WHERE $id_table_data = '$id_data'");
    $pre_update->execute();
    echo "everything is working";
}catch(PDOException $e){
    echo"<p style='color:rgb(87, 119. 143)'>Connection failed. " . $e->getMessage()."</p>";
};

?>