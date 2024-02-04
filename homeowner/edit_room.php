<?php
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $roomId = $_GET['id']; // id=property_id

    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "rent_home";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // room er info for edit
    $sql_room = "SELECT * FROM room WHERE property_id='$roomId'"; 
    $result_room = $conn->query($sql_room);
    
    if ($result_room->num_rows == 1) {
        $room = $result_room->fetch_assoc(); 
    } else {
        echo "Room not found.";
        exit(); 
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Room</title>
    <link rel="stylesheet" href="edit_room.css">
</head>
<body>
    <h1>Edit Room</h1>

    <form action="update_room.php" method="post">
        <label for="description">Description:</label>
        <input type="text" id="description" name="description" value="<?php echo $room['description']; ?>" required><br>

        <!-- Add other form fields here -->
        <label for="availability_status">Availability Status:</label>
        <input type="text" id="availability_status" name="availability_status" value="<?php echo $room['availability_status']; ?>" required><br>

        <label for="monthly_rent">Monthly Rent:</label>
        <input type="number" id="monthly_rent" name="monthly_rent" value="<?php echo $room['monthly_rent']; ?>" required><br>

        <label for="tenant_type">Tenant Type:</label>
        <input type="text" id="tenant_type" name="tenant_type" value="<?php echo $room['tenant_type']; ?>" required><br>

        <label for="flat_no">Flat No:</label>
        <input type="text" id="flat_no" name="flat_no" value="<?php echo $room['flat_no']; ?>" required><br>

        <label for="building">Building:</label>
        <input type="text" id="building" name="building" value="<?php echo $room['building']; ?>" required><br>

        <label for="street">Street:</label>
        <input type="text" id="street" name="street" value="<?php echo $room['street']; ?>" required><br>

        <label for="postal_code">Postal Code:</label>
        <input type="text" id="postal_code" name="postal_code" value="<?php echo $room['postal_code']; ?>" required><br>

        <label for="size_sqft">Size (sqft):</label>
        <input type="number" id="size_sqft" name="size_sqft" value="<?php echo $room['size_sqft']; ?>" required><br>

        <label for="capacity">Capacity:</label>
        <input type="number" id="capacity" name="capacity" value="<?php echo $room['capacity']; ?>" required><br>
        
        <input type="hidden" name="room_id" value="<?php echo $room['property_id']; ?>">
        <input type="submit" value="Update">
    </form>
</body>
</html>
