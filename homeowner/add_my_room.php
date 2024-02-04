<?php
session_start(); // Start session cz we need email

// owner already login naki checking
if (!isset($_SESSION['homeowner_email'])) {
    header("Location: homeowner_login.php"); // na korle back to owner page
    exit();
}

// we get email from session
$homeownerEmail = $_SESSION['homeowner_email'];


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rent_home";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetching homeowner profile
$sql_homeowner = "SELECT * FROM homeowner WHERE email='$homeownerEmail'";
$result_homeowner = $conn->query($sql_homeowner); //connect database with query
$homeowner = $result_homeowner->fetch_assoc(); // fetch the row


$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Room</title>
    <link rel="stylesheet" type="text/css" href="add_my_room.css"> 
</head>
<body>
    <header>
        
        <h1>Rent Home - Add Room</h1>
        
    </header>

    <main>
        <h2>Add Room</h2>

    <form action="process_add_room.php" method="post">
        <!-- nid giving from the homeowner info  ad hidden-->
        <input type="hidden" name="homeowner_nid" value="<?php echo $homeowner['nid']; ?>">

        <label for="description">Description:</label>
        <input type="text" id="description" name="description" required><br>

        
        <label for="status">Status:</label>
        <select id="status" name="status">
            <option value="available">Available</option>
            <option value="occupied">Occupied</option>
        </select><br><br>

        <label for="monthly_rent">Monthly Rent:</label>
        <input type="number" id="monthly_rent" name="monthly_rent" required><br><br>

        <label for="tenant_type">Tenant Type:</label>
        <select id="tenant_type" name="tenant_type" required>
            <option value="female">Female</option>
            <option value="male">Male</option>
        </select><br><br>

        <label for="flat_no">Flat Number:</label>
        <input type="text" id="flat_no" name="flat_no"><br><br>

        <label for="building">Building:</label>
        <input type="text" id="building" name="building" required><br><br>

        <label for="street">Street:</label>
        <input type="text" id="street" name="street" required><br><br>

        <label for="postal_code">Postal Code:</label>
        <input type="text" id="postal_code" name="postal_code" required><br><br>

        <label for="size_sqft">Size (sqft):</label>
        <input type="number" id="size_sqft" name="size_sqft" required><br>

        <label for="capacity">Room Capacity (person):</label>
        <input type="number" id="capacity" name="capacity" required><br><br>

        <label for="photo">Room Photo:</label>
        <input type="file" id="room_photo" name="room_photo" accept=".jpg, .jpeg, .png" required><br><br>

        <input type="submit" value="Add Room">
    </form>
    <div class="center-button">
            <a href="../index.php">
                <button class="user-type-button tenant">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm0 2a6 6 0 0 0-6 6h12a6 6 0 0 0-6-6z" />
                    </svg>
                    Go to Home
                </button>
            </a>
        </div>
    </main>

    
    <footer>
        
        <p>&copy; <?php echo date("Y"); ?> Rent Home. All rights reserved.</p>
    </footer>
</body>
</html>
