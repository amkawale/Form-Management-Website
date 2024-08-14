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

$sql = "SELECT * FROM objects";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['object_name']}</td>
                <td>{$row['object_id']}</td>
                <td>{$row['object_value']}</td>
                <td>{$row['theme']}</td>
                <td>
                    <button class='btn btn-info btn-action' onclick='editData({$row['id']})'>Edit</button>
                    <button class='btn btn-primary btn-action' onclick='configureData({$row['id']})'>Configure</button>

                    <button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#exampleModal'>
                    Configure
                        </button>
                        <div class='modal fade' id='exampleModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                        <div class='modal-dialog'>
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <h1 class='modal-title fs-5' id='exampleModalLabel'>Modal title</h1>
                                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                </div>
                                <div class='modal-body'>
                                    ...
                                </div>
                                <div class='modal-footer'>
                                    <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                                    <button type='button' class='btn btn-primary'>Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class='btn btn-danger btn-action' onclick='deleteData({$row['id']})'>Delete</button>
                </td>
            </tr>";
    }
} else {
    echo "<tr><td colspan='6'>No data found</td></tr>";
}

$conn->close();
