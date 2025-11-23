<?php
session_start();
if(!isset($_SESSION['id'])){
    header("Location: login.php");
    exit;

}
include'../../db/db_connect_emanagepro.php';

$stmt = $conn->prepare("SELECT i.item_id, i.item_name, i.price, i.stock, u.givenName
                               FROM inventory AS i
                               INNER JOIN users AS u
                               ON i.added_by = u.id
                               ORDER BY item_id DESC
                               "
                          );
$stmt->execute();
$result_inventory = $stmt->get_result();
if($result_inventory && $result_inventory->num_rows > 0){
    echo "<table border = '1' cellpadding = '10' 
          <tr>
             <th>Item ID</th>
             <th>Item Name</th>
             <th>Price</th>
             <th>Stock</th>
             <th>Added By</th>
             <th>Actions</th>

          </tr>";
        while($row = $result_inventory->fetch_assoc()){
            echo "<tr>
                      <td>".htmlspecialchars($row['item_id'])."</td>

                      <td>
                          <span class='viewSpan'>".htmlspecialchars($row['item_name'])."</span>
                          <input class = 'editInput' type='text' name='item_name' style='display:none; width:90%; padding: 4px;'
                          value='".htmlspecialchars($row['item_name'])."'>

                      </td>

                      <td>
                          <span class='viewSpan'>".htmlspecialchars($row['price'])."</span>
                          <input class='editInput' type='number' name='price' style='display: none; width: 90%; padding: 4px;'
                          value='".htmlspecialchars($row['price'])."'>

                      </td>

                      <td>
                          <span class='viewSpan'>".htmlspecialchars($row['stock'])."</span>
                          <input class='editInput' type='number' name='stock' style='display:none; width: 90%; padding: 4px;'
                          value='".htmlspecialchars($row['stock'])."'>

                      </td>

                      <td>".htmlspecialchars($row['givenName'])."</td>

                    
                      <td style='text-align:center; overflow-x: auto;'>
                          <a class='update-btn' style='cursor:pointer;'><i class='fa-regular fa-pen-to-square' data-id='".$row['item_id']."'></i></a>
                          <a class='saveRowBtn' style=' display: none; cursor:pointer;'><i class='fa-solid fa-check'  data-id='".$row['item_id']."'></i></a>

                          <a class='delete-btn' style='cursor:pointer'
                          onclick=\"return confirm('Are you sure you want to Delete this Item?. Once you confirmed, process can\\t be undone.');\">
                          <i class='fa-solid fa-trash'  data-id='".$row['item_id']."'></i></a>
                       </td>
                       </tr>";


          }
          echo"</table>";


}else{
    echo "<p style = 'text-align: center;'>No Items</p>";
}
$stmt->close();
$conn->close();
?>