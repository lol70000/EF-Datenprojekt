<h1>MySQL Connection: Test Database</h1>

<?php

// mysql console:
// 
// Zeige alle Datenbanken:
// mysql> show databases;
//
// Erstelle eine Datenbank "test_ef5":
// mysql> CREATE DATABASE test_ef5;

$servername = "localhost";
$user = "root";
$pw = "root";

try {
    $conn = new PDO("mysql:host=$servername;dbname=ef5_proj", $user, $pw);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Connected!<br>";
} catch (PDOException $e) {
    echo "Connection failed. " . $e->getMessage();
}

$test_place= ["trololoololololololololololololololololololololololololololololololololololololololololololololololololololololololololololololololololololololololololololololololololololololololololololololololololololol"];




foreach ($test_place as $value) {
    $insert = "
    INSERT INTO place(name)
        VALUES ('$value');";

    try {
        $conn->exec($insert);
        echo "Tests ausgeführt, obwohl es nicht so sein sollte.<br>";
    } catch (PDOException $e) {
        echo "<br>Tests erfolgreich. Fehler erkannt: " . $e->getMessage();
    }
}

$test_place_e = [
    ['Informatik']
];

foreach ($test_place_e as $value) {
    $insert = "
    INSERT INTO place(name)
        VALUES ('$value[0]');";

    try {
        $conn->exec($insert);
        echo "<br>Daten eingetragen.<br>";
    } catch (PDOException $e) {
        echo "<br>Daten nicht eingetragen. Fehler erkannt: " . $e->getMessage();
    }
}

$stmt = $conn->query("SELECT * FROM place");
$fach = $stmt->fetchAll();

$lastentry = $fach[count($fach) - 1];

echo $lastentry['id_place'];
echo $lastentry['name'];

if ($lastentry['name'] == 'Informatik') {
    echo "<br>Tests erfolgreich.";
}

else {
    echo "<br>Tests nicht erfolgreich.";
}


?>