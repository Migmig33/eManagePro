<?php
include 'db_connect.php';

$id = intval($_GET['id'] ?? 0);
if ($id <= 0) {
    echo "<script>
        alert('Invalid Id');
        window.location.href = 'list_users.php';
        </script>";
    exit;
}

$stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    echo "<script>
        alert('User deleted successfully!');
        window.location.href = 'list_users.php';
        </script>";
} else {
    echo "<script>
        alert('Error deleting user');
        window.location.href = 'list_users.php';
        </script>";
}

$stmt->close();
$conn->close();
?>
