<?php
session_start();
include '../db/db_connect_emanagepro.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);


    if($username == '' || $password == ''){
        echo "<script>alert('Please fill all the credentials.');
        window.location.href = '../login.php';
        </script>";
        exit;
    }


    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0){
        $user = $result->fetch_assoc();

        if($password == $user["password"]){
            $_SESSION['id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            header("Location: ../public/view/dashboard.php");
            exit;
        } else{
            echo "<script>alert('INVALID USERNAME OR PASSWORD, TRY AGAIN');
            window.location.href = '../login.php';
            </script>";
            exit;

        }
    }else{
     echo "<script>alert('USER NOT FOUND');
     window.location.href = '../login.php';
     </script>";
     exit;
} 

}
$stmt->close();
$conn->close();
?>