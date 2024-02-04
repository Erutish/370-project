<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel - Homeowner & Room Management</title>
    <link rel="stylesheet" type="text/css" href="admin_panel_style.css">
</head>
<body>

<body>

    <h2>Homeowner Registration Requests</h2>


    <?php
    // Connect to the database (replace with your connection code)
    $db_host = "localhost";
    $db_username = "root";
    $db_password = "";
    $db_name = "rent_home";

    $conn = new mysqli($db_host, $db_username, $db_password, $db_name);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch pending homeowner registration requests
    $sql = "SELECT * FROM owner_signup WHERE reg_status='pending'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<p>NID: " . $row["nid"] . "<br>";
            echo "Name: " . $row["first_name"] . " " . $row["last_name"] . "<br>";
            echo "Address: " . $row["address"] . "<br>";
            echo "Phone_number: " . $row["phone_number"] . "<br>";
            echo "Email: " . $row["email"] . "<br>";
            echo "reg_Status: " . $row["reg_status"] . "<br>";
            echo '<a href="homeowner_approve.php?id=' . $row["nid"] . '">Approve</a> | ';
            echo '<a href="homeowner_cancel.php?id=' . $row["nid"] . '">Cancel</a></p>';
        }
    } else {
        echo "No pending homeowner registration requests.";
    }

    $conn->close();
    ?>


    <hr>
    <h2>Approved Homeowners </h2>






    <?php
    // Connect to the database (replace with your connection code)
    $db_host = "localhost";
    $db_username = "root";
    $db_password = "";
    $db_name = "rent_home";

    $conn = new mysqli($db_host, $db_username, $db_password, $db_name);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    ?>

    

    <?php



    // Fetch approved homeowners
    $approved_homeowners_sql = "SELECT * FROM homeowner";
    $approved_homeowners_result = $conn->query($approved_homeowners_sql);

    if ($approved_homeowners_result->num_rows > 0) {
        while ($approved_homeowners_row = $approved_homeowners_result->fetch_assoc()) {
            echo "<p>NID: " . $approved_homeowners_row["nid"] . "<br>";
            echo "Name: " . $approved_homeowners_row["first_name"] . " " . $approved_homeowners_row["last_name"] . "<br>";
            echo "Address: " . $approved_homeowners_row["address"] . "<br>";
            echo "Phone_number: " . $approved_homeowners_row["phone_number"] . "<br>";
            echo "Email: " . $approved_homeowners_row["email"] . "<br>";
            echo '<a href="delete_homeowner.php?id=' . $approved_homeowners_row["nid"] . '">Delete Homeowner</a></p>';
        }
    } else {
        echo "No approved homeowners.";
    }

    ?>


    <hr>
    <h2>Approved  Rooms</h2>



    <?php

  
    $approved_rooms_sql = "SELECT * FROM room";
    $approved_rooms_result = $conn->query($approved_rooms_sql);

    if ($approved_rooms_result->num_rows > 0) {
        while ($approved_rooms_row = $approved_rooms_result->fetch_assoc()) {
            echo "<p>Property ID: " . $approved_rooms_row["property_id"] . "<br>";
            echo "Description: " . $approved_rooms_row["description"] . "<br>";
            echo "availability_status: " . $approved_rooms_row["availability_status"] . "<br>";
            echo "size_sqft: " . $approved_rooms_row["size_sqft"] . "<br>";
            echo "capacity: " . $approved_rooms_row["capacity"] . "<br>";
            echo "monthly_rent: " . $approved_rooms_row["monthly_rent"] . "<br>";
            echo "tenant_type: " . $approved_rooms_row["tenant_type"] . "<br>";
            echo "flat_no: " . $approved_rooms_row["flat_no"] . "<br>";
            echo "building: " . $approved_rooms_row["building"] . "<br>";
            echo "street: " . $approved_rooms_row["street"] . "<br>";
            echo "postal_code: " . $approved_rooms_row["postal_code"] . "<br>";
            echo '<a href="delete_room.php?id=' . $approved_rooms_row["property_id"] . '">Delete Room</a></p>';
        }
    } else {
        echo "No approved rooms.";
    }


    ?>




    

    <?php

  
    $pending_rooms_sql = "SELECT * FROM room_reg WHERE reg_status='pending'";
    $pending_rooms_result = $conn->query($pending_rooms_sql);

    if ($pending_rooms_result->num_rows > 0) {
        echo "<h2>Pending Room Requests</h2>";
        while ($pending_rooms_row = $pending_rooms_result->fetch_assoc()) {
            echo "<p>Property ID: " . $pending_rooms_row["property_id"] . "<br>";
            echo "Description: " . $pending_rooms_row["description"] . "<br>";


           
            echo "availability_status: " .$pending_rooms_row["availability_status"] . "<br>";
            echo "size_sqft: " . $pending_rooms_row["size_sqft"] . "<br>";
            echo "reg_satus: " . $pending_rooms_row["reg_status"] . "<br>";
            echo "capacity: " . $pending_rooms_row["capacity"] . "<br>";
            echo "monthly_rent: " . $pending_rooms_row["monthly_rent"] . "<br>";
            echo "tenant_type: " . $pending_rooms_row["tenant_type"] . "<br>";
            echo "flat_no: " . $pending_rooms_row["flat_no"] . "<br>";
            echo "building: " . $pending_rooms_row["building"] . "<br>";
            echo "street: " . $pending_rooms_row["street"] . "<br>";
            echo "postal_code: " . $pending_rooms_row["postal_code"] . "<br>";
            echo '<a href="approve_room.php?id=' . $pending_rooms_row["property_id"] . '">Approve</a> | ';
            echo '<a href="cancel_room.php?id=' . $pending_rooms_row["property_id"] . '">Cancel</a></p>';
        }
    } else {
        echo "No pending room requests.";
    }
    ?>
    <a href="javascript:history.back()">Go Back</a>

    </div>
   
    <div class="footer">
    2023 Your Company. All rights reserved
</div>
    $conn->close();
    ?>

</div>


</body>

</html>