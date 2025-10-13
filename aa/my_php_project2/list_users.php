<?php
include 'db_connect.php';
$sql = "SELECT id, name, email, age FROM users ORDER BY id DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>User List</title>
  <style>
    *{
      font-family: Arial, Helvetica, sans-serif;
    }
    body {
      background-color: #000000ff;
      margin: 0;
      padding: 0;
    }

    .container {
      width: 85%;
      margin: 60px auto;
      background: #3d3535ff;
      border: 1px solid #ccc;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      padding: 30px;
    }

    h2 {
      text-align: center;
      color: #ffffffff;
    }

    a.add-btn {
      display: inline-block;
      background: #000000ff;
      border: 1px solid white;
      color: #fff;
      padding: 8px 14px;
      border-radius: 12px;
      text-decoration: none;
      font-size: 14px;
      margin-bottom: 15px;  
      transition: 0.5s ease;
    }

    a.add-btn:hover {
      transform: scale(1.1);
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    th, td {
      padding: 10px 12px;
      text-align: center;
      border: 1px solid #ddd;
    }

    th {
      background-color: #000000ff;
      color: #fff;
      text-transform: uppercase;
    }

    tr:nth-child(even) {
      background-color: #ffffffff;
    }

    tr:hover {
      background-color: #c2c2c2ff;
    }

    .action-btn {
      text-decoration: none;
      color: white;
      padding: 6px 10px;
      border-radius: 4px;
      font-size: 13px;
      margin: 0 3px;
      display: inline-block;
    }

    .edit-btn {
      background-color: #060606ff;
      transition: 0.5s ease;

    }

    .edit-btn:hover {
     transform: scale(1.1);

    }

    .delete-btn {
      background-color: #000000ff;
      transition: 0.5s ease;
    }

    .delete-btn:hover {
      transform: scale(1.1);
    }

    p {
      text-align: center;
      color: #555;
    }
  </style>
</head>
<body>

  <div class="container">
    <h2>User List</h2>
    <p><a class="add-btn" href="add_user.php">+ Add New User</a></p>

    <?php if ($result && $result->num_rows > 0): ?>
      <table>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Age</th>
          <th>Actions</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
          <tr>
            <td><?php echo htmlspecialchars($row['id']); ?></td>
            <td><?php echo htmlspecialchars($row['name']); ?></td>
            <td><?php echo htmlspecialchars($row['email']); ?></td>
            <td><?php echo htmlspecialchars($row['age']); ?></td>
            <td>
              <a class="action-btn edit-btn" href="edit_user.php?id=<?php echo $row['id']; ?>">Edit</a>
              <a class="action-btn delete-btn"
                 href="delete_user.php?id=<?php echo $row['id']; ?>"
                 onclick="return confirm('Are you sure you want to delete this user?');">Delete</a>
            </td>
          </tr>
        <?php endwhile; ?>
      </table>
    <?php else: ?>
      <p>No users found.</p>
    <?php endif; ?>

    <?php $conn->close(); ?>
  </div>

</body>
</html>
