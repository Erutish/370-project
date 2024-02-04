<!DOCTYPE html>
<html>
<head>
    <title>Submit Tenant Review</title>
</head>
<body>

<h1>Submit Tenant Review</h1>

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rent_home";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $rating = $_POST["rating"];
    $comments = $_POST["comments"];
    $reviewId = $_POST["review_id"];

    // Insert review data into the database
    $insertQuery = "INSERT INTO tenant_history (rating, comments, review_id) VALUES ('$rating', '$comments', '$reviewId')";
    if ($conn->query($insertQuery) === TRUE) {
        echo "Review submitted successfully!";
    } else {
        echo "Error submitting review: " . $conn->error;
    }
}


$conn->close();
?>

<form method="POST">
    <label for="rating">Rating:</label>
    <input type="number" name="rating" min="1" max="5" required><br>

    <label for="comments">Comments:</label><br>
    <textarea name="comments" rows="4" cols="50" required></textarea><br>

    <?php
    
    if (isset($_GET['nid'])) {
        $reviewId = $_GET['nid'];
        echo "<input type='hidden' name='review_id' value='$reviewId'>";
    }
    ?>

    <input type="submit" value="Submit Review">
</form>

</body>
</html>
