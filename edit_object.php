<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "interns";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $object_id = $_POST['object_id'];
    $object_name = $_POST['object_name'];
    $object_value = $_POST['object_value'];

    // Update the object's details
    $sql = "UPDATE objects SET object_name = ?, object_value = ? WHERE object_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $object_name, $object_value, $object_id);

    if ($stmt->execute()) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $stmt->close();
}

$conn->close();
