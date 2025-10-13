<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name  = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $age   = intval($_POST['age'] ?? 0);

    // Basic validation
    if ($name === '' || !filter_var($email, FILTER_VALIDATE_EMAIL) || $age < 0) {
        echo "<script>
        alert('Invalid Input, Try Again');
        window.location.href = 'list_users.php';
        </script>";
        exit;
    }

    $stmt = $conn->prepare("INSERT INTO users (name, email, age) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $name, $email, $age);

    if ($stmt->execute()) {
        echo "<script>
        alert('User added successfully!');
        window.location.href = 'list_users.php';
        </script>";;
    } else {
        echo "<p style='color:red;'>Error: " . htmlspecialchars($stmt->error) . "</p>";
    }

    $stmt->close();
}
$conn->close();
?>
