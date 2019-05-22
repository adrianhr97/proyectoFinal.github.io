<?php
    $dbusername = "root";
    $dbpassword = "root";
    $dbservername = "localhost";
    $dbname = "test";

    $matricula = $_POST["matriculaParte"];
    $fechaEntrada = $_POST["fechaEntrada"];
    $titular = $_POST["titular"];
    $tipo = $_POST["tipo"];
    $averia = $_POST["averia"];
    $mecanico = $_POST["mecanico"];

    $conn = new mysqli($dbservername, $dbusername, $dbpassword);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $sql = "USE $dbname";
    if ($conn->query($sql) === TRUE) {
        //echo "Database entered";
    } else {
        //echo "Error accessing database: " . $conn->error;
    }

    $sql = "INSERT INTO vehicle (matricula, fechaEntrada, titular, tipo, averia, mecanico) VALUES ('$matricula', '$fechaEntrada', '$titular', '$tipo', '$averia', '$mecanico')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        header("Location: ../inside.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
?> 