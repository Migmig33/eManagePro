<?php 
session_start();
if(!isset($_SESSION['id'])){
    header("Location: ../view/login.php");
    exit;
}
include'../../db/db_connect_emanagepro.php';
$sql_transactions = $stmt->prepare("SELECT t.transaction_id, t.transaction_name, u.givenName,
                                            t.quantity, i.item_name, t.created_at
                                            FROM transactions AS t
                                            INNER JOIN users AS u
                                            INNER JOIN inventory AS i
                                            ON t.trasactioned_by = u.id AND ON t.item_id = i.item_id
                                            WHERE t.created_at = NOW()");
?>