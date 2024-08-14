<?php
include("php/config.php");

if (isset($_REQUEST["json_param"])) {
    $json_data = $_REQUEST["json_param"];

    $projectGroup = "";
    $projectType = '';
    // $oid = $json_data['oid'];
    $agroup_id = $json_data['agroup_id'];
    $agroup_description = $json_data['agroup_description'];
    // $toggleStatus = $json_data['toggleStatus'];

    if ($oid == 0) {
        $sql = "INSERT INTO vm_action_group_master (agroup_id, agroup_description) 
            VALUES ('$agroup_id', '$agroup_description')";
    }
    // else {
    //     $sql = "update vm_validation_group_master set agroup_id = '" . $agroup_id . "', agroup_description = '" . $agroup_description . "' where oid = '" . $oid . "'";
    // }

    // echo $sql;

    if ($con->query($sql) === TRUE) {
        echo "Record saved successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }

    $con->close();
}
