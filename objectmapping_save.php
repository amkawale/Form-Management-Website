<?php
include("php/config.php");

if (isset($_REQUEST["json_param"])) {
    $json_data = $_REQUEST["json_param"];
    $project_oid = $json_data['project_oid'];
    $tab_oid = $json_data['tab_oid'];
    $object_section_oid = $json_data['object_section_oid'];
    $section_row_oid = $json_data['section_row_oid'];
    $section_col_oid = $json_data['section_col_oid'];
    $object_id = $json_data['object_id'];


    $sql = "INSERT INTO fm_section_object_mapping(form_id, tab_id, section_id, row_index, column_index,object_transaction_id) 
            VALUES ('" . $project_oid . "','" . $tab_oid . "','" . $object_section_oid . "', '" . $section_row_oid . "', '" . $section_col_oid . "','" . $object_id . "')";

    if ($con->query($sql) === TRUE) {
        echo "Record saved successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }

    //$sql = "update fm_section_object_mapping set  section_name = '" . $section_name . "',row_index = '" . $row_index . "',column_index ='" . $column_index . "',   row_count = '" . $row_count . "', column_count = '" . $column_count . "' ";

    // echo $sql;


    $con->close();
}
