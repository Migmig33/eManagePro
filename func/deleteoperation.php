<?php
session_start();
if(!isset($_SESSION['id'])){
    header('Location: login.php');
}
include'../db/db_connect_emanagepro.php';
$operation_id = intval($_POST['operation_id'] ?? 0);
$stmt = $conn->prepare("DELETE FROM operations WHERE operation_id = ?");
$stmt->bind_param("i", $operation_id);


if($stmt->execute() === TRUE){
    echo json_encode(['success' => true, 'message' => 'Operation Successfully Deleted.']);
    exit;
} else{
    echo json_encode(['success' => false, 'message' => 'Error on Deleting Operation. Please, Try Again.']);
    exit;
}
$stmt->close();
$connn->close();
?>