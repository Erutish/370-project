<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    header('Location: login.php');
    exit();
}

// Database connections
$db_host = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "rent_home";

$conn = new mysqli($db_host, $db_username, $db_password, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve eviction requests
$sql_eviction_requests = "SELECT * FROM eviction_requests";
$result_eviction_requests = $conn->query($sql_eviction_requests);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Eviction Request Management</title>
</head>
<body>
    <h1>Eviction Request Management</h1>
    <table>
        <tr>
            <th>Request ID</th>
            <th>Homeowner ID</th>
            <th>Tenant ID</th>
            <th>Property ID</th>
            <th>owner_req</th>
            <th>Eviction Reason</th>
            <th>tenant_req</th>
            <th>Cancellation Reason</th>
            <th>Request Date</th>
            <th>Update Date</th>
            <th>Request Status</th>
            <th>Action</th>
        </tr>
        <?php while ($row = $result_eviction_requests->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['request_id']; ?></td>
                <td><?php echo $row['homeowner_nid']; ?></td>
                <td><?php echo $row['tenant_nid']; ?></td>
                <td><?php echo $row['property_id']; ?></td>
                <td><?php echo $row['owner_req']; ?></td>
                <td><?php echo $row['eviction_reason']; ?></td>
                <td><?php echo $row['tenant_req']; ?></td>
                <td><?php echo $row['tenant_reason']; ?></td>
                <td><?php echo $row['created_at']; ?></td>
                <td><?php echo $row['updated_at']; ?></td>
                <td><?php echo $row['status']; ?></td>
                <td>
                    <?php if ($row['owner_req'] === 'cancel' || $row['tenant_req'] === 'cancel') { ?>
                        <a href="accept_eviction.php?id=<?php echo $row['request_id']; ?>">Accept</a>
                        <a href="reject_eviction.php?id=<?php echo $row['request_id']; ?>">Reject</a>
                    <?php } else { ?>
                        N/A
                    <?php } ?>
                </td>
            </tr>
        <?php } ?>
    </table>
    <br>
    <a href="admin_dash.php">Back to Dashboard</a>
</body>
</html>
