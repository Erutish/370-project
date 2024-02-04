<?php

$conn = new mysqli("localhost", "root", "", "rent_home");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_GET["id"];

// room request=="cancelled" 
$sql = "UPDATE room_reg SET reg_status='cancelled' WHERE property_id='$id'";

if ($conn->query($sql) === TRUE) {
    header('location:homeowner_management.php');
} else {
    echo "Error updating status: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
