<!DOCTYPE html>
<html>
<head>
<title>Tenant Details</title>
    <link rel="stylesheet" type="text/css" href="h_details_style.css">
</head>
<body>
</head>
<body>

<h1>Tenant Details</h1>

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

    
    $query = "SELECT * FROM tenant WHERE nid = $nid";
    $result = $conn->query($query);

    
    if ($result->num_rows > 0) {
        $tenant = $result->fetch_assoc();
        echo "<p><strong>NID:</strong> {$tenant['nid']}</p>";
        echo "<p><strong>Name:</strong> {$tenant['first_name']} {$tenant['last_name']}</p>";
        echo "<p><strong>Present_Address:</strong> {$tenant['present_address']}</p>";
        echo "<p><strong>Permanent_Address:</strong> {$tenant['permanent_address']}</p>";
        echo "<p><strong>Email:</strong> {$tenant['email']}</p>";
        echo "<p><strong>Phone:</strong> {$tenant['phone']}</p>";
        echo "<p><strong>Gender:</strong> {$tenant['gender']}</p>";
        echo "<p><strong>University:</strong> {$tenant['university']}</p>";
        echo "<p><strong>Job:</strong> {$tenant['job']}</p>";
        echo "<p><strong>Salary:</strong> {$tenant['salary']}</p>";
        echo "<p><strong>Marital_status:</strong> {$tenant['marital_status']}</p>";
        echo "<p><strong>nid_doc:</strong> {$tenant['nid_doc']}</p>";
         
        echo "<a href='tenant_review_submit.php?nid={$tenant['nid']}'><button>Submit Reviews</button></a>";
   
    echo "<h2>REVIEW SECTION</h2>";

    
    $reviewsQuery = "SELECT * FROM tenant_history WHERE review_id = {$tenant['nid']}";
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
