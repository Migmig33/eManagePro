<?php 
session_start();
if(!isset($_SESSION['id'])){
    header("Location: ../view/index.html");
    exit;
}
include'../../db/db_connect_emanagepro.php';
$stmt = $conn->prepare("SELECT o.operation_id, o.operation_name, o.description,
                     CASE WHEN o.isactive  = 0 THEN 'Completed'  WHEN o.isactive = 1 THEN 'Pending' END AS STATUS,
                    o.created_at, o.expected_finish, u.givenName
                     FROM operations as o
                     INNER JOIN users as u
                     ON o.operated_by  = u.id
                     ORDER BY operation_id DESC");
$stmt->execute();
$result_operations = $stmt->get_result();
if($result_operations && $result_operations->num_rows > 0){
    echo "<table border = '1' cellpadding = '10'>
        <tr>
              <th>Operation Id</th>
              <th>Operation Name</th>
              <th>Operated By</th>
              <th>Description</th>
              <th>Status</th>
              <th>Created At</th>
              <th>Expected Finish</th>
              <th>Actions</th>
        </tr>";
        while($row = $result_operations->fetch_assoc()){
            echo "<tr>
                       <td>".htmlspecialchars($row['operation_id'])."</td>
                       <td>

                           <span class='viewSpan'>".htmlspecialchars($row['operation_name'])."</span>
                           <input class='editInput' type='text' name='operation_name' style='display: none; width: 90%; padding: 4px;'
                           value='".htmlspecialchars($row['operation_name'])."'>

                       </td>

                         <td>".htmlspecialchars($row['givenName'])."</td>
                       

                       <td>

                          <span class='viewSpan'>".htmlspecialchars($row['description'])."</span>
                          <input class='editInput' type='text' name='description' style='display: none; width: 90%; padding: 4px;'
                          value='".htmlspecialchars($row['description'])."'>

                       </td>

                        <td>".htmlspecialchars($row['STATUS'])."</td>
                       <td>".htmlspecialchars($row['created_at'])."</td>
                       <td>

                       <span class='viewSpan'>".htmlspecialchars($row['expected_finish'])."</span>
                       <input class='editInput' type='datetime-local' name='expected_finish' style='display: none; width: 90%; padding: 4px;'
                       value='".htmlspecialchars($row['expected_finish'])."'>
                       
                       </td>

                       <td style='text-align: center; overflow-x:auto;'>
                           <a class='update-btn' style='cursor:pointer;'><i class='fa-regular fa-pen-to-square' data-id='".$row['operation_id']."'></i></a>
                           <a class='saveRowBtn' style='display: none; cursor:pointer;'><i class='fa-solid fa-check' data-id='".$row['operation_id']."'></i></a>

                           <a class='delete-btn' style='cursor:pointer;'
                            onclick=\"return confirm('Are you sure you want to Delete this Operation?. Once you confirmed, the process can\\'t be undone.');\">
                            <i class='fa-solid fa-trash'  data-id='".$row['operation_id']."'></i></a>

                       </td>
                       
                      

                    </tr>";

     }
    echo"</table>";
}else{
    echo "<p style = 'text-align: center;'>No Operation History</p>";
}
$stmt->close();
$conn->close();
?>