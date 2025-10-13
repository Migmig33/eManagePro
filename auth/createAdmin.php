<?php 
include '../db/db_connect_emanagepro.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);


if(empty($username) || empty($password)){
          echo "<script>alert('Please fill the requirement');
          window.location.href = '../index.php';
          </script>";
} else{
$stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?,?)");
$stmt->bind_param("ss", $username, $password);

if($stmt->execute()){
   echo "<script>alert('Created new user sucessfully. Please proceed to log in page');
   window.location.href = '../login.php';
   </script>";
} else {
   echo "<script>alert('creating new user error');
   window.location.href = '../index.php';
   </script>";
}           
$stmt->close();

}
}
$conn->close(); 
?>

