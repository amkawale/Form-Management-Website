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

$sql = "SELECT * FROM formdata";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['project_type']}</td>
                <td>{$row['form_name']}</td>
                <td>In-progress</td>
                <td>{$row['project_group']}</td>
                <td>{$row['project_type']}</td>
                <td>
                    <button class='btn btn-info btn-action' onclick='editData({$row['id']})'>Edit</button>
                    <button class='btn btn-primary btn-action' onclick='configureData({$row['id']})'>Configure</button>
                    <button class='btn btn-danger btn-action' onclick='deleteData({$row['id']})'>Delete</button>
                </td>
            </tr>";
    }
} else {
    echo "<tr><td colspan='6'>No data found</td></tr>";
}

$conn->close();
