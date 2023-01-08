<html>
    <body style="background-color:rgba(126,74,28,0.339);">
        <h1 style="color:rgb(87, 119, 143)"> Welcome to my output page</h1>
    </body>
</html>
<?php

//Setting the page head above and below we connect to the server and the Database

$servername = "localhost";
$username = "root";
$password = "root";

try {
    $conn = new PDO("mysql:host=$servername;dbname=ef5_proj;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "<p style='color:rgb(87, 119, 143)'>Connected!<br></p>";
} catch (PDOException $e) {
    echo "<p style='color:rgb(87, 119, 143)'>Connection failed. " . $e->getMessage()."</p>";
};

//Output for each operator the name and the schichten and where these Schichten are

try{
    $x=1;
    $y=1;

    //checking how many operators there are

    $count_operator = $conn->prepare("SELECT count(name) FROM operator");
    $count_operator->execute();
    $count_op_dev = $count_operator->fetchColumn();

    while($count_op_dev[0] > $x-1){

        //Getting the name of the first operator 

        $name_op = $conn->prepare("SELECT name FROM operator where id = $x");
        $name_op->execute();
        $name_operator = $name_op -> fetchColumn();
        echo "<p style='color:rgb(87, 119, 143)'>Name : $name_operator<br></p>";

        //Getting how many times this Operator appears in the Connection Entity

        $count_conn = $conn->prepare("SELECT count(op) FROM connection WHERE op = $x");
        $count_conn->execute();
        $count_connection = $count_conn->fetchColumn();

        $x++;

        while($count_connection[0] > $y-1){

            //Getting the name of the schicht

            $operator_shift = $conn->prepare("SELECT schicht FROM connection WHERE op = $y");
            $operator_shift->execute();
            $shift_op = $operator_shift->fetchColumn();
            echo "<p style='color:rgb(87, 119, 143)'>Schicht $shift_op<br></p>";

            //getting the place

            $operator_place = $conn->prepare("SELECT place FROM connection WHERE op = $y");
            $operator_place->execute();
            $place_op = $operator_place->fetchColumn();
            echo "<p style='color:rgb(87, 119, 143)'>place of the schicht above $place_op<br></p>";
            $y++;
        };
    };
}catch(PDOException $e){
    echo "<p style='rgb(87, 119, 143)'>Connection failed ." . $e->getMessage()."</p>";
};

?>