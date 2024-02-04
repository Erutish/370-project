<?php
session_start(); 

// owner login naki
if (!isset($_SESSION['homeowner_email'])) {
    header("Location: homeowner_login.php"); // back to login page
    exit();
}

// getting email from session
$homeownerEmail = $_SESSION['homeowner_email'];

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rent_home";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetching homeowner 
$sql_homeowner = "SELECT * FROM homeowner WHERE email='$homeownerEmail'";
$result_homeowner = $conn->query($sql_homeowner);
$homeowner = $result_homeowner->fetch_assoc();

// Fetching tenant booking requests
$homeownerNId = $homeowner['nid'];
$sql_requests = "SELECT * FROM booking_requests WHERE owner_nid='$homeownerNId' AND request_status='pending'";

$result_requests = $conn->query($sql_requests);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tenant Management</title>
</head>
<body>
    <h2>Tenant Booking Requests</h2>
    <table>
        <tr>
            <th>Tenant NID</th>  <!--table crecte kortesi tenant booking show korar jonno-->
            <th>Property ID</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        <?php while ($request = $result_requests->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $request['tenant_nid']; ?></td>
                <td><?php echo $request['property_id']; ?></td>
                <td><?php echo $request['request_status']; ?></td>
                <td>
                    <?php if ($request['request_status'] === 'pending') { ?>
                        <a href="approve_tenant_req.php?property_id=<?php echo $request['property_id']; ?>&action=approve&tenant_nid=<?php echo $request['tenant_nid']; ?>">Approve</a>
                        <a href="approve_tenant_req.php?property_id=<?php echo $request['property_id']; ?>&action=decline">Decline</a>
                    <?php } ?>
                </td>
            </tr>
        <?php } ?>
        
    </table>
    <a href="javascript:history.back()">Go Back</a>
</body>
</html>
