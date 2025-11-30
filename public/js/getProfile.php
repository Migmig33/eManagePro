<?php
session_start();
if(!isset($_SESSION['id'])){
    header("Location: ../view/index.html");
    exit;
}
include'../../db/db_connect_emanagepro.php';
$loggeduser = $_SESSION['id'];
$sql_username = "SELECT CONCAT(givenName, ' ', middleName, ' ', lastName) AS FullName, username, password FROM users WHERE id = '$loggeduser'";
$result_username = $conn->query($sql_username);
$username_info= [];
if($row = $result_username->fetch_assoc()){
    $username_info = [
        "fullName" => $row['FullName'], 
        "userName" => $row['username'], 
        "passWord" => $row['password']
    ];
}
header('Content-Type: application/json');
echo json_encode($username_info);
?>