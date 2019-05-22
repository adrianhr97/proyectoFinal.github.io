<?php

session_start();

$dbhostname = 'localhost';        
$dbname = 'test';
$dbusername = 'root';
$dbpassword = 'root';

// Let's connect to host
$conn = new mysqli($dbhostname, $dbusername, $dbpassword);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "USE $dbname";
    if ($conn->query($sql) === TRUE) {
        //echo "Success";
    } else {
        //echo "Error";
    }
    $conn->set_charset("utf8");


$sql = "SELECT * FROM members WHERE (username = '" . $_POST['user'] . "') and (password = PASSWORD('" . $_POST['pass'] . "'))";
$result = $conn->query($sql);
    
    if ($result->num_rows == 1) {
        $_SESSION['username'] = $_POST['user'];
        header('Location: ../inside.php');
    } else {
        header('Location: ../index.php');
    }

?>