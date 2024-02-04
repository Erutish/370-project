<?php
include("../head-nav-foot/header.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Property Details</title>
</head>
<body>

<h1>Property Details</h1>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rent_home";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//  property_id from the URL parameter
if (isset($_GET['property_id'])) {
    $property_id = $_GET['property_id'];

    //  property details by property_id
    $query = "SELECT * FROM room WHERE property_id = $property_id";
    $result = $conn->query($query);

    // property details
    if ($result->num_rows > 0) {
        $property = $result->fetch_assoc();
        echo "<p><strong>Property ID:</strong> {$property['property_id']}</p>";
        echo "<p><strong>Description:</strong> {$property['description']}</p>";
        echo "<p><strong>Availability Status:</strong> {$property['availability_status']}</p>";
        echo "<p><strong>Size (sqft):</strong> {$property['size_sqft']}</p>";
        echo "<p><strong>Capacity:</strong> {$property['capacity']}</p>";
        echo "<p><strong>Monthly Rent:</strong> {$property['monthly_rent']}</p>";
        echo "<p><strong>Tenant Type:</strong> {$property['tenant_type']}</p>";
        echo "<p><strong>Flat No:</strong> {$property['flat_no']}</p>";
        echo "<p><strong>Building:</strong> {$property['building']}</p>";
        echo "<p><strong>Street:</strong> {$property['street']}</p>";
        echo "<p><strong>Postal Code:</strong> {$property['postal_code']}</p>";
        echo "<p><strong>NID:</strong> {$property['nid']}</p>";
        echo "<p><strong>Photo:</strong><br>";
        echo "<img src='data:image/jpeg;base64," . base64_encode($property['photo']) . "' width='200'></p>";
        echo "<form method='post' action='book.php'>
                <input type='hidden' name='property_id' value={$property_id}> 
                <input type='hidden' name='tenant_nid' value={$_SESSION["user"]["nid"]}> 
                <input type='hidden' name='owner_nid' value={$property['nid']}> 
                <button type='submit' name='book_property'>Book</button>
                </form>";
        echo "<a href='submit_review.php?property_id={$property_id}'><button>Submit Review</button></a>";
        
         // Display reviews
         echo "<h2>REVIEW PROPERTY</h2>";
         echo "<h3>Reviews</h3>";
         
         $reviewsQuery = "SELECT * FROM room_review WHERE review_id = '$property_id'";
         $reviewsResult = $conn->query($reviewsQuery);
        
        if ($reviewsResult->num_rows > 0) {
            while ($review = $reviewsResult->fetch_assoc()) {
                echo "<p>{$review['comments']}</p>";
            }
        } else {
            echo "<p>No reviews available.</p>";
        }
    } else {
        echo "Property not found.";
    }
} else {
    echo "No property ID specified.";
}


$conn->close();
?>

</body>
</html>



<!DOCTYPE html>
<html>
<head>
    <title>Property Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f7f7f7;
        }

        h1 {
            background-color: #333;
            color: white;
            padding: 20px;
            text-align: center;
            margin-bottom: 20px;
        }

        .property-details {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            
            border: 1px solid #ddd;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .property-info {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .property-info label {
            font-weight: bold;
        }

        .property-info .value {
            background-color: #f9f9f9;
            padding: 5px 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .property-photo {
            text-align: center;
            margin-bottom: 20px;
        }

        .property-photo img {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        h2.review-title {
            font-size: 40px;
            margin-top: 40px;
            color: #333;
        }

        .review {
            margin: 20px 0;
            padding: 20px;
            border: 1px solid #ddd;
            background-color: #f9f9f9;
            border-radius: 5px;
        }

        .review p {
            font-size: 16px;
            margin-bottom: 10px;
            color: #555;
        }
    </style>
</head>
<body>