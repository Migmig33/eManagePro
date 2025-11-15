<?php
session_start();
if (!isset($_SESSION['id'])) {

    header("Location: login.php");
    exit;
}
$loggeduser = $_SESSION['id'];
?>

<?php

include 'db/db_connect_emanagepro.php';

//get item_id to update the item in the inventory table
$item_id = intval($_GET['item_id'] ?? 0);
if($item_id <= 0){
    $item_updates = [
        'item_id' => '',
        'item_name' => '',
        'price' => '',
        'stock' => ''
    ];
} else{
    $stmt = $conn->prepare("SELECT item_id, item_name, price, stock FROM inventory WHERE item_id = ?");
    $stmt->bind_param("i", $item_id);
    $stmt->execute();
    $inventory = $stmt->get_result();
    $item_updates = $inventory->fetch_assoc() ?: [
        'item_id' => '',
        'item_name' => '',
        'price' => '',
        'stock' => ''
    ];
    $stmt->close();
}

//get operation_id to update the operation in the operation table
$operation_id = intval($_GET['operation_id'] ?? 0);
if ($operation_id <= 0) {
    $operation_updates = [
        'operation_id' => '',
        'operation_name' => '',
        'isactive' => '',
        'description' => ''

    ];

} else {
    $stmt = $conn->prepare("SELECT  operation_id, operation_name, isactive, description FROM operations WHERE operation_id = ?");
    $stmt->bind_param("i", $operation_id);
    $stmt->execute();
    $operations = $stmt->get_result();
    $operation_updates = $operations->fetch_assoc() ?: [
        'operation_id' => '',
        'operation_name' => '',
        'isactive' => '',
        'description' => ''
    ];

    $stmt->close();

}



//transaction query
$sql_transactions = "SELECT transaction_id, transaction_name ,transactioned_by, quantity, item_id FROM transactions ORDER BY transaction_id DESC";
$result_transactions = $conn->query($sql_transactions);

//operation query
$sql_operations = "SELECT operation_id, operation_name, operated_by, isactive, description FROM operations ORDER BY operation_id DESC";
$result_operations = $conn->query($sql_operations);


//transaction query
$sql_inventory = "SELECT item_id, item_name, price, stock, added_by FROM inventory ORDER BY item_id DESC";
$result_inventory = $conn->query($sql_inventory);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/dashboards.css">
    <title>Homepage</title>
</head>

<body>




    <div class="headerbar">
        <div class="menu">
            <p>☰</p>
        </div>
    </div>

    
        <div class="sidebar">
            <div class="title"><p>eManagePro</p></div>
            <div class="pages">
                <div class="option" href="#">
                    <i class="fa-solid fa-chart-area"></i>
                    <p>DashBoard</p>
                </div>
                <div class="option" href="#">
                    <i class="fa-solid fa-receipt"></i>
                    <p>Transaction</p>
                </div>
                <div class="option" href="#">
                    <i class="fa-solid fa-list-check"></i>
                    <p>Operations</p>
                </div>
                <div class="option" href="#">
                    <i class="fa-solid fa-newspaper"></i>
                    <p>Report</p>
                </div>
                 <div class="option" href="#">
                    <i class="fa-solid fa-warehouse"></i>
                    <p>Inventory</p>
                </div>
                 <div class="option" href="#">
                    <i class="fa-solid fa-door-open"></i>
                    <p>Sign Out</p>
                </div>

            </div>
        </div>

    
   

    <p class="section-header">DashBoard</p>



    <div class="dashboard-content">
        <div class="dashboard-summary">
            <div class="dashboard-box" style=" box-shadow: -10px 10px 10px rgb(79, 73, 73);   ">
                <p>Number of Transaction</p>
                <h1 id="numtransaction"></h1>
            </div>
            <div class="dashboard-box" style=" box-shadow: -10px 10px 10px rgb(79, 73, 73);   ">
                <p>Number of Operations</p>
                <h1 id="numoperation"></h1>
            </div>
            <div class="dashboard-box" style=" box-shadow: -10px 10px 10px rgb(79, 73, 73);   ">
                <p>Number of Items</p>
                <h1 id="numitems"></h1>
            </div>
            <div class="dashboard-box" style=" box-shadow: -10px 10px 10px rgb(79, 73, 73);   ">
                <p>Sold Items</p>
                <h1 id="solditems"></h1>
            </div>
            <div class="dashboard-box" style=" box-shadow: -10px 10px 10px rgb(79, 73, 73);   ">
                <p>Total Value</p>
                <h1 id="totalvalue"></h1>
            </div>

        </div>


        <div class="displayaddtransac" id="formtransac">
            <p>Add Transaction</p>
            <form action="func/inserttransac.php" method="post" style=" 
                 display: flex;
                 flex-direction: column;
                 justify-content: center;
                 ">
                <label for="transaction_name">Transaction:</label>
                <input type="text" name="transaction_name" id="transaction_name" required>

                <label for="quantity">Quantity:</label>
                <input type="number" name="quantity" id="quantity" required>

                <label for="item_id">Item ID:</label>
                <input type="number" name="item_id" id="item_id" required>

                <input type="submit" value="Add Transaction">
                <p id="exitformtransac" style="font-size: 12px; text-align: center; cursor:pointer;">Exit</p>
            </form>
        </div>


        <div class="table-dashboard" style=" box-shadow: -10px 10px 10px rgb(79, 73, 73);">
            <p style="font-weight: 500; margin: 20px 50px;" class="title_table">Recent Transaction<span
                    id="addTransac"><i class="fa-solid fa-plus"
                        style="margin-left:4px; border: 1px solid white; border-radius: 50%; padding: 1px; font-size: 15px"></i></span>
            </p>
            <?php if ($result_transactions && $result_transactions->num_rows > 0): ?>
                <table border="1" cellpadding="10">
                    <tr>
                        <th>Transaction ID</th>
                        <th>Transaction Name</th>
                        <th>Transaction By</th>
                        <th>Item ID</th>
                        <th>Quantity</th>
                        <th>Delete</th>

                    </tr>
                    <?php while ($row = $result_transactions->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['transaction_id']) ?></td>
                            <td><?php echo htmlspecialchars($row['transaction_name']) ?></td>
                            <td><?php echo htmlspecialchars($row['transactioned_by']) ?></td>
                            <td><?php echo htmlspecialchars($row['quantity']) ?></td>
                            <td><?php echo htmlspecialchars($row['item_id']) ?></td>
                            <td>
                                <a class="delete-btn" href="func/deletetransac.php?id=<?php echo $row['transaction_id']; ?>"
                                    onclick="return confirm('Are you sure u want to delete this transaction');">Delete</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </table>
            <?php else: ?>
                <p style="text-align: center; justify-content: center;">No Transaction History</p>
            <?php endif; ?>
        </div>
    </div>










    <script src="js/functioons.js"></script>
    <script src="apifunc/callData.js"></script>
    <script src="apifunc/callStatus.js"></script>



</body>

</html>