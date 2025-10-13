<?php 
session_start();
if(!isset($_SESSION['id'])){

    header("Location: login.php");
    exit;
}
?>

<?php

include 'db/db_connect_emanagepro.php';


//transaction query
$sql_transactions = "SELECT transaction_id, transaction_name ,transactioned_by, quantity, item_id FROM transactions ORDER BY transaction_id DESC";
$result_transactions = $conn->query($sql_transactions);

//operation query
$sql_operations = "SELECT operation_id, operation_name, operated_by, description FROM operations ORDER BY operation_id DESC";
$result_operations = $conn->query($sql_operations);

//report query
$sql_reports = "SELECT report_id, created_by, created_at, description FROM reports ORDER BY report_id DESC";
$result_reports = $conn->query($sql_reports);

//transaction query
$sql_inventory= "SELECT item_id, item_name, stock, added_by FROM inventory ORDER BY item_id DESC";
$result_inventory = $conn->query($sql_inventory);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/homepage.css">
    <title>Homepage</title>
</head>
<body>

        <div class="displayaddtransac">
            <form action="func/inserttransac.php" method="post">
                <label for="transaction_name">Transaction:</label>
                <input type="text" name="transaction_name" id="transaction_name" required>

                <label for="quantity">Quantity:</label>
                <input type="number" name="quantity" id="quantity" required>

                <label for="item_id">Item ID:</label>
                <input type="number" name="item_id" id="item_id" required>

            </form>
        </div>



        <div class="headerbar">
        <div class="title">
            <p>eManagePro</p>
        </div>
        <div class="navbar">
            <a class="dashboard" id="dashboard">Dashboard</a>
            <a class="operations" id="operations">Operations</a>
            <a class="report" id="report">Report</a>
            <a class="inventory" id="inventory">Inventory</a>
        </div>
        <div class="profile">
            <i class="fa-solid fa-user"></i>
        </div>
        </div>

         <p class="dashboard-header">DashBoard</p>

        <div class="dashboard-content">
            <div class="dashboard-summary" >
                 <div class="dashboard-box" style=" box-shadow: -10px 10px 10px rgb(79, 73, 73);   ">
                 <h1 id="numreports">helo</h1>
            </div>
            <div class="dashboard-box" style=" box-shadow: -10px 10px 10px rgb(79, 73, 73);   ">
                 <h1 id="numoperation">helo</h1>
            </div>
            <div class="dashboard-box" style=" box-shadow: -10px 10px 10px rgb(79, 73, 73);   ">
                 <h1 id="numitems">helo</h1>
            </div>

            </div>
    
            <div class="table-dashboard" style=" box-shadow: -10px 10px 10px rgb(79, 73, 73);">
                <p style="font-weight: 500; margin: 20px 50px;" class="title_table">Recent Transaction<span id="addTransac"><i class="fa-solid fa-plus" style="margin-left:4px; border: 1px solid white; border-radius: 50%; padding: 1px; font-size: 15px"></i></span></p>
            <?php if($result_transactions && $result_transactions->num_rows > 0): ?>
            <table border="1"  cellpadding="10">
                <tr>
                    <th>Transaction_id</th>
                    <th>Transaction_name</th>
                    <th>Operation_id</th>
                    <th>Item_id</th>
                    <th>Quantity</th>
                    <th>Delete</th>

                </tr>
                <?php while($row = $result_transactions->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['transaction_id'])?></td>
                    <td><?php echo htmlspecialchars($row['transaction_name'])?></td>
                    <td><?php echo htmlspecialchars($row['transactioned_by'])?></td>
                    <td><?php echo htmlspecialchars($row['quantity'])?></td>
                    <td><?php echo htmlspecialchars($row['item_id'])?></td>
                    <td>
                        <a class="delete-btn" href="func/deletetransac.php?id=<?php echo $row['transaction_id'];?>" onclick="return('Are you sure u want to delete this transaction');">Delete</a>
                    </td>
                </tr>
                 <?php endwhile; ?>
            </table>
            <?php else: ?>
                <p style="text-align: center; justify-content: center;">No Transaction History</p>
            <?php endif;?>
            </div>
            <?$conn->close();?>
        </div>



        <a href="auth/logout.php">Logout</a>
       
    <script src="js/function.js"></script>
</body>
</html>