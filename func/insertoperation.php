<?php
session_start();
if (!isset($_SESSION['id'])) {
    header('Location: login.php');
}
include '../db/db_connect_emanagepro.php';

$operated_by = $_SESSION['id'] ?? 'Unknown';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $operation_name = trim($_POST['operation_name']);
    $status = isset($_POST['isactive']) ? intval($_POST['isactive']) : 0;
    $description = trim($_POST['description']);


    if ($operation_name == '' || $description == '') {
        echo "<script>alert('Invalid Input. Please Try Again');
        window.location.href ='../homepage.php';
        </script>";
        exit;

    }

    $stmt = $conn->prepare("INSERT INTO operations (operation_name, description, operated_by, isactive) VALUES(?,?,?,?)");
    $stmt->bind_param("ssii", $operation_name, $description, $operated_by, $status);

    if ($stmt->execute()) {
        echo "<script>alert('Operation Succesfully added to the table');
        window.location.href='../homepage.php'</script>";
        exit;

    } else {
        echo "<script>alert('Error on adding a new operation to the table. Please try again.');
        window.location.href ='../homepage.php';
        </script>";
        exit;
    }
    $stmt->close();
}
$conn->close();

?>