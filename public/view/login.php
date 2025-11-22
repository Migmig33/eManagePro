<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/userlogin.css">
    <title>Signup</title>
</head>
<body>
    
    <div class="title">
    <p>eManagePro</p>
    </div>



    <div class="container">
        <h1>Sign In</h1>
        <form method="POST" action="auth/checkLogin.php">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required><br><br>

        <label for="password">Password:</label>
        <input type="text" name="password" id="password" required><br><br>


        <input type="submit" value="Log In">

    </form>
    <p><a href="index.php">Forget Password?</a></p>
    </div>
 
    
</body>
</html>