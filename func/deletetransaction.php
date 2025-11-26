<?php 
session_start();
if(!isset($_SESSION['id'])){
    header("Location: ../login.php");
}
include'../db/db_connect_emanagepro.php';

$deleted_by = $_SESSION['id'] ?? 'Unknown';
$currentuser_id = $conn->real_escape_string($deleted_by);

$conn->query("SET @currentuser_id = '$currentuser_id'");


$transaction_id = intval($_POST['transaction_id'] ?? 0);
$stmt = $conn->prepare("DELETE FROM transactions WHERE transaction_id = ?");
$stmt->bind_param("i", $transaction_id);


if($stmt->execute() == TRUE){
    echo json_encode(['success' => true, 'message' => 'Transaction Successfully Delete.']);
}else{
    echo json_encode(['success' => false, 'message' => 'Failed to Delete Transaction.']);
}
$stmt->close();
$conn->close();
?>