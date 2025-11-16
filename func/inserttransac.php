<?php
session_start();
if (!isset($SESSION['id'])){
    header('Loaction: login.php');
}
include'../db/db_connect_emanagepro.php';

$transactioned_by = $_SESSION['id'] ?? 'Unknown';



if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $transaction_name = trim($_POST['transaction_name'] ?? '');
    $quantity = intval($_POST['quantity'] ??'');
    $item_id = intval($_POST['item_id'] ?? '');


    if($transaction_name =='' || $quantity < 1 || $item_id < 1){
        echo"<script>alert('Invalid Input, Please Try Again.');
        window.location.href='../transaction.php';
        </script>";
        exit;
    }
    $stmt = $conn->prepare("INSERT INTO transactions (transaction_name, item_id, quantity,  transactioned_by) VALUES (?,?,?,?)");
    $stmt -> bind_param("siis", $transaction_name, $item_id, $quantity, $transactioned_by);

    if($stmt->execute()){
        echo"<script>alert('Transaction Succesfully added to the table.');
        window.location.href='../transaction.php';
        </script>";
        exit;
    } else{
        echo"<script>alert('Error on adding transaction to the table. Please try again.');
        window.location.href='../transaction.php';
        </script>";
        exit;
    }

    $stmt->close();
}
    $conn->close();
?>
