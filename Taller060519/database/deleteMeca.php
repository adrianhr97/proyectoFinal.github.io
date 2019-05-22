<?php

    $dbusername = "root";
    $dbpassword = "root";
    $dbservername = "localhost";
    $dbname = "test";

    $id = $_POST["id"];

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

    $sql = "DELETE FROM mecanic WHERE id = '$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Deleted";
        header("Location: ../inside.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

?> 