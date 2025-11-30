<?php 
session_start();
if(!isset($_SESSION['id'])){
    header("Location: ../view/index.html");
    exit;
}
include'../../db/db_connect_emanagepro.php';
$sql_logs = "SELECT logs FROM logs WHERE DATE(date_generated) = CURDATE() ORDER BY date_generated DESC";
$logs = $conn->query($sql_logs);

$response = [];
if($logs && $logs->num_rows >= 1){
    while($row = $logs->fetch_assoc()){
        $response[] = ['logs' => $row['logs']];
    }
}else{
       $response = [];
}
header('Content-Type: application/json');
echo json_encode($response);
?>