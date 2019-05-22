<?php

$dbusername = "root";
$dbpassword = "root";
$dbservername = "localhost";
$dbname = "test";

$matricula = $_POST["matricula"];

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

$sql = "SELECT matricula, titular, tipo FROM vehicle WHERE matricula = '$matricula'";

$result = $conn->query($sql);
$final = array();

if ($result->num_rows > 0) {
    $i = 0;
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $final[$i] = array($row["matricula"], $row["titular"], $row["tipo"]);
        $i++;
    }
} else {
    echo "No results";
}

echo json_encode((array)$final);
$conn->close();
?> 