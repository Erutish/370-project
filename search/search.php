


<?php
// Establish database connection (replace with your own credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rent_home";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process search form input
$description = $_GET['description']; // You can add more fields here
$postal_code = $_GET['postal_code'];
$street = $_GET['street'];

// Construct SQL query
$query = "SELECT * FROM room WHERE description LIKE '%$description%'";
if (!empty($postal_code)) {
    $query .= " AND postal_code LIKE '%$postal_code%'";
}

if (!empty($street)) {
    $query .= " AND street LIKE '%$street%'";
}

// Execute the query
$result = $conn->query($query);

// Display search results
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "Property ID: " . $row['property_id'] . "<br>";
        echo "Description: " . $row['description'] . "<br>";
        echo "Availability Status: " . $row['availability_status'] . "<br>";
        echo "Size (sqft): " . $row['size_sqft'] . "<br>";
        echo "Capacity: " . $row['capacity'] . "<br>";
        echo "Monthly Rent: " . $row['monthly_rent'] . "<br>";
        echo "Tenant Type: " . $row['tenant_type'] . "<br>";
        echo "Flat No: " . $row['flat_no'] . "<br>";
        echo "Building: " . $row['building'] . "<br>";
        echo "Street: " . $row['street'] . "<br>";
        echo "Postal Code: " . $row['postal_code'] . "<br>";
        echo "NID: " . $row['nid'] . "<br>";
        echo "<hr>";
    }
} else {
    echo "No properties found.";
}

$conn->close();
?>
