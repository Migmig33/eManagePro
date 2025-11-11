<?php
session_start();
if(!isset($_SESSION['id'])){
    header('Location: login.php');
}
include'../db/db_connect_emanagepro.php';
$operation_id = intval($_GET['id'] ?? 0);
if($operation_id <= 0){
    echo"<script>alert('ERROR FINDING ID');
        window.location.href='../homepage.php'</script>";
    exit;
}
$stmt = $conn->prepare("DELETE FROM operations WHERE operation_id = ?");
$stmt->bind_param("i", $operation_id);


if($stmt->execute() === TRUE){
    echo "<script>alert('Operation Successfully Deleted.');
        window.location.href='../homepage.php'</script>";
    exit;
} else{
    echo "<script>alert('Error on deleting operation.');
        window.location.href='../homepage.php'</script>";
    exit;
}
$stmt->close();
$connn->close();
?>