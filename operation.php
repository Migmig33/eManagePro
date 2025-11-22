<?php 
session_start();
if(!isset($_SESSION['id'])){
    header("Location: login.php");
    exit();
}
$loggeduser = $_SESSION['id'];
?>

<?php 
include "db/db_connect_emanagepro.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="css/operation.css">
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
                <a class="option" href="transaction.php">
                     <i class="fa-solid fa-receipt"></i>
                     <p>Transaction</p>
                </a>
                <a class="option" >
                    <i class="fa-solid fa-list-check"></i>
                    <p>Operations</p>
                </a>
                <a class="option" href="report.php">
                    <i class="fa-solid fa-newspaper"></i>
                    <p>Daily Report</p>
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

        <div class="section-header">Operations</div>

        <div class="operation-content">
            <div class="formContainer">
                <div class="formTitle"><p>Insert Operation</p></div>
                <form method="post" id="insertForm" >
                    <label for="operation_name">Operation Name:</label>
                    <input type="text" name="operation_name" id="operation_name" required>
                    <label for="description">Description:</label>
                    <input type="text" name ="description" id="description" required>
                    <label for="expected_finish">Expected Finish Date</label>
                    <input type="datetime-local" name="expected_finish" id="expected_finish" placeholder="Select Date.."required>
                    <input type="submit" Value="Add Operation" id="insert">

                </form>
            </div>

             <div class="table-operation">
                <div class="table-title">
                     <p id="title-table">Operation Table</p>
                </div>
           <div id="table">
   
           </div>
        </div>

        </div>
        </div>

     
<script src="operation.js"></script>
<script src="js/dashboard.js"></script>

</body>
</html>