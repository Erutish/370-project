<!DOCTYPE html>
<html>
<head>
    <title>Tenant Listing</title>
</head>
<body>

<h1>Tenant Listing</h1>

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rent_home";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$query = "SELECT * FROM tenant";
$result = $conn->query($query);


if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>NID</th><th>Name</th><th>Action</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>{$row['nid']}</td>";
        echo "<td>{$row['first_name']} {$row['last_name']}</td>";
        echo "<td><a href='tenant_details.php?nid={$row['nid']}'><button>View Details</button></a></td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No tenant found.";
}


$conn->close();
?>

</body>
</html>
