<?php
// Connect to the database 
$db_host = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "rent_home";

$conn = new mysqli($db_host, $db_username, $db_password, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_GET["id"];

// woner_req data
$homeowner_sql = "SELECT * FROM owner_signup WHERE nid='$id'";
$homeowner_result = $conn->query($homeowner_sql);

if ($homeowner_result->num_rows == 1) {
    $homeowner_row = $homeowner_result->fetch_assoc();
    
    // Insert approved data
    $approved_homeowner_sql = "INSERT INTO homeowner (nid, first_name, last_name, email, phone_number, address, password) VALUES ('$homeowner_row[nid]', '$homeowner_row[first_name]', '$homeowner_row[last_name]', '$homeowner_row[email]', '$homeowner_row[phone_number]', '$homeowner_row[address]', '$homeowner_row[password]')";
    
    if ($conn->query($approved_homeowner_sql) === TRUE) {
        $approved_homeowner_id = $conn->insert_id;
        
        // status== "approved"
        $update_homeowner_status_sql = "UPDATE owner_signup SET reg_status='approved' WHERE nid='$id'";
        if ($conn->query($update_homeowner_status_sql) === TRUE) {
            header('location:homeowner_management.php');
        } else {
            echo "Error updating homeowner status: " . $update_homeowner_status_sql . "<br>" . $conn->error;
        }
        
    } else {
        echo "Error inserting into approved_homeowners table: " . $approved_homeowner_sql . "<br>" . $conn->error;
    }
} else {
    echo "Homeowner request not found.";
}

$conn->close();
?>
