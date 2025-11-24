<?php
session_start(); 
include'../../db/db_connect_emanagepro.php';
$stmt = $conn->prepare("SELECT o.operation_id, o.operation_name, o.description,
                                             CASE WHEN o.isactive = 0 THEN 'Completed'
                                             WHEN o.isactive = 1 THEN 'Pending' END AS status,
                                             u.givenName, o.created_at, o.expected_finish
                                             FROM operations AS o
                                             INNER JOIN users AS u
                                             ON o.operated_by = u.id
                                             WHERE DATE(o.created_at) = CURDATE()");
$stmt->execute();
$result_operationdaily = $stmt->get_result();
if($result_operationdaily && $result_operationdaily->num_rows > 0){
    echo "<table border='1' cellpadding = '10'>
                 <tr>
                      <th>Operation ID</th>
                      <th>Operation Name</th>
                      <th>Description</th>
                      <th>Status</th>
                      <th>Operated By</th>
                      <th>Created At</th>
                      <th>Expected Finish</th>
                 </tr>";

            while($row = $result_operationdaily->fetch_assoc()){
                echo "<tr>
                        <td>".htmlspecialchars($row['operation_id'])."</td>
                        <td>".htmlspecialchars($row['operation_name'])."</td>
                        <td>".htmlspecialchars($row['description'])."</td>
                        <td>".htmlspecialchars($row['status'])."</td>
                        <td>".htmlspecialchars($row['givenName'])."</td>
                        <td>".htmlspecialchars($row['created_at'])."</td>
                        <td>".htmlspecialchars($row['expected_finish'])."</td>
                      </tr>";
                 }
                 echo "</table>";
        
}else{
    echo "<p style = 'text-align: center;'>No Operations Today.</p>";
}
$stmt->close();
$conn->close();
?>