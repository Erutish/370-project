<!DOCTYPE html>
<html>
<head>
    <title>Room Listing</title>
</head>
<body>

<h1>Room Listing</h1>

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rent_home";



$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//  all room data
$query = "SELECT * FROM room";
$result = $conn->query($query);

// Display room data
if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>Property ID</th><th>Photo</th><th>Postal Code</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td><a href='property_details.php?property_id={$row['property_id']}'><button>Property {$row['property_id']}</button></a></td>";
        echo "<td><img src='data:image/jpeg;base64," . base64_encode($row['photo']) . "' width='300'></td>";
        echo "<td>{$row['postal_code']}</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No rooms found.";
}


$conn->close();
?>

</body>
</html>
