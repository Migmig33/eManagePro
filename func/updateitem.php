<?php 
session_start();
if(!isset($_SESSION['id'])){
    header('Location: login.php');
}
include '../db/db_connect_emanagepro.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $item_id = intval($_POST['item_id'] ?? 0);
    $item_name = trim($_POST['item_name'] ?? '');
    $price = intval($_POST['price'] ?? 0 );
    $stock = intval($_POST['stock'] ?? 0);
}

$stmt = $conn->prepare("UPDATE intevntory SET item_name = ?, price = ?, stock = ? WHERE item_id = ?");
$stmt->bind_param("siis", $item_name, $price, $stock, $item_id);
if($stmt->execute() === TRUE){
    echo "true";
}else{
    echo "false";
}
$stmt->close();
$conn->close();
?>