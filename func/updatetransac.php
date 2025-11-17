<?php 
session_start();
if(!isset($_GET['id'])){
    header("Location: ../transaction.php");
    exit;
}
include'../db/db_connect_emanagepro.php';
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $transaction_id = intval($_POST['transaction_id'] ?? 0);
    $transaction_name = trim($_POST['transaction_name'] ?? '');
    $item_id = intval($_POST['item_id'] ?? 0);
    $quantity = intval($_POST['quantity'] ?? 0);
}
$stmt = $conn->prepare("UPDATE transactions SET transaction_name = ?, item_id = ?, quantity = ? WHERE transaction_id = ?");
$stmt->bind_param("sii", $transaction_name, $item_id, $quantity);

if($stmt->execute() == TRUE){
    echo "true";
}else{
    echo "false";
}
$stmt->close();
$conn->close();
?>