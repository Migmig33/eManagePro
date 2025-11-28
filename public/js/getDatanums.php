<?php 
session_start();
if(!isset($_SESSION['id'])){
    header('Location: homepage.php');
    exit;
}
include'../../db/db_connect_emanagepro.php';


//transaction query
$sql_transactions = "SELECT transaction_id, transaction_name ,transactioned_by, quantity, item_id FROM transactions ORDER BY transaction_id DESC";
$result_transactions = $conn->query($sql_transactions);

//operation query
$sql_operations = "SELECT operation_id, operation_name, operated_by, isactive, description FROM operations ORDER BY operation_id DESC";
$result_operations = $conn->query($sql_operations);

//transaction query
$sql_inventory= "SELECT item_id, item_name, stock, added_by FROM inventory ORDER BY item_id DESC";
$result_inventory = $conn->query($sql_inventory);

$transactionData = [];
$operationData = [];
$reportData = [];
$inventoryData = [];

while($row = $result_transactions->fetch_assoc()){
    $transactionData[] = $row;
}
while($row = $result_operations->fetch_assoc()){
    $operationData[] = $row;
}

while($row = $result_inventory->fetch_assoc()){
    $inventoryData[] = $row;
}

$response = [
    "total" => [
        "transactions" => $result_transactions->num_rows,
        "operations" => $result_operations->num_rows,
        "inventory"=>$result_inventory->num_rows
    ],

       "data" => [
        "transactions" => $transactionData,
        "operations" => $operationData,
        "inventory" => $inventoryData
    ]

];

header('Content-Type: application/json');
echo json_encode($response);
?>