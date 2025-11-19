<?php 
session_start();
//checks if the session id is running from the login page if not the system will go back to transaction.php // for securtiy issues
if(!isset($_SESSION['id'])){
    header("Location: ../transaction.php");
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
// if the user input is valid it wil create an update query
$stmt = $conn->prepare("UPDATE transactions SET transaction_name = ?, item_id = ?, quantity = ? WHERE transaction_id = ?");
$stmt->bind_param("siii", $transaction_name, $item_id, $quantity, $transaction_id);
// checks if it was successfully updated
if($stmt->execute() == TRUE){
    echo json_encode(['success' => true, 'message' => 'Transaction Updated Successfully']);
    exit;
}// if not this will be an output
else{
    echo json_encode(['success' => false, 'message' => 'Failed to Update Transaction.']);
    exit;
}
$stmt->close();
$conn->close();
?>
