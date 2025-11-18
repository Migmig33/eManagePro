<?php
session_start();
if (!isset($_SESSION['id'])){
    header('Location: login.php');
}
include'../db/db_connect_emanagepro.php';

$transactioned_by = $_SESSION['id'] ?? 'Unknown';



if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $transaction_name = trim($_POST['transaction_name'] ?? '');
    $quantity = intval($_POST['quantity'] ??'');
    $item_id = intval($_POST['item_id'] ?? '');
    $is_archive = intval($_POST['is_archive'] ?? '');
    }
    $sql_itemcheck = $conn->prepare("SELECT * FROM inventory WHERE item_id = ?");
    $sql_itemcheck->bind_param("i", $item_id);
    $sql_itemcheck->execute();
    $result_itemcheck = $sql_itemcheck->get_result();

    if($result_itemcheck && $result_itemcheck->num_rows <= 0){
        echo json_encode(['success' => true, 'message' => 'There is no existing Item Id.']);
        exit;
    }
    if($transaction_name =='' || $quantity < 1 || $item_id < 1){
        echo json_encode(['success' => false, 'message' => 'Invalid Input, Please Try Again.']);
        exit;
    }
    $stmt = $conn->prepare("INSERT INTO transactions (transaction_name, item_id, quantity,  transactioned_by, is_archived) VALUES (?,?,?,?,0)");
    $stmt -> bind_param("siis", $transaction_name, $item_id, $quantity, $transactioned_by);

    if($stmt->execute()){
        echo json_encode(['success' => true, 'message' => 'Transaction Successfully Added to the Database.']);
        exit;
    } else{
        echo json_encode(['success' => true, 'message' => 'Failed to Add Transaction to the Database.']);
        exit;
    }
    $stmt->close();
    $conn->close();
?>
