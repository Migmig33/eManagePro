<?php 
session_start();
if(!isset($_SESSION['id'])){
    header("Location: login.php");
    exit;
}
$loggeduser = $_SESSION['id'];
?>

<?php 
include "db/db_connect_emanagepro.php";

$sql_transactions = "SELECT transaction_id, transaction_name, transactioned_by"
?>