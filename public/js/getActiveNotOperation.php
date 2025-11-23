<?php 
session_start();
include'../../db/db_connect_emanagepro.php';
$sql_operationstat = "SELECT isactive FROM operations";
$result_operationstat = $conn->query($sql_operationstat);
if($result_operationstat && $result_operationstat->num_rows <= 0){
    echo"No Operations Active";
}
$operationsactive = [];
$operationsnotactive =[];
while($row = $result_operationstat->fetch_assoc()){
    if($row['isactive'] == 1){
        $operationsactive[] = $row; 
    }else{
        $operationsnotactive[] = $row;
    }

}

$response = [
    "total" => [
        "active" => count($operationsactive),
        "notactive" => count($operationsnotactive)
    ],
        "acctive" => $operationsactive,
        "notactive" => $operationsnotactive
];
header('Content-Type: application/json');
echo json_encode($response);
?>