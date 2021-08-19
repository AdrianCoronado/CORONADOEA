<?php
$server = "mysql:dbname=CORONADO;host=localhost";
$username = "root";
$password = "";


try {
    // $conn = new PDO("mysql:host=$servername;dbname=myDB", $username, $password);
    // set the PDO error mode to exception

    //$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $conn = new PDO($server, $username, $password);
    //echo "Connected successfully";
} catch (PDOException $e) {

    echo "Connection failed: " . $e->getMessage();
}
