<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // database connections
    $db_host = "localhost";
    $db_username = "root";
    $db_password = "";
    $db_name = "rent_home";

    $conn = new mysqli($db_host, $db_username, $db_password, $db_name);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve info
    $sql = "SELECT * FROM homeowner WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $homeowner = $result->fetch_assoc();

        if (password_verify($password, $homeowner['password'])) {
            $_SESSION['homeowner_email'] = $email;
            echo "loged in";
            header("Location:owner_dash.php");
        } else {
            echo "Incorrect password.";
        }
    } else {
        echo "Username not found.";
    }

    $conn->close();
}
?>