<?php
session_start();
if(!isset($_SESSION['id'])){
    header("Location: ../../view/index.html");
    exit;
}
include'../db/db_connect_emanagepro.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id = trim($_POST['id'] ?? '');
    $password = trim($_POST['password'] ?? '');
}
if($password == ''){
    echo json_encode(['success' => false, 'message' => 'Password must not be empty. Please, Try Again.' ]);
    exit;
}
$stmt = $conn->prepare("UPDATE users SET password = ? WHERE id = ?");
$stmt->bind_param("ss", $password, $id);
if($stmt->execute() == TRUE){
    echo json_encode(['success' => true, 'message' => 'Password Successfully Updated.']);
    exit;
}else{
    echo json_encode(['success' => false, 'message' => 'Failed to change Password. Please, Try Again Later.']);
    exit;
}

?>