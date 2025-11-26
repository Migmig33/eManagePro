<?php
session_start();
if(!isset($_SESSION["id"])){
    header('Location: login.php');
    exit;
    
}
include'../db/db_connect_emanagepro.php';

$updated_by = $_SESSION['id'] ?? 'Unknown';
$currentuser_id = $conn->real_escape_string($updated_by);
$conn->query("SET @currentuser_id = '$updated_by'");

if($_SERVER['REQUEST_METHOD'] === 'POST' ){
    $operation_id = intval($_POST['operation_id'] ?? '');
    $operation_name = trim($_POST['operation_name'] ?? '');
    $description = trim($_POST['description'] ?? '');
    $expected_finish_raw = $_POST['expected_finish'] ?? '';

     $expected_finish = str_replace('T', ' ', $expected_finish_raw) . ':00';



}
$stmt = $conn->prepare("UPDATE operations SET operation_name = ?, expected_finish = ?, description = ? WHERE operation_id = ?");
$stmt->bind_param("sssi", $operation_name, $expected_finish, $description, $operation_id);

if($stmt->execute() == TRUE){
    echo json_encode(['success' => true, 'message' => 'Operation Successfully Updated.']);
    exit;
}else{
    echo json_encode(['success' => false, 'message' => 'Error on Updating Operations. Please, Try Again.' . $stmt->error]);
    exit;
}
$stmt->close();

$conn->close();
?>
