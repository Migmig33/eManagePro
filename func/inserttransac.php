<?php
session_start();
if(!isset($_SESSION['id'])){
    header("Location: ../../view/index.php");
    exit;
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
        echo json_encode(['success' => false, 'message' => 'Invalid Input. Please, Try Again.']);
        exit;
    }
    $item = $result_itemcheck->fetch_assoc();
    $stock = intval($item['stock']);
    $price = floatval($item['price']);

    if($quantity > $stock){
        echo json_encode(['success' => false, 'message' => 'Not Enough Stock Available.']);
        exit;
    }
    $conn->begin_transaction();
    try{
         $stmt = $conn->prepare("INSERT INTO transactions (transaction_name, item_id, quantity,  transactioned_by, is_archived) VALUES (?,?,?,?,0)");
         $stmt -> bind_param("siis", $transaction_name, $item_id, $quantity, $transactioned_by);
         $stmt->execute();

         $stmt2 = $conn->prepare("UPDATE inventory SET stock = stock - ? WHERE item_id = ?");
         $stmt2->bind_param("ii", $quantity, $item_id);
         $stmt2->execute();

         $conn->commit();
        echo json_encode(['success' => true, 'message' => 'Transaction Added Successfully.']);
        exit;
        
    }catch(Exception $e){
        $conn->rollback();
        echo json_encode(['success' => false, 'message' => 'Failed to Add Transaction.']);
        exit;
    }
   
    $stmt->close();
    $conn->close();
?>
