<?php 
session_start();
if(!isset($_SESSION['id'])){
    header("Location: ../view/index.html");
    exit;
}
include'../../db/db_connect_emanagepro.php';
$stmt = $conn->prepare("SELECT t.transaction_id, t.transaction_name, u.givenName,
                                            t.quantity, i.item_name, t.created_at
                                            FROM transactions AS t
                                            INNER JOIN users AS u
                                            ON t.transactioned_by = u.id 
                                            INNER JOIN inventory AS i
                                           ON t.item_id = i.item_id
                                            WHERE DATE(t.created_at) = CURDATE()");
$stmt->execute();
 $todays_transaction = $stmt->get_result();
 if($todays_transaction && $todays_transaction->num_rows > 0){
    echo "<table border='1' cellpadding= '10'>
           <tr>
               <th>Transaction ID</th>
               <th>Transaction Name</th>
               <th>Transactioned By</th>
               <th>Item Name</th>
               <th>Quantity</th>
               <th>Created At</th>

            </tr>";
            while($row = $todays_transaction->fetch_assoc()){
                echo "<tr>
                          <td>".htmlspecialchars($row['transaction_id'])."</td>
                          <td>".htmlspecialchars($row['transaction_name'])."</td>
                          <td>".htmlspecialchars($row['givenName'])."</td>
                          <td>".htmlspecialchars($row['item_name'])."</td>
                          <td>".htmlspecialchars($row['quantity'])."</td>
                          <td>".htmlspecialchars($row['created_at'])."</td>
                      </tr>";
            }
            echo "</table>";
 }else{
        echo "<p style = 'text-align: center;'>No Transactions Today.</p>";
 }
 $stmt->close();
 $conn->close();                                        
?>