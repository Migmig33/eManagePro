<?php 
session_start();
if(!isset($_SESSION['id'])){
    header("Location: ../../view/index.php");
    exit;
}
include'../db/db_connect_emanagepro.php';

$added_by = $_SESSION['id'] ?? 'Unknown';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $productname = trim($_POST['item_name'] ?? '');
    $price = intval($_POST['price'] ?? 0);
    $stock = intval($_POST['stock'] ?? 0);


if($productname == '' || $price < 0 || $stock < 0){
    echo json_encode(['success' => false, 'message' => 'Invalid Input. Please, Try Again.']);
    exit;
}
$stmt = $conn->prepare("INSERT INTO inventory (item_name, price, stock, added_by) VALUE(?,?,?,?)");
$stmt->bind_param("siis",  $productname, $price, $stock, $added_by);

if ($stmt->execute() == TRUE){
    echo json_encode(['success' => true, 'message' => 'Item Successfully Added']);
    exit;
} else{
    echo json_encode(['success' => false, 'message' => 'Error on Adding Item. Please, Try Again Later.']);
    exit;

}
$stmt->close();
}
$conn->close();
?>