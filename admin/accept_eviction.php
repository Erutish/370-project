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

    // status =='approved'
    $sql_update = "UPDATE eviction_requests SET status='approved' WHERE request_id='$request_id'";

    if ($conn->query($sql_update) === TRUE) {
        // eviction request details fetching
        $sql_request = "SELECT * FROM eviction_requests WHERE request_id='$request_id'";
        $result_request = $conn->query($sql_request);
        $eviction_request = $result_request->fetch_assoc();

        // Update room details
        $property_id = $eviction_request['property_id'];

        $sql_update_room = "UPDATE room SET tenant_nid=NULL, availability_status='vacant' WHERE property_id='$property_id'";

        if ($conn->query($sql_update_room) === TRUE) {
            echo "Eviction request approved successfully. Room status updated.";
        } else {
            echo "Error updating room status: " . $conn->error;
        }
    } else {
        echo "Error approving eviction request: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid request.";
}
?>

