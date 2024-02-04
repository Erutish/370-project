<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $newPassword = $_POST['new_password'];

    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "rent_home";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Update password
    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT); // Hash the new password
    $sql = "UPDATE homeowner SET password='$hashedPassword' WHERE email='$email'";

    if ($conn->query($sql) === TRUE) {
        header('location:homeowner_login.php');
    } else {
        echo "Error updating password: " . $conn->error;
    }

    $conn->close();
}
?>
