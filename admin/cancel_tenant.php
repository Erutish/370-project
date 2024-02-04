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

//  tenant registration=="cancelled"
$sql = "UPDATE tenant_signup SET reg_status='cancelled' WHERE nid='$id'";

if ($conn->query($sql) === TRUE) {
    header('location:tenant_management.php');
} else {
    echo "Error updating status: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
