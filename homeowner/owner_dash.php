<?php
session_start(); 

// Check if the homeowner is logged in
if (!isset($_SESSION['homeowner_email'])) {
    header("Location:homeowner_login.php"); 
    exit();
}


$homeownerEmail = $_SESSION['homeowner_email'];


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rent_home";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql_homeowner = "SELECT * FROM homeowner WHERE email='$homeownerEmail'";
$result_homeowner = $conn->query($sql_homeowner);
$homeowner = $result_homeowner->fetch_assoc();



$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Homeowner Dashboard</title>
    <link rel="stylesheet" href="owner_dash2.css">
    
</head>

<body>
<div class="center-button">
            <a href="../index.php">
                <button>Home Page</button>
            </a>
        </div>

<!-- this is test -->

    <h1>Welcome, <?php echo $homeowner['first_name'] . " " . $homeowner['last_name']; ?></h1>

    <h2>Your Profile</h2>
    <p>Name: <?php echo $homeowner['first_name'] . " " . $homeowner['last_name']; ?></p>
    <p>Email: <?php echo $homeowner['email']; ?></p>
    <p>Address: <?php echo $homeowner['address']; ?></p>
    <p>NID: <?php echo $homeowner['nid']; ?></p>
    <p>Phone Number: <?php echo $homeowner['phone_number']; ?></p>


<!-- !-- this is test --> 

    <!-- <a href="logout.php">Logout</a> -->
    <br><br><br>
    <?php echo "Click here to manage tenant "; ?> <br>
    <br>
    
    <a href="tenant_management.php">
        <button>TENANT MANAGEMENT</button>
    </a>
    <br><br><br>
    <?php echo "Click here to manage rooms"; ?> <br>
    <br>
    <a href="room_management.php">
        <button>Room Management</button>
    </a>
    <br>
    <a href="add_my_room.php?homeowner_nid=<?php echo $homeowner['nid']; ?>">
    <button>Add Room</button>
    </a>
    <a href="account_balance.php">
        <button>Account Balance</button>
    </a>
    <br><br><br>
    <!-- Logout button -->
    <div style="position: fixed; bottom: 20px; right: 20px;">
        <a href="logout.php">Logout</a>
    </div>
    <div style="position: fixed; bottom: 20px; right: 150px;">
        <a href="../tenant/tenant_view.php">Tenant View</a>
    </div>

</body>
</html>

<?php


// Retrieve homeowner's email from session
//$homeownerEmail = $_SESSION['homeowner_email'];

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rent_home";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

include 'reviews_section.php';

$conn->close();
?>


