<?php 
session_start();
if(!isset($_SESSION['id'])){
    header("Location: ../../index.html");
    exit();
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
        <link rel="stylesheet" href="../css/reports.css">
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
                <a class="option" href="transaction.php">
                     <i class="fa-solid fa-receipt"></i>
                     <p>Transaction</p>
                </a>
                <a class="option" href="operation.php">
                    <i class="fa-solid fa-list-check"></i>
                    <p>Operations</p>
                </a>
                <a class="option">
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

        <div class="section-header">Daily Report</div>

        <div class="content">
          
             <div class="table-transaction" >
                <div class="table-title">
                     <p id="title-table" class="title-table">Today's Transaction</p>
                </div>
                 <div id="table-transactions" class="table-transactions">
                </div>
            </div>
            

            <div class="table-operation" >
                <div class="table-title">
                     <p id="title-table">Today's Operations</p>        
                </div>
                <div id="table-operations" class="table-operations">
                </div>
        </div>

        <div class="log-content">
            
          <div class="title-log">
                <p>Logs</p>
            </div>
               <div class="logcolumn">
                <p>Message</p>
                <p>Type</p>
               </div>
            <div id="logcontainer" class="logcontainer">
                <div id="logs">
                    <p id="messagelog"></p>
                    <p id="logtype"></p>
                </div>
            </div>
        


            </div>
         
       
    
        

     

<script src="../js/rs.js"></script>
<script src="../js/dashboard.js"></script>
</body>
</html>