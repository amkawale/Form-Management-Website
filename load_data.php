<?php
//include("themetransaction.php");
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "interns";

//$stylename1{} = $_GET['style_name'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM styles";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['style_name']}</td>
                <td>{$row['css_property']}</td>
                <td>{$row['value']}</td>
                <td>
                    <button class='btn btn-info' onclick='editData({$row['id']})'>EDIT</button>
                    <button class='btn btn-danger btn-action' onclick='deleteData({$row['id']})'>DELETE</button>
                </td>
            </tr>";
    }
} else {
    echo "<tr><td colspan='5'>No data found</td></tr>";
}

$conn->close();
