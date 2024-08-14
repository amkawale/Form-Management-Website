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

if (isset($_REQUEST['json_param'])) {
    $json_param = ($_REQUEST['json_param']);
    $oid = $json_param['oid'];
    $row = $json_param['row'];
    $col = $json_param['col'];
    $object_id = $json_param['object_id'];

    if ($oid != "") {
        $sql = "SELECT * from fm_section_object_mapping where oid = '" . $oid . "'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $q = "DELETE FROM fm_section_object_mapping where oid = '" . $oid . "' ";
            echo $q;

        }
    }
}
?>