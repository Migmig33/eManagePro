<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id    = intval($_POST['id'] ?? 0);
    $name  = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $age   = intval($_POST['age'] ?? 0);

    if ($id <= 0 || $name === '' || !filter_var($email, FILTER_VALIDATE_EMAIL) || $age < 0) {
        echo "<p style='color:red;'>Invalid input. <a href='list_users.php'>Back</a></p>";
        exit;
    }

    $stmt = $conn->prepare("UPDATE users SET name = ?, email = ?, age = ? WHERE id = ?");
    $stmt->bind_param("ssii", $name, $email, $age, $id);

    if ($stmt->execute()) {
        echo "<script>
        alert('User updated successfully!');
        window.location.href = 'list_users.php';
        </script>";
        echo "<script>
        alert('User update error!');
        window.location.href = 'list_users.php';
        </script>";
    } else {
        echo "<script>
        alert('ERROR UPDATING USER');
        window.location.href = 'list_users.php';
        </script>";
    }

    $stmt->close();
}
$conn->close();
?>
