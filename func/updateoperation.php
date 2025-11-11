<?php
session_start();
if(!isset($_SESSION["id"])){
    header('Location: login.php');
    
}
include'../db/db_connect_emanagepro.php';

if($_SERVER['REQUEST_METHOD'] === 'POST' ){
    $operation_id = intval($_POST['operation_id'] ?? 0);
    $operation_name = trim($_POST['operation_name'] ?? '');
    $isactive = intval($_POST['isactive'] ?? 0);
    $description = trim($_POST['description'] ?? '');


}
$isactive = ($isactive == 1)?  1 : 0;
$stmt = $conn->prepare("UPDATE operations SET operation_name = ?, isactive = ?, description = ? WHERE operation_id = ?");
$stmt->bind_param("sisi", $operation_name, $isactive, $description, $operation_id);

if($stmt->execute()){
    echo"Updated";
    exit;
}else{
    echo"failed: " .$stmt->error;
    exit;
}
$stmt->close();

$conn->close();
?>
