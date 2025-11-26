<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login.css">
    <title>Signup</title>
</head>
<body>
    
    <div class="title">
    <p>eManagePro</p>
    </div>



    <div class="container">
        <h1>Login</h1>
        <img src="../../assets/profilepic.jpg">
        <form method="POST" action="../../auth/checkLogin.php">
        <input type="text" name="username" id="username" class="num-input" placeholder=" "required>
        <label for="username" class="num-label">Employee Number</label>
        <br><br>

        <input type="text" name="password" id="password" class="pass-input" placeholder=" "required>
        <label for="password" class="pass-label">Password</label><br>


        <input type="submit" value="Log In">

    </form>
    <p><a href="index.php">Forget Password?</a></p>
    </div>
 
    
</body>
</html>