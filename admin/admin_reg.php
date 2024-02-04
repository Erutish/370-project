<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
    <link rel="stylesheet" href="../styles/registration.css">
</head>

<body>
    <header></header>
    <h1>Admin Registration</h1>
    <main>
        <form action="submit.php" method="post">

            <label for="name">Name:</label>
            <input type="text" id="name" placeholder="Enter name" name="name" required><br><br>

            <label for="email">Email:</label>
            <input type="email" id="email" placeholder="Enter email" name="email" required><br><br>

            <label for="password">Password:</label>
            <input type="password" id="password" placeholder="Enter password" name="password" required><br><br>

            <label for="confirm_password">Confirm Password:</label>
            <input type="password" id="confirm_password" placeholder="Enter password again" name="confirm_password" required><br><br>
            <input type="submit" value="Register">
        </form>
    </main>
</body>

</html>