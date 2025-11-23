<?php 
session_start();
include'../../db/db_connect_emanagepro.php';
$sql_itemtvalue = "SELECT SUM(price * stock) AS total_value FROM inventory";
$result_itemtvalue = $conn->query($sql_itemtvalue);
$row = $result_itemtvalue->fetch_assoc();
$response = [
    "totalvalue" => $row['total_value']
];

header('Content-Type: application/json');
echo json_encode($response);
?>