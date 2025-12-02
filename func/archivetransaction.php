<?php
session_start();
if(!isset($_SESSION['id'])){
    header("Location: ../../view/index.html");
    exit;
}
include'../db/db_connect_emanagepro.php';
$transaction_id = intval($_POST['transaction_id'] ?? 0);
$stmt = $conn->prepare("UPDATE transactions
                       SET is_archived = 1
                       WHERE transaction_id = ?");
$stmt->bind_param("i",$transaction_id);

if($stmt->execute() == true){
    echo json_encode(['success' => true, 'message' => 'Transaction Successfully Archived.']);
    exit;
} else{
    echo json_encode(['success' => false, 'message' => 'Failed to Archived the Transaction.']);
    exit;
}
$stmt->close();
$conn->close();
?>