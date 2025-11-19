<?php 
session_start();
if(!isset($_SESSION['id'])){
    header("Location: ../login.php");
}
include'../db/db_connect_emanagepro.php';
$transaction_id = intval($_POST['transaction_id'] ?? 0);
$stmt = $conn->prepare("DELETE FROM transactions WHERE transaction_id = ?");
$stmt->bind_param("i", $transaction_id);


if($stmt->execute() == TRUE){
    echo json_encode(['success' => true, 'message' => 'Transaction Successfully Delete.']);
    exit;
}else{
    echo json_encode(['success' => false, 'message' => 'Failed to Delete Transaction.']);
    exit;
}
$stmt->close();
$conn->close();
?>