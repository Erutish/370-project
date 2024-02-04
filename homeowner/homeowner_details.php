<!DOCTYPE html>
<html>
<head>
<head>
    <title>Homeowner Details</title>
    <link rel="stylesheet" type="text/css" href="homeowner_details.css">
</head>
<body>
</head>
<body>

<h1>Homeowner Details</h1>

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rent_home";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if (isset($_GET['nid'])) {
    $nid = $_GET['nid'];

    // Query to fetch homeowner details by NID
    $query = "SELECT * FROM homeowner WHERE nid = $nid";
    $result = $conn->query($query);

    //  homeowner details
    if ($result->num_rows > 0) {
        $homeowner = $result->fetch_assoc();
        echo "<p><strong>NID:</strong> {$homeowner['nid']}</p>";
        echo "<p><strong>Name:</strong> {$homeowner['first_name']} {$homeowner['last_name']}</p>";
        echo "<p><strong>Address:</strong> {$homeowner['address']}</p>";
        echo "<p><strong>Email:</strong> {$homeowner['email']}</p>";
        echo "<p><strong>Phone Number:</strong> {$homeowner['phone_number']}</p>";
        echo "<a href='homeowner_review_submit.php?nid={$homeowner['nid']}'><button>Submit Reviews</button></a>";

    echo "<h2>REVIEW SECTION</h2>";

    $reviewsQuery = "SELECT * FROM homeowner_reviews WHERE review_id = {$homeowner['nid']}";
    $reviewsResult = $conn->query($reviewsQuery);

    if ($reviewsResult->num_rows > 0) {
        while ($review = $reviewsResult->fetch_assoc()) {
            echo "<p>{$review['comments']}</p>";
        }
    } else {
        echo "<p>No reviews available.</p>";
    }
} else {
    echo "Homeowner not found.";
}
} else {
echo "No NID specified.";
}


$conn->close();
?>
<a href="javascript:history.back()">Go Back</a>
</body>
</html>
