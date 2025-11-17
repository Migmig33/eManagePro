<?php
session_start();
if(!isset($_SESSION['id'])){
    header('Location: ../login.php');
} 
include'../db/db_connect_emanagepro.php';
$transaction_id = intval(($_GET['id'])?? 0);
$stmt = $conn->prepare("UPDATE transactions
                        SET is_archived = 0
                        WHERE transaction_id = ? ");
$stmt->bind_param("i", $transaction_id);
if($stmt->execute() == TRUE){
    echo "<script>alert('Transaction Unarchived Successfully.');
    window.location.href='../transaction.php';</script>";
    exit;
}else{
    echo "<script>alert('Failed to Unarchived Transaction.');
    window.location.href='../transaction.php';</script>";
}
$stmt->close();
$conn->close();

?>