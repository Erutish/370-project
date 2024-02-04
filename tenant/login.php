<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tenant Login</title>
    <link rel="stylesheet" href="../styles/registration.css">
</head>

<body>
    <header>
    <div class="center-button">
            <a href="../index.php">
                <button class="user-type-button tenant">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm0 2a6 6 0 0 0-6 6h12a6 6 0 0 0-6-6z" />
                    </svg>
                    Go to Home
                </button>
            </a>
        </div>
    </header>
    <main>
        <h2>Tenant Login</h2>
        <form action="login.inc.php" method="post">          
            <label for="email">Email:</label>
            <input type="email" name="email" required><br><br>
            <label for="password">Password:</label>
            <input type="password" name="password" required><br><br>
            <input type="submit" value="Login">
        </form>
    </main>
</body>

</html>