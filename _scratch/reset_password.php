<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset password</title>
    <link rel="stylesheet" href="../styles/reg.css">
</head>

<body>
    <header></header>
    <main>
        <h1>Reset Password</h1>
        <form action="update_password.php" method="post">
            <input type="hidden" name="token" value="<?php echo $_GET['token']; ?>">
            <label>New Password:</label>
            <input type="password" id="new_password" placeholder="Enter new password" name="new_password" required><br><br>
            <label>Confirm New Password:</label>
            <input type="password" id="confirm_new_password" placeholder="confirm password" name="confirm_new_password" required><br><br>
            <input type="submit" value="Reset Password">
        </form>
    </main>
</body>

</html>