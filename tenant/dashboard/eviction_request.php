<?php
include("../../head-nav-foot/header.php");

require_once '../../include/db.inc.php';

if (!isset($_SESSION['user'])) {
    header("Location: ../login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $property_id = $_POST['property_id'];
    $ownerNID = $_POST['owner_nid'];
    $tenantNID = $_POST['tenant_nid'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Cancel Lease</title>
    <link rel="stylesheet" href="../../head-nav-foot/header.css">
    <link rel="stylesheet" href="../../styles/dashboard.css">
</head>

<body>
    <nav>
        <ul>
            <li><a href="../dashboard.php">Dashboard</a></li>
            <li><a href="./requests.php">Booking Requests</a></li>
            <li><a href="./rent.php">Rent Information</a></li>
        </ul>
    </nav>
    <div class="dashboard">
        <div class="rent">
            <h2>Cancel Lease</h2>
            <form action="eviction.inc.php" method="post">
                <label for="eviction_reason">Reason for Cancellation:</label><br>
                <textarea name="cancel_reason" id="cancel_reason" rows="4" cols="50"></textarea><br>
                <input type="hidden" name="property_id" value="<?php echo $property_id; ?>">
                <input type="hidden" name="tenant_nid" value="<?php echo $tenantNID; ?>">
                <input type="hidden" name="owner_nid" value="<?php echo $ownerNID; ?>">
                <input type="submit" value="Submit Cancellation Request">
            </form>

            <a href="javascript:history.back()">Go Back</a>
</body>

</html>