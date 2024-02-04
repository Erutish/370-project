<?php
session_start();
if (isset($_SESSION["email"])) {
    header("location:index.php");
}
?>


<!DOCTYPE html>
<html>

<head>
   
    <title>Login Page</title>
    <link rel="stylesheet" href="../styles/registration.css">
    
</head>

<body>
    <header></header>
    <main>
        <h2>Homeowner Login</h2>
        
        <form action="login.php" method="post">
            <label>Email:</label>
            <input type="email" id="email" placeholder="Enter your email" name="email" required><br><br>
            <label>Password:</label>
            <input type="password" id="password" placeholder="Enter your password" name="password" require><br><br>
            <a href="forgot-password.php">forget password? </a><br><br>
            <input type="submit" id="submit" name="owner_login" value="Login">
        </form>
        <div class="center-button">
            <a href="../index.php">
                <button>Home Page</button>
            </a>
        </div>    

    </main>
    
</body>

</html>