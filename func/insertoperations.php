<?php
session_start();
if(!isset($_SESSION['id'])){
    header("Location: ../../view/index.php");
    exit;
}
include'../db/db_connect_emanagepro.php';

$operated_by = $_SESSION['id'] ?? 'Unknown';


$timenow = date("Y-m-d H:i:s");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $operation_name = trim($_POST['operation_name']);
    $description = trim($_POST['description']);
    $expected_finish_raw = $_POST['expected_finish'];

    $expected_finish = str_replace('T', ' ',$expected_finish_raw) . ':00';


    if ($operation_name == '' || $description == '') {
        echo json_encode(['success'=> false, 'message' => 'Invalid Input, Please Try Again.']);
        exit;

    }
    if(strtotime($expected_finish) <  strtotime($timenow) ){
        echo json_encode(['success' => false, 'message' => 'Invalid Input on Expected Finish Data, Input Must be Ahead of Current Time.']);
        exit;
    }

    $stmt = $conn->prepare("INSERT INTO operations (operation_name, description, operated_by, expected_finish) VALUES(?,?,?,?)");
    $stmt->bind_param("ssss", $operation_name, $description, $operated_by, $expected_finish);

    if($stmt->execute() == TRUE) {
        echo json_encode(['success' => true, 'message' => 'Operation Successfully Added.']);
        exit;

    } else {
        echo json_encode(['success' => false, 'message' => 'Error on Adding Operation. Please, Try Again Later.']);
        exit;
    }
    $stmt->close();
}
$conn->close();

?>