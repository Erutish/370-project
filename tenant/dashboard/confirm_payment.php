<?php
include("../../head-nav-foot/header.php");

require_once '../../include/db.inc.php';

if (!isset($_SESSION['user'])) {
    header("Location: ../login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Confirm Payment</title>
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
            <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $property_id = $_POST['property_id'];
                
                $ownerNID = $_POST['owner_nid'];
                $sql = "SELECT * FROM homeowner WHERE nid='$ownerNID'";
                $stmt = $conn->query($sql);
                $owner = $stmt->fetch_assoc();
                $owner_name = "{$owner['first_name']} {$owner['last_name']}";
                $rent_amount = $_POST['rent_amount'];
                $tenantNID = $_POST['tenant_nid'];
                

                echo "<h2>Confirm Payment</h2>";
                echo "<p>Property: Property $property_id</p>";
                echo "<p>Owner: $owner_name</p>";
                echo "<p>Rent Amount: $rent_amount</p>";
            }
            ?>
            <form action="process_payment.php" method="post">
                <input type="hidden" name="property_id" value="<?php echo $property_id; ?>">
                <input type="hidden" name="rent_amount" value="<?php echo $rent_amount; ?>">
                <input type="hidden" name="tenant_nid" value="<?php echo $tenantNID; ?>">
                <input type="hidden" name="owner_nid" value="<?php echo $ownerNID; ?>">
                <label for="rent_paid">Enter Rent Paid:</label>
                <input type="number" name="rent_paid" min="<?php echo $rent_amount ?>" max="<?php echo $rent_amount ?>" required>
                <button type="submit">Confirm Payment</button>
            </form>
        </div>
    </div>
</body>

</html>