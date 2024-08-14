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
    $json_data = $_REQUEST['json_param'];
    $oid = $json_data['oid'];
    $styleName = $json_data['styleName'];
    $cssProperty = $json_data['cssProperty'];
    $value = $json_data['value'];
    $theme_id = $json_data['theme_id'];
    $object_type_id = $json_data['object_type_id'];


    if ($oid == 0) {
        $sql = "INSERT INTO fm_theme_transaction (theme_id, object_type_id, css_property, css_property_value) VALUES ('" . $theme_id . "','" . $object_type_id . "','" . $cssProperty . "', '" . $value . "')";
    } else {
        $sql = "UPDATE fm_theme_transaction SET css_property= '" . $cssProperty . "',css_property_value='" . $value . "' WHERE oid = '" . $oid . "' and object_type_id = '" . $object_type_id . "' and theme_id = '" . $theme_id . "'";
    }

    // echo $sql;
    // exit;
    if ($conn->query($sql) === TRUE) {
        echo "success";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
