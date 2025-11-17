<?php 
session_start();
if(!isset($_SESSION['id'])){
    header("Location: login.php");
    exit;
}
include "db/db_connect_emanagepro.php";

$is_archived =  isset($_GET["is_archived"]) ? $_GET["is_archived"] : 0;
$stmt = $conn->prepare("SELECT transaction_id, transaction_name, transactioned_by, item_id, quantity, created_at
                               FROM transactions
                               WHERE is_archived = ?
                               ORDER BY transaction_id DESC");
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
                 <input class='editInput' type='text' style='display:none;'
                        value ='".htmlspecialchars($row['transaction_name'])."'>
                 
                 </td>
                 <td>".htmlspecialchars($row['transactioned_by'])."</td>
                 <td>
                 <span class='viewSpan'>".htmlspecialchars($row['item_id'])."</span>
                 <input class='editInput' type='text' style='display: none;'
                        value='".htmlspecialchars($row['item_id'])."'>
                 
                 </td>

                 <td>


                 <span class='viewSpan'>".htmlspecialchars($row['quantity'])."</span>
                 <input class='editInput' type='text' style='display: none;'
                        value='".htmlspecialchars($row['quantity'])."'>


                 </td>

                 <td>".htmlspecialchars($row['created_at'])."</td>
                 <td style='text-align: center;'>";
                 if($is_archived == 0){
                    echo "  <a class='update-btn' style='background-color: yellow; cursor: pointer;' data-id='{$row['transaction_id']}'>Edit</a>
                            <a class='saveRowBtn' style='display: none; background-color: yellow;' data-id='{$row['transaction_id']}'>Save</a>

                            <a class='archive-btn'style='background-color: green;' href='func/archivetransac.php?id={$row['transaction_id']}'
                            onclick=\"return confirm('Are you sure u want to Archive this transaction. Once you confirmed, the process can\\'t be undone.');\">Archive</a>";

                 }else{
                    echo "  <a class='archive-btn' style='background-color: green;' href='func/unarchivetransac.php?id={$row['transaction_id']}'>Unarchive</a>
                            <a class='archive-btn'style='background-color: red;' href='func/deletetransac.php?id={$row['transaction_id']}'
                            onclick='return confirm('Are you sure u want to Delete this transaction. Once you confirmed, the process can't be undone.');'>Delete</a>";

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