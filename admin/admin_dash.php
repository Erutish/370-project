<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    header('Location: admin_login.php');
    exit();
}


$db_host = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "rent_home";

$conn = new mysqli($db_host, $db_username, $db_password, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user_id = $_SESSION["user_id"];

// Retrieve info
$sql = "SELECT id, name, email FROM admin WHERE id='$user_id'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $name = $row["name"];
    $email = $row["email"];
    $id = $row["id"];
} else {
    echo "User data not found.";
    $name = "N/A";
    $email = "N/A";
    $id = "N/A";
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" type="text/css" href="admin_dash.css">

</head>
<body>
    <h1>Welcome to the Admin Dashboard</h1>
    <p>Name: <?php echo $name; ?></p>
    <p>Email: <?php echo $email; ?></p>
    <p>ID: <?php echo $id; ?></p>
    <a href="logout.php">Logout</a>
    <br><br><br>
    <?php echo "Click here to manage owners and rooms"; ?> <br>
    <br>
    <a href="homeowner_management.php">
        <button>HOMEOWNER MANAGEMENT</button>
    </a>
    <br><br><br>
    <?php echo "Click here to manage teenants"; ?> <br>
    <br>
    <a href="tenant_management.php">
        <button>Tenant Management</button>

    <!--Eviction Requests -->
    <br>
    <br>
    <?php echo "Click here to manage eviction requests"; ?> <br>
    <br>
    <a href="eviction_request_management.php">
        <button>Eviction Request Management</button>
    </a>
    <br><br>
</body>
</html>