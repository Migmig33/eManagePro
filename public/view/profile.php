<?php 
session_start();
if(!isset($_SESSION['id'])){
    header("Location: login.php");
    exit();
}
include'../../db/db_connect_emanagepro.php';
$loggeduser = $_SESSION['id'];
$pass = "SELECT password FROM users WHERE id = '$loggeduser'";
$result = $conn->query($pass);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="../css/profiles.css">
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
                <a class="option">
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

        <div class="cover-img"><img src="../../assets/bg.jpg" alt=""></div>

        <div class="profile-content">
            <div class="profile-info">
             <img src="../../assets/profilepic.jpg">
             <p id="fullname" class="name"></p>
            </div>

            <div class="more-info">
                <div class="username">
                      <p> Username: </p>
                      <p id="username" class="user"></p>
                </div>
                   
            </div>
            <div class="more-info" id="pass">
                <div class="password">
                     <p> Password: </p>
                     <span class="pass" id="password"></span>
                     <input class="editInput" type="text" name="password" style="display: none;" value="<?php echo $row['password']?>" id="password">
                </div>
                     <div class="editPass" style="cursor:pointer;"> <i class="fa-solid fa-pen" data-id="<?php echo $row['password']?>"></i></div>
                     <div class="savePass" style="display: none; cursor:pointer;"> <i class="fa-solid fa-check" data-id="<?php echo $row['password']?>"></i></div>

            </div>
             

           
        </div>

     
<script src="../js/profile.js"></script>
<script src="../js/dashboard.js"></script>

</body>
</html>