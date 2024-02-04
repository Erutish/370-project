<?php
session_start();
if (isset($_SESSION["email"])) {
    header("location:admin_login.php");
}
?>


<!DOCTYPE html>
<html>

<head>
    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="admin_login.css">
</head>

<body>
    <header></header>
    <main>
    <h1>Login</h1>
        <form action="login.php" method="post">
            <label>Email:</label>
            <input type="email" id="email" placeholder="Enter your email" name="email" required><br><br>
            <label>Password:</label>
            <input type="password" id="password" placeholder="Enter your password" name="password" require><br><br>
            <a href="forgot-password.php">forget password? </a><br><br>
            <input type="submit" id="submit" name="admin_login" value="Login">
        </form>
    </main>
</body>

</html>