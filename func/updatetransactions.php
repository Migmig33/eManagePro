<?php 
//checks if the session id is running from the login page if not the system will go back to transaction.php // for securtiy issues
session_start();
if(!isset($_SESSION['id'])){
    header("Location: ../../view/index.html");
    exit;
}
// it will include the code of this path
include'../db/db_connect_emanagepro.php';


// server request fromo the transactions.js
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $transaction_id = intval($_POST['transaction_id'] ?? 0);
    $transaction_name = trim($_POST['transaction_name'] ?? '');
    $item_id = intval($_POST['item_id'] ?? 0);
    $quantity = intval($_POST['quantity'] ?? 0);
}

$stmt_old = $conn->prepare("SELECT item_id, quantity FROM transactions WHERE transaction_id = ?");
$stmt_old->bind_param("i", $transaction_id);
$stmt_old->execute();
$result_old = $stmt_old->get_result();

$old = $result_old->fetch_assoc();
$old_itemid = intval($old['item_id']);
$old_quantity = intval($old['quantity']);
// this query checks if there's an existing item_id from the inventory table
$sql_itemcheck = $conn->prepare("SELECT * FROM inventory WHERE item_id = ?");
$sql_itemcheck->bind_param("i", $item_id);
$sql_itemcheck->execute();
$result_itemcheck = $sql_itemcheck->get_result();

// if the item_id doesn't exist this will execute
if($result_itemcheck->num_rows <= 0){
    echo json_encode(['success' => false, 'message' => 'There is no existing Item ID.']);
    exit;
}

// if not this will execute

// input validation
if($transaction_name == '' || $item_id <= 0 || $quantity <= 0){
    echo json_encode(['success' => false, 'message' => 'Invalid Input. Please, Try Again.']);
    exit;
}
$item = $result_itemcheck->fetch_assoc();
$stock = intval($item['stock']);

if($quantity > $stock){
    echo json_encode(['success' => false, 'message' => 'Not Enough Stock Available.']);
    exit;
}
$conn->begin_transaction();
try{
    // if the user input is valid it wil create an update query
    $stmt = $conn->prepare("UPDATE transactions SET transaction_name = ?, item_id = ?, quantity = ? WHERE transaction_id = ?");
    $stmt->bind_param("siii", $transaction_name, $item_id, $quantity, $transaction_id);
    $stmt->execute();
    

    $stmt_restore = $conn->prepare("UPDATE inventory SET stock = stock + ? WHERE item_id = ?");
    $stmt_restore->bind_param("ii", $old_quantity, $old_item_id);
    $stmt_restore->execute();


    $stmt_deduct = $conn->prepare("UPDATE inventory SET stock = stock - ? WHERE item_id = ?");
    $stmt_deduct->bind_param("ii", $quantity, $item_id);
    $stmt_deduct->execute();

    $conn->commit();

    // checks if it was successfully updated
    echo json_encode(['success' => true, 'message' => 'Transaction Updated Successfully']);
    exit;
}catch(Exception $e){
    // if not this will be an output
    $conn->rollback();
    echo json_encode(['success' => false, 'message' => 'Failed to Update Transaction.']);
    exit;

}



$stmt->close();
$conn->close();
?>
