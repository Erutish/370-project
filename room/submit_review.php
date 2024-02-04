<!DOCTYPE html>
<html>
<head>
    <title>Submit Review</title>
</head>
<body>

<h1>Submit Review</h1>

<?php
// Establish a connection to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rent_home";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the property_id from the URL parameter
if (isset($_GET['property_id'])) {
    $property_id = $_GET['property_id'];

    // Generate review_id using property_id (you can modify this as needed)
    $review_id = "" . $property_id; // For example: R1, R2, ...

    // Handle form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $comments = $_POST['comments'];
        $rating = $_POST['rating'];

        // Insert the review into the database
        $insertQuery = "INSERT INTO room_review ( review_id, comments, rating) VALUES ( '$review_id', '$comments', '$rating')";
        if ($conn->query($insertQuery) === TRUE) {
            header('location:room_view.php');
        } else {
            echo "Error submitting review: " . $conn->error;
        }
    }

    // Display the review form
    echo "<form method='post'>";
    echo "<input type='hidden' name='property_id' value='$property_id'>";
    echo "<label for='review_id'>Review ID:</label>";
    echo "<input type='text' id='review_id' name='review_id' value='$review_id' readonly><br>";
    echo "<label for='comments'>Comments:</label>";
    echo "<textarea id='comments' name='comments'></textarea><br>";
    echo "<label for='rating'>Rating (out of 5):</label>";
    echo "<input type='number' id='rating' name='rating' min='1' max='5'><br>";
    echo "<button type='submit'>Submit Review</button>";
    echo "</form>";
} else {
    echo "No property ID specified.";
}

// Close the connection
$conn->close();
?>

</body>
</html>
