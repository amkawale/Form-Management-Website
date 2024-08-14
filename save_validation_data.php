<?php
include("php/config.php");

if (isset($_REQUEST["json_param"])) {
    $json_data = $_REQUEST["json_param"];

    $projectGroup = "";
    $projectType = '';
    // $oid = $json_data['oid'];
    $vgroup_id = $json_data['vgroup_id'];
    $vgroup_description = $json_data['vgroup_description'];
    // $toggleStatus = $json_data['toggleStatus'];

    if ($oid == 0) {
        $sql = "INSERT INTO vm_validation_group_master (vgroup_id, vgroup_description) 
            VALUES ('$vgroup_id', '$vgroup_description')";
    } else {
        $sql = "UPDATE vm_validation_group_master SET vgroup_description = '" . $vgroup_description . "' where oid = '" . $oid . "'";
    }

    // echo $sql;

    if ($con->query($sql) === TRUE) {
        echo "Record saved successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }

    $con->close();
}
