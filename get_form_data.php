<?php
session_start();
include("config.php");

if (!isset($_SESSION['valid'])) {
    http_response_code(403);
    echo json_encode(['error' => 'Not authorized']);
    exit;
}

$formId = $_GET['formId'];

$query = "SELECT * FROM fm_form_master WHERE form_id = '$formId'";
$result = mysqli_query($con, $query);

if ($row = mysqli_fetch_assoc($result)) {
    echo json_encode($row);
} else {
    http_response_code(404);
    echo json_encode(['error' => 'Form not found']);
}
?>
