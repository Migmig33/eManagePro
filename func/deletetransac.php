<?php
//session_start();
//if (!isset($_SESSION["id"])){
 //   header("Location: login.php");
//}

include'../db/db_connect_emanagepro.php';
$transaction_id = intval($_GET['transaction_id'] ?? 0);
if ($transaction_id <= 0) {
    echo"invalid id";
}

$stmt = $conn->prepare('DELETE FROM transactions WHERE transaction_id = ?');
$stmt->bind_param("i", $transaction_id);

if($stmt->execute() == true){
    echo"deleted transac";
} else{
    echo"did not deleted";
}
$stmt->close();
$conn->close()
?>