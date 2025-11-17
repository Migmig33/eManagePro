<?php
session_start();
if (!isset($_SESSION["id"])){
  header("Location: ../login.php");
}

include'../db/db_connect_emanagepro.php';
$transaction_id = intval($_GET['id'] ?? 0);
if ($transaction_id <= 0) {
    echo"<script>alert('ERROR FINDING ID');
        window.location.href='../homepage.php'</script>";
    exit;
}

$stmt = $conn->prepare("UPDATE transactions
                       SET is_archived = 1
                       WHERE transaction_id = ?");
$stmt->bind_param("i",$transaction_id);

if($stmt->execute() == true){
    echo"<script>alert('Transaction Successfully Archived');
        window.location.href='../transaction.php'</script>";
    exit;
} else{
    echo"<script>alert('Error on archiving tansaction');
        window.location.href='../transaction.php'</script>";
    exit;
}
$stmt->close();
$conn->close();
?>