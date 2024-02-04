<?php
session_start(); 

require_once '../include/db.inc.php';

// Checking property_id provided
if (isset($_GET['property_id']) && isset($_GET['action'])) {
    $tenant_nid = $_GET['tenant_nid'];
    $propertyId = $_GET['property_id'];
    $action = $_GET['action'];

    // Update  status in booking_requests table
    if ($action === 'approve') {
        $updateStatusSql = "UPDATE booking_requests SET request_status='approved' WHERE property_id='$propertyId'";
        $conn->query($updateStatusSql);

        // $currentDate = new DateTime();
        // $dueDate = $currentDate->add(new DateInterval('P1M'));
        // $formattedDueDate = $dueDate->format('Y-m-d');

        $updateAvailabilitySql = "UPDATE room SET availability_status='booked', tenant_nid='$tenant_nid' WHERE property_id='$propertyId'";
        $conn->query($updateAvailabilitySql);
    } 
    elseif ($action === 'decline') {
        $updateStatusSql = "UPDATE booking_requests SET request_status='declined' WHERE property_id='$propertyId'";
        $conn->query($updateStatusSql);
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Approve Tenant Request</title>
</head>

<body>
    <h2>Approve Tenant Request</h2>
    <p>Choose an action for the tenant booking request:</p>
    <a href="tenant_management.php">Back to Tenant Requests</a>
</body>

</html>