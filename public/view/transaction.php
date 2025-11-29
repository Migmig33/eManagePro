<?php 
session_start();
if(!isset($_SESSION['id'])){
    header("Location: login.php");
}
$loggeduser = $_SESSION['id'];
?>

<?php 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="../css/transaction.css">
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
                <a class="option" href="profile.php">
                    <i class="fa-solid fa-circle-user"></i>
                   <p>Profile</p>
                </a>
                <a class="option" href="dashboard.php">
                    <i class="fa-solid fa-chart-area"></i>
                   <p>DashBoard</p>
                </a>
                <a class="option">
                     <i class="fa-solid fa-receipt"></i>
                     <p>Transaction</p>
                </a>
                <a class="option" href="operation.php">
                    <i class="fa-solid fa-list-check"></i>
                    <p>Operations</p>
                </a>
                <a class="option" href="report.php">
                    <i class="fa-solid fa-newspaper"></i>
                    <p>Daily Report</p>
                </a>
                 <a class="option" href="inventory.php">
                    <i class="fa-solid fa-warehouse"></i>
                    <p>Inventory</p>
                </a>
                 <a class="option" href="../../auth/logout.php">
                    <i class="fa-solid fa-door-open"></i>
                    <p>Sign Out</p>
                </a>

            </div>
        </div>

        <div class="section-header">Transactions</div>

        <div class="transaction-content">
            <div class="formContainer">
                <div class="formTitle"><p>Insert Transaction</p></div>
                <form method="post" id="insertForm">
                    <label for="transaction_name">Transaction Name:</label>
                    <input type="text" name="transaction_name" id="transaction_name" required>
                    <label for="item_id">Item Id:</label>
                    <input type="number" name="item_id" id="item_id" required>
                    <label for="quantity">Quantity:</label>
                    <input type="number" name="quantity" id="quantity" required>
                    <input type="submit" Value="Add Transaction" id="insert">

                </form>
            </div>

             <div class="table-transaction" >
                <div class="table-title">
                     <p id="title-table" class="title-table">Recent Transaction</p>
                     <p style="cursor: pointer; text-decoration: underline; color: #a59e9eff" id="toggle-View">View Archived</p>
                </div>
           <div id="table">
           // table //
           </div>
        </div>

        </div>
        </div>

     

<script src="../js/transactions.js"></script>
<script src="../js/dashboard.js"></script>
</body>
</html>