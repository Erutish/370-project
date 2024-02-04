<!DOCTYPE html>
<html>
<head>
    <title>Homeowner Listing</title>
    <link rel="stylesheet" href="homeowner_view.css">
</head>
<body>

<h1>Homeowner Listing</h1>

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rent_home";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// fetch all homeowner data
$query = "SELECT * FROM homeowner";
$result = $conn->query($query);

// Display homeowner data
if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>NID</th><th>Name</th><th>Action</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>{$row['nid']}</td>";
        echo "<td>{$row['first_name']} {$row['last_name']}</td>";
        echo "<td><a href='homeowner_details.php?nid={$row['nid']}'><button>View Details</button></a></td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No homeowners found.";
}

$conn->close();
?>
<a href="javascript:history.back()">Go Back</a>

</body>
</html>
