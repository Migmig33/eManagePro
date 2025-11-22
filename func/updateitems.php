<?php 
session_start();
if(!isset($_SESSION['id'])){
    header('Location: login.php');
    exit;
}
include '../db/db_connect_emanagepro.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $item_id = intval($_POST['item_id'] ?? '');
    $item_name = trim($_POST['item_name'] ?? '');
    $price = intval($_POST['price'] ?? 0 );
    $stock = intval($_POST['stock'] ?? 0);
}
if($item_name == '' || $price < 0 || $stock < 0){
    echo json_encode(['success' => false, 'message' => 'Invalid Input. Please, Try Again.']);
    exit;
}  
$stmt = $conn->prepare("UPDATE inventory SET item_name = ?, price = ?, stock = ? WHERE item_id = ?");
$stmt->bind_param("siii", $item_name, $price, $stock, $item_id);
if($stmt->execute() === TRUE){
    echo json_encode(['success' => true, 'message' => 'Item Successfully Updated.']);
    exit;
}else{
    echo json_encode(['success' => false, 'message' => 'Error on Updating Item. Please, Try Again Later.']);
    exit;
}
$stmt->close();
$conn->close();
?>