<?php 
session_start();
if(!isset($_SESSION['id'])){
    header("Location: login.php");
    exit;
}
include "db/db_connect_emanagepro.php";

$is_archived =  isset($_GET["is_archived"]) ? $_GET["is_archived"] : 1;
$stmt = $conn->prepare("SELECT transaction_id, transaction_name, transactioned_by, item_id, quantity, created_at
                               FROM transactions
                               WHERE is_archived = ?
                               ORDER BY created_at DESC");
$stmt->bind_param("i", $is_archived);
$stmt->execute();
$result_transactions= $stmt->get_result();
if ($result_transactions && $result_transactions->num_rows > 0){
    echo "<table border = '1' cellpadding = '10'>
        <tr>
              <th>Transaction Id</th>
              <th>Transaction Name</th>
              <th>Transaction By</th>
              <th>Item_id</th>
              <th>Quantity</th>
              <th>Created At</th>
              <th>Actions</th>
        </tr>";
    while ($row = $result_transactions->fetch_assoc()){
        echo "<tr>
                 <td>".htmlspecialchars($row['transaction_id'])."</td>
                 <td>


                 <span class='viewSpan'>".htmlspecialchars($row['transaction_name'])."</span>
                 <input class='editInput' type='text' style='display: none; width: 90%; padding: 4px;' name='transaction_name'
                        value ='".htmlspecialchars($row['transaction_name'])."'>
                 
                 </td>
                 <td>".htmlspecialchars($row['transactioned_by'])."</td>
                 <td>
                 <span class='viewSpan'>".htmlspecialchars($row['item_id'])."</span>
                 <input class='editInput' type='text' style='display: none; width: 50px; padding: 4px;' name='item_id'
                        value='".htmlspecialchars($row['item_id'])."'>
                 
                 </td>

                 <td>


                 <span class='viewSpan'>".htmlspecialchars($row['quantity'])."</span>
                 <input class='editInput' type='text' style='display: none; width: 50px; padding: 4px;' name='quantity'
                        value='".htmlspecialchars($row['quantity'])."'>


                 </td>

                 <td>".htmlspecialchars($row['created_at'])."</td>
                 <td style='text-align: center; overflow-x: auto;'>";
                 if($is_archived == 0){
                    echo "  <a class='update-btn' style=' cursor: pointer;'><i class='fa-regular fa-pen-to-square' data-id='".$row['transaction_id']."'></i></a>
                            <a class='saveRowBtn' style='display: none; cursor: pointer;'><i class='fa-solid fa-check' data-id='".$row['transaction_id']."'></i></a>

                            <a class='archive-btn'
                            onclick=\"return confirm('Are you sure u want to Archive this transaction. Once you confirmed, the process can\\'t be undone.');\"><i class='fa-solid fa-box-archive'   data-id='".$row['transaction_id']."'></i></a>";
                 }else{
                    echo "  <a class='unarchive-btn'><i class='fa-solid fa-box-open' data-id='".$row['transaction_id']."'></i></a>
                            <a class='delete-btn'
                            onclick=\"return confirm('Are you sure u want to Delete this transaction. Once you confirmed, the process can\\'t be undone.');\"><i class='fa-solid fa-trash'  data-id='".$row['transaction_id']."'></i></a>";

                 }
                 
                              
                echo" </td></tr>";
    }
    echo "</table>";
}else{
    echo "<p style = 'text-align: center;'>No Transaction History</p>";
}
$stmt->close();
$conn->close();
?>