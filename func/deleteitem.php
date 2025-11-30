<?php
session_start();
if(!isset($_SESSION['id'])){
    header("Location: ../../view/index.php");
    exit;
}
include '../db/db_connect_emanagepro.php';
$item_id = intval($_POST['item_id'] ?? 0);

$stmt = $conn->prepare("DELETE FROM inventory WHERE item_id = ?");
$stmt->bind_param("i", $item_id);

if($stmt->execute() == TRUE){
    echo json_encode(['success' => true, 'message' => 'Item Successfully Deleted.']);
    exit;
} else{
    echo json_encode(['success' => false, 'message' => 'Error on Deleting Item. Please, Try Again Later.']);
    exit;
}
$stmt->close();
$conn->close();
?>