<!-- reviews_section.php -->

<?php

$reviewsQuery = "SELECT * FROM homeowner_reviews WHERE review_id = {$homeowner['nid']}";
$reviewsResult = $conn->query($reviewsQuery);

echo "<div class='review-section'>"; 
echo "<h2>REVIEW SECTION</h2>";
if ($reviewsResult->num_rows > 0) {
    while ($review = $reviewsResult->fetch_assoc()) {
        echo "<p>{$review['comments']}</p>";
    }
} else {
    echo "<p>No reviews available.</p>";
}
echo "</div>"; 
?>
