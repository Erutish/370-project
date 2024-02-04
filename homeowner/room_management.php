<?php
session_start(); 

// Checking log in naki
if (!isset($_SESSION['homeowner_email'])) {
    header("Location: homeowner_login.php"); 
    exit();
}

// email
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

// Fetch homeowner 
$sql_homeowner = "SELECT * FROM homeowner WHERE email='$homeownerEmail'";
$result_homeowner = $conn->query($sql_homeowner);
$homeowner = $result_homeowner->fetch_assoc();

// Fetch room 
$homeownerNId = $homeowner['nid'];
$sql_rooms = "SELECT * FROM room WHERE nid='$homeownerNId'";
$result_rooms = $conn->query($sql_rooms);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Room Editing</title>
    <link rel="stylesheet" type="text/css" href="room_management.css"> 
</head>
<body>
    <header>
        <h1>Your Rooms</h1>
    </header>

    <main>
        <table>
            <tr>
            <th>Property ID</th>
            <th>Description</th>
            <th>Monthly Rent</th>
            <th>Tenant Type</th>
            <th>Flat_No</th>
            <th>Building</th>
            <th>Street</th>
            <th>Postal_Code</th>
            <th>Size_sqft</th>
            <th>Capacity</th>
            <th>Availability_Status</th>
            <th>Photo</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php while ($room = $result_rooms->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $room['property_id']; ?></td>
                <td><?php echo $room['description']; ?></td>
                <td><?php echo $room['monthly_rent']; ?></td>
                <td><?php echo $room['tenant_type']; ?></td>
                <td><?php echo $room['flat_no']; ?></td>
                <td><?php echo $room['building']; ?></td>
                <td><?php echo $room['street']; ?></td>
                <td><?php echo $room['postal_code']; ?></td>
                <td><?php echo $room['size_sqft']; ?></td>
                <td><?php echo $room['capacity']; ?></td>
                <td><?php echo $room['availability_status']; ?></td>
                <td><img src="<?php echo $room['photo']; ?>" alt="Room Photo" width="100"></td>
                <td><a href="edit_room.php?id=<?php echo $room['property_id']; ?>">Edit</a></td>
                <td><a href="delete_room.php?id=<?php echo $room['property_id']; ?>">Delete</a></td>
                <td><a href="view_tenant.php?tenant_nid=<?php echo $room['tenant_nid']; ?>">View Tenant</a></td>
            </tr>
            <?php } ?>
        </table>
        <a href="javascript:history.back()">Go Back</a>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Rent Home. All rights reserved.</p>
    </footer>
</body>
</html>