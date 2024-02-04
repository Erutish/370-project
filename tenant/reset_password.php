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

   
    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT); 
    $sql = "UPDATE tanent SET password='$hashedPassword' WHERE email='$email'";

    if ($conn->query($sql) === TRUE) {
        echo "Password updated successfully!";
    } else {
        echo "Error updating password: " . $conn->error;
    }

    $conn->close();
}
?>
