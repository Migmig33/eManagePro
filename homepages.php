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
    <link rel="stylesheet" href="css/homepagees.css">
    <title>Homepage</title>
</head>

<body>




    <div class="headerbar">
        <div class="title">
            <p>eManagePro</p>
        </div>

        <div class="profile" id="openaccount">
            <i class="fa-solid fa-user"></i>
        </div>
    </div>
    <div id="overlay">
        <div class="account">
            <div class="accounttitle">
                <p>eManagePro</p>
            </div>

            <div class="useraccount">
                <i class="fa-solid fa-user"></i>
                <p id="usernameaccount">USERNAME</p>

            </div>
            <div class="logout">
                <i class="fa-solid fa-right-from-bracket"></i>
                <a href="auth/logout.php">Logout</a>
            </div>

            <div class="exitaccountview">
                <p id="exitaccount">Exit Profile</p>
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





    <section>
        <p class="section-header">Operations</p>

        <div class="operation-status">
            <p style="margin-left: 22px;">Ongoing Operations</p>
            <div class="status-selections">
                <p id="alloperation">All</p>
                <p id="complete">Completed</p>
                <p id="ongoing">Pending</p>
            </div>
            <div id="mainstatuscontainer">
                <div id="status-container">
                    <p id="operation_name"></p>
                    <p id="isactive"></p>
                </div>
            </div>


        </div>


        <div class="table-operation" style=" box-shadow: -10px 10px 10px rgb(79, 73, 73);">
            <p style="font-weight: 500; margin: 20px 50px;" class="title_table">Operations<span id="addOperate"><i
                        class="fa-solid fa-plus"
                        style="margin-left:4px; border: 1px solid white; border-radius: 50%; padding: 1px; font-size: 15px"></i></span>
            </p>
            <?php if ($result_operations && $result_operations->num_rows > 0): ?>
                <table border="1" cellpadding="10">
                    <tr>
                        <th>Operation Id</th>
                        <th>Operation Name</th>
                        <th>Operated By</th>
                        <th>Desciption</th>
                        <th>Delete</th>
                        <th>Update</th>

                    </tr>
                    <?php while ($row = $result_operations->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['operation_id']) ?></td>
                            <td><?php echo htmlspecialchars($row['operation_name']) ?></td>
                            <td><?php echo htmlspecialchars($row['operated_by']) ?></td>
                            <td><?php echo htmlspecialchars($row['description']) ?></td>
                            <td>
                                <a class="delete-btn" href="func/deleteoperation.php?id=<?php echo $row['operation_id']; ?>"
                                    onclick="return confirm('Are you sure u want to delete this operation?');">Delete</a>
                            </td>
                            <td>
                                <a class="update-btn showUpdateForm" href="#" data-id="<?php echo $row['operation_id']; ?>"
                                    data-name="<?php echo $row['operation_name']; ?> "
                                    data-description="<?php echo $row['description']; ?>"
                                    data-status="<?php echo $row['isactive']; ?>">Update</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </table>
            <?php else: ?>
                <p style="text-align: center; justify-content: center;">No Transaction History</p>
            <?php endif; ?>
        </div>

        <div class="displayaddoperate" id="formoperate">
            <p>Add Operation</p>
            <form action="func/insertoperation.php" method="post" style=" 
                 display: flex;
                 flex-direction: column;
                 justify-content: center;
                 ">

                <label for="operation_name">Operation:</label>
                <input type="text" name="operation_name" id="operation_name" required>

                <label for="description">Description:</label>
                <input type="text" name="description" id="description" required>

                <label for="isactive">Status:</label>
                <select id="isactive" name="isactive">
                    <option value="1">InProgress</option>
                    <option value="0">Completed</option>

                </select>

                <input type="submit" value="Add Operation">
                <p id="exitformoperate" style="font-size: 12px; text-align: center; cursor:pointer;">Exit</p>
            </form>
        </div>


        <div class="displayupdateform" id="updateformoperation">
            <p>Update</p>
            <form action="func/updateoperation.php" method="post" style=" 
                 display: flex;
                 flex-direction: column;
                 justify-content: center;
                 ">
                <input type="hidden" name="operation_id"
                    value="<?php echo htmlspecialchars($operation_updates['operation_id']) ?>">
                Operation: <input type="text" name="operation_name"
                    value="<?php echo htmlspecialchars($operation_updates['operation_name']); ?>" required><br><br>
                Description: <input type="text" name="description"
                    value="<?php echo htmlspecialchars($operation_updates['description']); ?>" required><br><br>
                Status: <select id="isactive" name="isactive" required>
                    <option value="1" <?php echo ($operation_updates['isactive'] == 1) ? 'selected' : '' ?>>InProgress
                    </option>
                    <option value="0" <?php echo ($operation_updates['isactive'] == 0) ? 'selected' : '' ?>>Completed
                    </option>

                </select>

                <input type="submit" value="Update Operation">
                <p id="exitupdateform" style="font-size: 12px; text-align: center; cursor:pointer;">Exit</p>
            </form>
        </div>





        </div>
    </section>

    <section>
        <p class="section-header">Inventory</p>

        <div class="inventory-content">
            <div class="table-inventory" style=" box-shadow: -10px 10px 10px rgb(79, 73, 73);">
                <p style="font-weight: 500; margin: 20px 50px;" class="title_table">Inventory<span id="addItem"><i
                            class="fa-solid fa-plus"
                            style="margin-left:4px; border: 1px solid white; border-radius: 50%; padding: 1px; font-size: 15px"></i></span>
                </p>
                <?php if ($result_inventory && $result_inventory->num_rows > 0): ?>
                    <table border="1" cellpadding="10">
                        <tr>
                            <th>Product id</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Added By</th>
                            <th>Delete</th>
                            <th>Update</th>

                        </tr>
                        <?php while ($row = $result_inventory->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['item_id']) ?></td>
                                <td><?php echo htmlspecialchars($row['item_name']) ?></td>
                                <td><?php echo htmlspecialchars($row['price']) ?></td>
                                <td><?php echo htmlspecialchars($row['stock']) ?></td>
                                <td><?php echo htmlspecialchars($row['added_by']) ?></td>

                                <td>
                                    <a class="delete-btn" href="func/deleteitem.php?id=<?php echo $row['item_id']; ?>"
                                        onclick="return confirm('Are you sure u want to delete this operation?');">Delete</a>
                                </td>
                                <td>
                                    <a class="update-btn showUpdateForm" href="#" data-id="<?php echo $row['item_id']; ?>"
                                        data-name="<?php echo $row['item_name']; ?> "
                                        data-description="<?php echo $row['price']; ?>"
                                        data-status="<?php echo $row['stock']; ?>">Update</a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </table>
                <?php else: ?>
                    <p style="text-align: center; justify-content: center;">No Items</p>
                <?php endif; ?>
            </div>
            <?php $conn->close(); ?>

        </div>

          <div class="displayadditem" id="formitem">
            <p>Add Item</p>
            <form action="func/insertitem.php" method="post" style=" 
                 display: flex;
                 flex-direction: column;
                 justify-content: center;
                 ">

                <label for="item_name">Item:</label>
                <input type="text" name="item_name" id="item_name" required>

                <label for="price">Price:</label>
                <input type="number" name="price" id="price" required>

                <label for="stock">Stock:</label>
                <input type="number" name="price" id="price" required>
                <input type="submit" value="Add Item">
                <p id="exitformitem" style="font-size: 12px; text-align: center; cursor:pointer;">Exit</p>
            </form>
        </div>

            <div class="displayupdateitemform" id="updateformitem">
            <p>Update</p>
            <form action="func/updateitem.php" method="post" style=" 
                 display: flex;
                 flex-direction: column;
                 justify-content: center;
                 ">
                <input type="hidden" name="item_id"
                    value="<?php echo htmlspecialchars($item_updates['item_id']) ?>">
                Operation: <input type="text" name="operation_name"
                    value="<?php echo htmlspecialchars($item_updates['item_name']); ?>" required><br><br>
                Description: <input type="text" name="description"
                    value="<?php echo htmlspecialchars($item_updates['price']); ?>" required><br><br>
             
                <input type="submit" value="Update Item">
                <p id="exitupdateitemform" style="font-size: 12px; text-align: center; cursor:pointer;">Exit</p>
            </form>
        </div>

    </section>






    <script src="js/functioons.js"></script>
    <script src="apifunc/callData.js"></script>
    <script src="apifunc/callStatus.js"></script>



</body>

</html>