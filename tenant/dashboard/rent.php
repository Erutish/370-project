<?php
include("../../head-nav-foot/header.php");

require_once '../../include/db.inc.php';

if (!isset($_SESSION['user'])) {
    header("Location: ../login.php");
    exit();
}
$tenantNID = $_SESSION['user']['nid'];

$sql_requests = "SELECT * FROM room WHERE tenant_nid='$tenantNID'";
$result_requests = $conn->query($sql_requests);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Rent</title>
    <link rel="stylesheet" href="../../head-nav-foot/header.css">
    <link rel="stylesheet" href="../../styles/dashboard.css">
</head>

<body>
    <nav>
        <ul>
            <li><a href="../dashboard.php">Dashboard</a></li>
            <li><a href="./requests.php">Booking Requests</a></li>
        </ul>
    </nav>
    <div class="dashboard">
        <div class="rent">
            <h2>Payment</h2>
            <?php while ($request = $result_requests->fetch_assoc()) { ?>
                <p>Room Number: <?php echo $request["property_id"]; ?></p>
                <p>Rent Amount: <?php echo $request["monthly_rent"]; ?></p>
                <p>Payment Due Date: <?php echo $request["due_date"]; ?></p>
            <form action="confirm_payment.php" method="post">
                <input type="hidden" name="property_id" value="<?php echo $request["property_id"]; ?>">
                <input type="hidden" name="rent_amount" value="<?php echo $request["monthly_rent"]; ?>">
                <input type="hidden" name="tenant_nid" value="<?php echo $tenantNID; ?>">
                <input type="hidden" name="owner_nid" value="<?php echo $request["nid"];; ?>">
                <button type="submit">Initiate Payment</button>
            </form>
            <form action="eviction_request.php" method="post">
            <input type="hidden" name="tenant_nid" value="<?php echo $tenantNID; ?>">
            <input type="hidden" name="owner_nid" value="<?php echo $request["nid"];; ?>">
            <input type="hidden" name="property_id" value="<?php echo $request["property_id"]; ?>">
            <button type="submit">Terminate Lease</button>
            </form>
            <?php } ?>
            <?php
            if (isset($_GET['payment_success'])) {
                echo "<p>Payment has been successfully completed!</p>";
            }
            ?>
        </div>
    </div>
</body>

</html>