<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Add User</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #000000ff;
      margin: 0;
      padding: 0;
    }

    .container {
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
    <h2>Add User</h2>
    <form action="insert_user.php" method="post">
      <label for="name">Name:</label>
      <input type="text" name="name" id="name" required>

      <label for="email">Email:</label>
      <input type="email" name="email" id="email" required>

      <label for="age">Age:</label>
      <input type="number" name="age" id="age" min="0" required>

      <input type="submit" value="Add User">
    </form>

    <p><a href="list_users.php">Go Back</a></p>
  </div>

</body>
</html>
