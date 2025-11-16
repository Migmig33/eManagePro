<?php 
session_start();
if(!isset($_SESSION['id'])){
    header("Location: login.php");
    exit;
}
$loggeduser = $_SESSION['id'];
?>

<?php 
include "db/db_connect_emanagepro.php";

$sql_transactions = "SELECT transaction_id, transaction_name, transactioned_by, quantity, item_id FROM transactions ORDER BY transaction_id DESC";
$result_transactions = $conn->query($sql_transactions);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="css/transaction.css">
    <title>eManagePro</title>
</head>
<body>
    <div class="headerbar">
        <div class="menu" id="menubar">
            <p>☰</p>
        </div>
    </div>

    
        <div class="sidebar" id="sidebar">
            <div class="title"><p>eManagePro</p></div>
            <div class="pages">
                <a class="option" href="dashboard.php">
                    <i class="fa-solid fa-chart-area"></i>
                   <p>DashBoard</p>
                </a>
                <a class="option">
                     <i class="fa-solid fa-receipt"></i>
                     <p>Transaction</p>
                </a>
                <a class="option" href="#">
                    <i class="fa-solid fa-list-check"></i>
                    <p>Operations</p>
                </a>
                <a class="option" href="#">
                    <i class="fa-solid fa-newspaper"></i>
                    <p>Report</p>
                </a>
                 <a class="option" href="#">
                    <i class="fa-solid fa-warehouse"></i>
                    <p>Inventory</p>
                </a>
                 <a class="option" href="#">
                    <i class="fa-solid fa-door-open"></i>
                    <p>Sign Out</p>
                </a>

            </div>
        </div>

        <div class="section-header">Transactions</div>

        <div class="transaction-content">
            <div class="formContainer">
                <form action="func/inserttransac.php" method="post">
                    <label for="transaction_name">Transaction Name:</label>
                    <input type="text" name="transaction_name" required>
                    <label for="item_id">Item Id:</label>
                    <input type="number" name="item_id" id="item_id" required>
                    <label for="quantity">Quantity:</label>
                    <input type="number" name="quantity" id="quantity" required>
                    <input type="submit" Value="Add Transaction">

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
                            <td><?php echo htmlspecialchars($row['item_id']) ?></td>
                            <td><?php echo htmlspecialchars($row['quantity']) ?></td>
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
        </div>


</body>
</html>