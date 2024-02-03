<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];

    // database connection
        $db_host = "localhost";
    $db_username = "root";
    $db_password = "";
    $db_name = "rent_home";
    
    $conn = new mysqli($db_host, $db_username, $db_password, $db_name);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // email database e ase naki
    $sql = "SELECT id, name FROM admin WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();

        // unique token 
        $reset_token = bin2hex(random_bytes(32));
        $user_id = $row["id"];

        //change hbe

        // Store the reset token in the database (You need to have a suitable table for this)
        $sql = "INSERT INTO password_reset_tokens (user_id, token, created_at) VALUES ('$user_id', '$reset_token', NOW())";
        if ($conn->query($sql) === TRUE) {
            // Send the password reset link to the user's email
            $reset_link = "http://yourdomain.com/reset_password.php?token=$reset_token";

            // You should use a proper email library for sending emails
            mail($email, "Password Reset", "Click the following link to reset your password: $reset_link");

            echo "Password reset link has been sent to your email.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Email not found.";
    }

    $conn->close();
}
