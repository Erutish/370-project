<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $_SESSION["description"] = $_POST["description"];
        $_SESSION["status"] = $_POST["status"];
        $_SESSION["monthly_rent"] = $_POST["monthly_rent"];
        $_SESSION["tenant_type"] = $_POST["tenant_type"];
        $_SESSION["flat_no"] = $_POST["flat_no"];
        $_SESSION["building"] = $_POST["building"];
        $_SESSION["street"] = $_POST["street"];
        $_SESSION["postal_code"] = $_POST["postal_code"];
        $_SESSION["size"] = $_POST["size"];
        $_SESSION["capacity"] = $_POST["capacity"];
        $_SESSION["photo"] = $_POST["photo"];
        header("Location: ./submit_copy.php");
        exit();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link rel="stylesheet" href="add_room.css">
    
</head>
<body>
    <div class="page-container">
        <div class="border-container">
            <div class="top-half">
                
                <h1>Add Room</h1>
            </div>
            
            <div class="container">
            <form action="add_room.php" method="POST" enctype="multipart/form-data">

                <label for="description">Description:</label>
                <input type="text" id="description" name="description" required><br><br>

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

                <label for="size">Room Size:</label>
                <input type="number" id="size" name="size" required><br><br>

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
            </div>
        </div>
    </div>
</body>
    
   
    
    
    
</body>
</html>
