<?php

include("../../head-nav-foot/header.php");

require_once '../../include/db.inc.php';

if (!isset($_SESSION['user'])) {
    header("Location: ../login.php");
    exit();
}
$tenantNID = $_SESSION['user']['nid'];

$sql_requests = "SELECT * FROM booking_requests WHERE tenant_nid='$tenantNID'";
$result_requests = $conn->query($sql_requests);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Booking Requests</title>
    <link rel="stylesheet" href="../../head-nav-foot/header.css">
    <link rel="stylesheet" href="../../styles/dashboard.css">
</head>

<body>

    <nav>
        <ul>
            <li><a href="../dashboard.php">Dashboard</a></li>
            <li><a href="./rent.php">Rent Information</a></li>
        </ul>
    </nav>
    <div class="dashboard">
        <div class="requests">
            <h2>Booking Requests</h2>
            <div class="request-section">
                <?php while ($request = $result_requests->fetch_assoc()) { ?>
                    <p><?php echo $request['owner_nid']; ?></p>
                    <p>Property ID: <?php echo $request['property_id']; ?></p>
                    <p>Request Status: <?php echo $request['request_status']; ?></p>
                    <?php if ($request['request_status'] === 'pending') { ?>
                        <a href="approve_tenant_req.php?property_id=<?php echo $request['property_id']; ?>&action=decline">Cancel</a>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
    </div>
</body>

</html>