<?php

    $dbusername = "root";
    $dbpassword = "root";
    $dbservername = "localhost";
    $dbname = "test";

    $username = $_POST["username"];
    $password = $_POST["password"];

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

    $sql = "INSERT INTO members (username, password) VALUES ('$username', PASSWORD('$password'))";


    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        header("Location: ../inside.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

?> 