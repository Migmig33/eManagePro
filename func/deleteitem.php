<?php
session_start();
if(!isset($_SESSION['id'])){
    header('Location: login.php');
}
include '../db/db_connect_emanagepro.php';
$item_id = intval($_GET['id'] ?? 0);
if($item_id <= 0){
    echo "<script>alert('Error Finding ID');
    window.location.href = '../homepage.php'</script>";
    exit;
}
$stmt = $conn->prepare("DELETE FROM inventory WHERE item_id = ?");
$stmt->bind_param("i", $item_id);

if($stmt->execute() == TRUE){
    echo "<script>alert('Item Successflly Deleted');
    window.location.hfef = '../homepage.php';</script>";
    exit;
} else{
    echo "<script>alert('Failed to Delete Item');
    window.location.hfef = '../homepage.php';</script>";
    exit;
}
$stmt->close();
$conn->close();
?>