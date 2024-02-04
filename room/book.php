<?php
session_start();

require_once '../include/db.inc.php';

if (isset($_POST['book_property'])) {
    $property_id = $_POST['property_id'];
    $tenant_nid = $_POST['tenant_nid'];
    $owner_nid = $_POST['owner_nid'];
    $request_status = "pending";
    
    // Insert the booking record into the database
    $sql = "INSERT INTO booking_requests (tenant_nid, owner_nid, property_id, request_status) VALUES ('$tenant_nid', '$owner_nid', '$property_id', '$request_status')";

    if ($conn->query($sql) === TRUE) {
        header("Location: property_details.php?property_id={$_POST['property_id']}");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();