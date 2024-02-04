<head>
    <title>Reset Password</title>
    <link rel="stylesheet" type="text/css" href="forgot-password.css">
</head>

<body>
    <h1>Reset Password</h1>

    <form action="reset_password.php" method="post">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="new_password">New Password:</label>
        <input type="password" id="new_password" name="new_password" required><br>

        <input type="submit" value="Reset Password">
    </form>
</body>
</html>
