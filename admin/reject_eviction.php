<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    header('Location: login.php');
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $request_id = $_GET["id"];

    // Database connections
    $db_host = "localhost";
    $db_username = "root";
    $db_password = "";
    $db_name = "rent_home";

    $conn = new mysqli($db_host, $db_username, $db_password, $db_name);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // eviction request status =='rejected'
    $sql_update = "UPDATE eviction_requests SET status='rejected' WHERE request_id='$request_id'";

    if ($conn->query($sql_update) === TRUE) {
        header('location:admin_dash.php');
    } else {
        echo "Error rejecting eviction request: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid request.";
}
?>
