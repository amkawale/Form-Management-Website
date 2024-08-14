<?php
include("php/config.php");

if (isset($_REQUEST["json_param"])) {
    $json_data = $_REQUEST["json_param"];
    $section_oid = $json_data['section_oid'];
    $section_name = $json_data['section_name'];
    $section_theme_id = $json_data['section_theme_id'];
    $panel_oid = $json_data['panel_oid'];
    $panel_row = $json_data['panel_row'];
    $panel_col = $json_data['panel_col'];
    $row_index = $json_data['row_index'];
    $column_index = $json_data['column_index'];

    $sql = "INSERT INTO  fm_section_master(section_name,row_count,column_count,panel_id,  row_index, column_index, theme_id) 
            VALUES ('" . $section_name . "', '" . $row_index . "', '" . $column_index . "','" . $panel_oid . "', '" . $panel_row . "','" . $panel_col . "','" . $section_theme_id . "')";
    // echo $sql;
    // exit;
    if ($con->query($sql) === TRUE) {
        echo "Record saved successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }

    $con->close();
}
