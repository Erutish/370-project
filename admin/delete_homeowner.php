<?php

$db_host = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "rent_home";

$conn = new mysqli($db_host, $db_username, $db_password, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_GET["id"];

// Delete the homeowner
$sql = "DELETE FROM homeowner WHERE nid='$id'";

if ($conn->query($sql) === TRUE) {
    header('location:homeowner_management.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

