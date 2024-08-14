<?php
include("php/config.php");

if (isset($_REQUEST['json_param'])) {
    $json_data = $_REQUEST['json_param'];
    $object_txn_oid = $json_data['object_txn_oid'];
    $object_type_id = $json_data['object_type_id'];
    $object_name = $json_data['object_name'];
    $object_id = $json_data['object_id'];
    $object_value = $json_data['object_value'];
    $theme_id = $json_data['theme_id'];

    // exit;
    if ($object_txn_oid == 0) {
        $sql = "SELECT * FROM fm_object_type_master where object_id = '" . $object_type_id . "'";
        echo $sql . '<br>';
        $result = $con->query($sql);
        if ($result->num_rows > 0) {
            $object_Id_prefix = "";
            while ($row = $result->fetch_assoc()) {
                $object_Id_prefix = $row['object_Id_prefix'];
            }
            $object_id = $object_Id_prefix . $object_id;
        }
        $sql = "INSERT INTO fm_object_transaction (object_type_id, object_name, object_id, object_value, theme_id) VALUES ('" . $object_type_id . "','" . $object_name . "', '" . $object_id . "', '" . $object_value . "', '" . $theme_id . "')";
        echo $sql;
        // exit;

    } else {
        $sql = "update fm_object_transaction set object_name = '" . $object_name . "',  object_id = '" . $object_id . "', object_value = '" . $object_value . "', theme_id = '" . $theme_id . "' where oid = '" . $object_txn_oid . "'";
    }
    if ($con->query($sql) === TRUE) {
        echo "success";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $con->close();
}
