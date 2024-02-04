<?php

$conn = new mysqli("localhost", "root", "", "rent_home");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_GET["id"];

// reg table er room data
$fetch_room_sql = "SELECT * FROM room_reg WHERE property_id='$id'";
$fetch_room_result = $conn->query($fetch_room_sql);

if ($fetch_room_result->num_rows > 0) {
    $room_data = $fetch_room_result->fetch_assoc();
    
    // homeowner er nid check 
    $nid = $room_data["nid"];
    $check_homeowner_sql = "SELECT * FROM homeowner WHERE nid='$nid'";
    $check_homeowner_result = $conn->query($check_homeowner_sql);

    if ($check_homeowner_result->num_rows > 0) {
        // room e insert approve
        $insert_approved_room_sql = "INSERT INTO room (nid, description, availability_status, monthly_rent, tenant_type, flat_no, building, street, postal_code, size_sqft, capacity) VALUES ('{$room_data["nid"]}', '{$room_data["description"]}', '{$room_data["availability_status"]}', '{$room_data["monthly_rent"]}', '{$room_data["tenant_type"]}', '{$room_data["flat_no"]}', '{$room_data["building"]}', '{$room_data["street"]}', '{$room_data["postal_code"]}', '{$room_data["size_sqft"]}', '{$room_data["capacity"]}')";

        if ($conn->query($insert_approved_room_sql) === TRUE) {
            
            $update_status_sql = "UPDATE room_reg SET reg_status='approved' WHERE property_id='$id'";
            if ($conn->query($update_status_sql) === TRUE) {
                header('location:homeowner_management.php');
            } else {
                echo "Error updating room status: " . $update_status_sql . "<br>" . $conn->error;
            }
        } else {
            echo "Error inserting approved room data: " . $insert_approved_room_sql . "<br>" . $conn->error;
        }
    } else {
        echo "Homeowner with corresponding nid not found. Room approval canceled.";
    }
} else {
    echo "Room data not found.";
}

$conn->close();
?>
