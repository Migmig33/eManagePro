<?php
session_start();
if(!isset($_SESSION['id'])){
    header("Location: ../../view/index.html");
    exit;
}
include'../db/db_connect_emanagepro.php';
$transaction_id = intval(($_POST['transaction_id'])?? 0);
$stmt = $conn->prepare("UPDATE transactions
                        SET is_archived = 0
                        WHERE transaction_id = ? ");
$stmt->bind_param("i", $transaction_id);
if($stmt->execute() == TRUE){
    echo json_encode(['success' => true, 'message' => 'Transaction Unarchived Successfully.']);
    exit;
}else{
    echo json_encode(['success' => false, 'message' => 'Failed to Unarchived the Transaction.']);
    exit;

}
$stmt->close();
$conn->close();

?>