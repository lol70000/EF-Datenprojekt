<?php
$servername = "localhost";
$user = "root";
$pw = "root";

try {
    $conn = new PDO("mysql:host=$servername;dbname=ef5:proj", $user, $pw);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Connected!<br>";
} catch (PDOException $e) {
    echo "Connection failed. " . $e->getMessage();
}


$name_place = $_POST['pla_name'];

if ($name_place != '') {
    $insertIntoPlace= $conn->prepare("INSERT INTO place(name) VALUES('$name_place')");

    try {
        $conn->exec($insertIntoPlace);
        echo "Daten eingefügt.<br>";
    } catch (PDOException $e) {
        echo "Insertion failed: " . $e->getMessage();
    }
};

?>