<?php
include 'db_connect.php';
$id = intval($_GET['id'] ?? 0);

$stmt = $conn->prepare("SELECT id, name, email, age FROM users WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$res = $stmt->get_result();

if ($res->num_rows === 0) {
    echo "<p>User not found. <a href='list_users.php'>Back to list</a></p>";
    exit;
}

$user = $res->fetch_assoc();
$stmt->close();
?>
<!DOCTYPE html>
<html>
<head><meta charset="utf-8"><title>Edit User</title>
<style>
    body {
      font-family: Arial, sans-serif;
      background-color: #000000ff;
      margin: 0;
      padding: 0;
    }

    .container {
      color: white;
      width: 400px;
      margin: 80px auto;
      background-color: #000000ff;
      border: 1px solid #ccc;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      padding: 30px;
    }

    h2 {
      text-align: center;
      color: #ffffffff;
      margin-bottom: 20px;
    }

    form {
      display: flex;
      flex-direction: column;
    }

    label {
      font-weight: bold;
      margin-bottom: 5px;
      color: #ffffffff;
    }

    input[type="text"],
    input[type="email"],
    input[type="number"] {
      padding: 10px;
      border: 1px solid #bbb;
      border-radius: 5px;
      margin-bottom: 15px;
      font-size: 14px;
      background-color: black;
      color: white;
    }

    input[type="text"]:focus,
    input[type="email"]:focus,
    input[type="number"]:focus {
      border-color: #ffffffff;
      outline: none;
    }

    input[type="submit"] {
      background-color: #000000ff;
      color: #fff;
      border: 1px solid white;
      padding: 10px;
      font-size: 16px;
      border-radius: 5px;
      cursor: pointer;
      transition: 0.5s ease;
    }

    input[type="submit"]:hover {
      transform: scale(1.1);
    }

    p {
      text-align: center;
      margin-top: 15px;
    }

    a {
      text-decoration: none;
      color: #ffffffff;
      font-weight: bold;
    }

    a:hover {
      text-decoration: underline;
    }
</style>
</head>
<body>
  <div class="container">
      <h2>Edit User</h2>
  <form action="update_user.php" method="post">
    <input type="hidden" name="id" value="<?php echo htmlspecialchars($user['id']); ?>">
    Name:  <input type="text" name="name" value="<?php echo htmlspecialchars($user['name']); ?>" required><br><br>
    Email: <input type="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required><br><br>
    Age:   <input type="number" name="age" value="<?php echo htmlspecialchars($user['age']); ?>" min="0" required><br><br>
    <input type="submit" value="Update User">
  </form>
  <p><a href="list_users.php">Back to list</a></p>
  </div>

</body>
</html>
