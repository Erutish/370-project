<?php
session_start();
require_once '../../include/db.inc.php';

if (!isset($_SESSION['user'])) {
    header("Location: ../login.php");
    exit();
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cancel_reason = $_POST['cancel_reason'];
    $ownerNID = $_POST['owner_nid'];
    $tenantNID = $_POST['tenant_nid'];
    $property_id = $_POST['property_id'];
    $tenant_req = 'cancel';

    $sql_check_existing = "SELECT * FROM eviction_requests WHERE property_id = $property_id AND homeowner_nid = $ownerNID AND tenant_nid = $tenantNID";
    $result = $conn->query($sql_check_existing);

    // check if row exists
    if ($result->num_rows > 0) {
        // Update existing row
        $sql_update_request = "UPDATE eviction_requests SET tenant_req = cancel, tenant_reason = '$cancel_reason' WHERE property_id = $property_id AND homeowner_nid = $ownerNID AND tenant_nid = $tenantNID";

        if ($conn->query($sql_update_request) === TRUE) {
            header("Location: rent.php?");
        } else {
            echo "Error updating request: ";
        }
    } else {
        $sql_insert_request = "INSERT INTO eviction_requests (homeowner_nid, tenant_nid, property_id, tenant_req, tenant_reason) 
                            VALUES ('$ownerNID', '$tenantNID', '$property_id', 'cancel','$cancel_reason')";

        if ($conn->query($sql_insert_request) === TRUE) {
            header("Location: rent.php?");
        } else {
            echo "Error submitting request: ";
        }
    }
}
