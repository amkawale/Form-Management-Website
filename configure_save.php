<?php
include ("php/config.php");

if (isset($_REQUEST["json_param"])) {
    $json_data = $_REQUEST["json_param"];

    $project_id = $json_data['project_id'];
    $tab_oid = $json_data['tab_oid'];
    $tab_name = $json_data['tab_name'];
    $theme_id = $json_data['theme_id'];
    $sort_oid = $json_data['sort_oid'];


    if ($tab_oid == 0) {
        $sql = "INSERT INTO  fm_tab_master(tab_name, theme_id, sort_oid,form_id) 
            VALUES ('" . $tab_name . "', '" . $theme_id . "', '" . $sort_oid . "','" . $project_id . "')";
    } else {
        $sql = "update fm_tab_master set  tab_name = '" . $tab_name . "', theme_id = '" . $theme_id . "', sort_oid = '" . $sort_oid . "' ";
    }

    // echo $sql;

    if ($con->query($sql) === TRUE) {
        echo "Record saved successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }

    $con->close();
}
