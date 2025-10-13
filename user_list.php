<?php

include 'db/db_connect_emanagepro.php';
$sql = "SELECT id, username, password FROM users ORDER BY id DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1>USER LIST</h1>
        <input type="submit" value="ADD USER" href="index.php">
        <?php if ($result && $result->num_rows > 0):?>
        <table border="1">
                 <th>ID</th>
                 <th>Username</th>
                 <th>Password</th>
                 <th>Delete</th>   
            <?php while($row = $result-> fetch_assoc()):?>
            <tr>
                <td><?php echo htmlspecialchars($row['id']); ?></td>
                <td><?php echo htmlspecialchars($row['username']);?></td>
                <td><?php echo htmlspecialchars($row['password']);?></td>
                <td><a class="delete-btn" href="delete.php?id=<?php echo $row['id']; ?>"
                onclick="return confirm('are you sure u want to delete?'); ">Delete</a></td>
            </tr>
            <?php endwhile; ?>
        </table>
        <?php else: ?>
            <p>NO USER FOUND</p>
        <?php endif; ?>
        <?php $conn->close(); ?>
    </div>

    
</body>
</html>