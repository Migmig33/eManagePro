
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/usersignup.css">
    <title>Signup</title>
</head>
<body>
    <div class="title">
        <p>eManagePro</p>
    </div>

    <div class="container">  
        <h1>Sign Up</h1>
        <form method="POST" action="auth/createAdmin.php">
        <label for="username">UserName:</label>
        <input type="text" name="username" id="username" required><br><br>

        <label for="password">Password:</label>
        <input type="text" name="password" id="password" required><br><br>


        <input type="submit" value="Create Account">

    </form>
    <p><a href="login.php">Already have an account?</a></p>
    </div>    
</body>
</html>