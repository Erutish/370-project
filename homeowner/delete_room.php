<?php
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $roomId = $_GET['id']; // Useing id ehich has the property_id stored

    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "rent_home";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Delete the room
    $sql_delete = "DELETE FROM room WHERE property_id='$roomId'"; 
    
    if ($conn->query($sql_delete) === TRUE) {
        header("Location: room_management.php"); // Redirect to room page
        exit();
    } else {
        echo "Error deleting room: " . $conn->error;
    }

    $conn->close();
}
?>
