<?php
include("php/config.php");

if (isset($_REQUEST["json_param"])) {
    $json_data = $_REQUEST["json_param"];

    $projectGroup = "";
    $projectType = '';
    $form_oid = $json_data['form_oid'];
    $formName = $json_data['form_name'];
    $numTabs = $json_data['numTabs'];
    $toggleStatus = $json_data['toggleStatus'];

    if ($form_oid == 0) {
        $sql = "INSERT INTO fm_project_master (project_name, number_of_tabs, status) 
            VALUES ('$formName', '$numTabs', '$toggleStatus')";
    } else {
        $sql = "update fm_project_master set project_name = '" . $formName . "', number_of_tabs = '" . $numTabs . "', status = '" . $toggleStatus . "' where oid = '" . $form_oid . "'";
    }


    // echo $sql;


    if ($con->query($sql) === TRUE) {
        echo "Record saved successfully";
        $q1 = "SELECT * FROM `fm_tab_master` ORDER BY `oid` DESC LIMIT 1";
        $q2 = "SELECT * FROM `fm_project_master` ORDER BY `oid` DESC LIMIT 1";
        $result = mysqli_query($con, $q1);
        $result1 = mysqli_query($con, $q2);
        $tab_oid = "";
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            $tab_oid = $row['oid'];
        } else {
            $tab_oid = 1;
        }
        $oid = "";
        if (mysqli_num_rows($result1) > 0) {
            $row = mysqli_fetch_array($result1);
            $oid = $row['oid'];
        } else {
            $oid = 1;
        }
        for ($i = 1; $i <= $numTabs; $i++) {
            $tab_name = "tab " . $tab_oid++;
            $sql = "INSERT INTO  fm_tab_master(tab_name, theme_id, sort_oid,form_id) 
            VALUES ('tab " . $tab_oid . "', 'theme_1', '10','" . $oid . "')";
            $result = mysqli_query($con, $sql);
        }
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }

    $con->close();
}
