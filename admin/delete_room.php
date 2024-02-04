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

// Delete the room 
$delete_room_sql = "DELETE FROM room WHERE property_id='$id'";

if ($conn->query($delete_room_sql) === TRUE) {
    header('location:homeowner_management.php');
} else {
    echo "Error deleting room: " . $delete_room_sql . "<br>" . $conn->error;
}

$conn->close();
?>
