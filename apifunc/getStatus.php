<?php 
session_start();
if(!isset($_SESSION['id'])){
    header('Location: homepage.php');
    exit;
}
include'../db/db_connect_emanagepro.php';



//operation query
$sql_operations = "SELECT operation_name, isactive FROM operations ORDER BY operation_id DESC";
$result_operations = $conn->query($sql_operations);

$response = [];

if($result_operations->num_rows < 1){
    echo"no data";
    exit;  
} elseif($result_operations->num_rows >= 1){
    while($row = $result_operations->fetch_assoc()){
        if($row['isactive'] == 1){
             $response[] = ['status' => 'Pending', 'operation_name' => $row['operation_name']];
        }elseif($row['isactive'] == 0){
            $response[] = ['status' => 'Completed', 'operation_name' => $row['operation_name']];
        }else{
            $response[] = ['status' => 'null', 'operation_name' => $row['operation_name']];
        }
    }
}else{
    echo"error finding data";
}
header('Content-type: application/json');
echo json_encode($response);      
?>