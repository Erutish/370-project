<?php
include("../head-nav-foot/header.php");

require_once '../include/db.inc.php';

if (!isset($_SESSION['homeowner_email'])) {
    header("Location: homeowner_login.php"); 
    exit();
}

$homeownerEmail = $_SESSION['homeowner_email'];
$sql_homeowner = "SELECT * FROM homeowner WHERE email='$homeownerEmail'";
$result_homeowner = $conn->query($sql_homeowner);
$homeowner = $result_homeowner->fetch_assoc();

$homeownerNId = $homeowner['nid'];
$sql_rent = "SELECT * FROM rent WHERE homeowner_nid='$homeownerNId'";
$rent = $conn->query($sql_rent);
?>
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Account Balance</title>
    <link rel="stylesheet" href="../head-nav-foot/header.css">
    <link rel="stylesheet" type="text/css" href="room_management.css"> 
</head>

<body>
<h2>Account Balance</h2>
    <div class="atm">
        
        <div class="atm-blance">
            <?php
            $sql = "SELECT SUM(rent_paid) AS total_balance FROM rent WHERE homeowner_nid = '$homeownerNId'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $total_balance = $row['total_balance'];
                echo "<p>Your Total Account Balance:  ৳" . number_format($total_balance, 2) . "</p>";
            } else {
                echo "No payments found.";
            }
            $conn->close();
            ?>
        </div>
    </div>
</body>
</html>
