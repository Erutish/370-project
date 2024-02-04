<?php
session_start();  // data ei from ei store kortesi

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION["first_name"] = $_POST["first_name"];
    $_SESSION["last_name"] = $_POST["last_name"];
    $_SESSION["address"] = $_POST["address"];
    $_SESSION["nid"] = $_POST["nid"];
    $_SESSION["password"] = $_POST["password"];
    $_SESSION["phone_number"] = $_POST["phone_number"];
    $_SESSION["email"] = $_POST["email"];

    header("Location:../room/add_room.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homeowner Registration</title>
    <link rel="stylesheet" href="owner_reg.css">
</head>

<body>
    <header></header>
    <main>
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

        <h1>Homeowner Registration</h1>
        <form action="owner_reg.php" method="post">
            <label for="first_name">First Name:</label>
            <input type="text" id="first_name" placeholder="Enter First Name" name="first_name" required><br><br>

            <label for="last_name">Last Name:</label>
            <input type="text" id="last_name" placeholder="Enter last Name" name="last_name" required><br><br>

            <label for="address">Address:</label>
            <input type="text" id="address" placeholder="Enter Address" name="address" rows="4" required><br><br>

            <label for="nid">NID:</label>
            <input type="text" id="nid" placeholder="Enter NID" name="nid" required><br><br>

            <label for="password">Password:</label>
            <input type="password" id="password" placeholder="Enter password" name="password" required><br><br>

            <label for="confirm_password">Confirm Password:</label>
            <input type="password" id="confirm_password" placeholder="Enter password again" name="confirm_password" required><br><br>

            <label for="phone_number">Phone Number:</label>
            <input type="tel" id="phone_number" placeholder="Enter phone number" name="phone_number" required><br><br>

            <label for="email">Email:</label>
            <input type="email" id="email" placeholder="Enter email" name="email" required><br><br>

            <input type="submit" name="next" value="Next">
        </form>
    </main>


</body>

</html>