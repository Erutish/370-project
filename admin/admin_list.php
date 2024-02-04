<!DOCTYPE html>
<html>
<head>
    <title>Admin List</title>
    <link rel="stylesheet" type="text/css" href="admin_list_style.css">
</head>
<body>

<h1>Admin List</h1>

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rent_home";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch all admin data
$query = "SELECT * FROM admin";
$result = $conn->query($query);

// Display admin data
if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>ID</th><th>Name</th><th>Action</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['Name']}</td>";
        echo "<td><a href='admin_details.php?id={$row['id']}'><button>View Details</button></a></td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No admins found.";
}


$conn->close();
?>

</body>
</html>
