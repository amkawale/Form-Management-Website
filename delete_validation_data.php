<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "interns";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $oid = $_POST['oid'];

    $sql = "DELETE FROM vm_validation_group_master WHERE oid = $oid";

    if ($conn->query($sql) === TRUE) {
        echo "success";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
