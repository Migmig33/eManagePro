<?php 
session_start();
if(!isset($_SESSION['id'])){
    header('Location: login.php');
    exit;
}
include'../db/db_connect_emanagepro.php';

$added_by = $_SESSION['id'] ?? 'Unknown';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $productname = trim($_POST['item_name'] ?? '');
    $price = intval($_POST['price'] ?? 0);
    $stock = intval($_POST['stock'] ?? 0);


if($productname == ''){
    echo "<script>alert('Invalid Input, Please try again.');
    window.location.href = '../homepage.php';
    </script>";
    exit;
}
$stmt = $conn->prepare("INSERT INTO inventory (item_name, price, stock, added_by) VALUE(?,?,?,?)");
$stmt->bind_param("siis",  $productname, $price, $stock, $added_by);

if ($stmt->execute()){
    echo "added to the table";
    exit;
} else{
    echo "error adding to the table";
    exit;

}
$stmt->close();
}
$conn->close();
?>