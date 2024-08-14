<?php
session_start();
include("config.php");

if (!isset($_SESSION['valid'])) {
    http_response_code(403);
    echo json_encode(['error' => 'Not authorized']);
    exit;
}

$formId = $_POST['formId'];
$projectGroup = $_POST['projectGroup'];
$projectType = $_POST['projectType'];
$formName = $_POST['formName'];
$numTabs = $_POST['numTabs'];
$toggleStatus = $_POST['toggleStatus'];

$query = "UPDATE fm_form_master SET section_id = '$projectGroup', form_type = '$projectType', form_name = '$formName', no_of_tabs = '$numTabs', status = '$toggleStatus' WHERE form_id = '$formId'";
if (mysqli_query($con, $query)) {
    echo json_encode(['success' => 'Form data updated successfully']);
} else {
    http_response_code(500);
    echo json_encode(['error' => 'Database error: ' . mysqli_error($con)]);
}
?>
