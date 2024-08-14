<?php
include ("php/config.php");

if (isset($_REQUEST["json_param"])) {
    $json_data = $_REQUEST["json_param"];
    $project_id = $json_data['project_id'];
    $tab_oid = $json_data['tab_oid'];
    $panel_name = $json_data['panel_name'];
    $row_count = $json_data['row_count'];
    $column_count = $json_data['column_count'];


    $sql = "INSERT INTO  fm_panel_master(panel_name, row_count, column_count,form_id,tab_id) 
            VALUES ('" . $panel_name . "', '" . $row_count . "', '" . $column_count . "','" . $project_id . "','" . $tab_oid . "')";
    // echo $sql;
    // exit;
    if ($con->query($sql) === TRUE) {
        echo "Record saved successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }

    $con->close();
}