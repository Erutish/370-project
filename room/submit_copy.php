<?php
session_start();

    //from theke homeowner
    $first_name = $_SESSION["first_name"];
    $last_name = $_SESSION["last_name"];
    $address = $_SESSION["address"];
    $nid = $_SESSION["nid"];
    $password = $_SESSION["password"];
    $phone_number = $_SESSION["phone_number"];
    $email = $_SESSION["email"];
    $request_status = "pending"; 

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // from theke room
    $description = $_SESSION["description"];
    $reg_status = "pending"; 
    $monthly_rent = $_SESSION["monthly_rent"];
    $tenant_type = $_SESSION["tenant_type"];
    $flat_no = $_SESSION["flat_no"];
    $building = $_SESSION["building"];
    $street = $_SESSION["street"];
    $postal_code = $_SESSION["postal_code"];
    $size = $_SESSION["size"];
    $capacity = $_SESSION["capacity"];
    $status = $_SESSION["status"];
    $photo = $_SESSION["photo"];
    $availability_status = "vacant";

    
    $conn = new mysqli("localhost", "root", "", "rent_home");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // homeowner_requests table e insert
    $insert_homeowner_sql = "INSERT INTO owner_signup (first_name, last_name, address, nid, password, phone_number, email, reg_status) VALUES ('$first_name', '$last_name', '$address', '$nid', '$hashed_password', '$phone_number', '$email', '$request_status')";
    if ($conn->query($insert_homeowner_sql) !== TRUE) {
        echo "Error inserting homeowner data: " . $conn->error;
    }
        
    $insert_room_sql = "INSERT INTO room_reg (nid, description, reg_status, monthly_rent, tenant_type, flat_no, building, street, postal_code, size_sqft, capacity, availability_status,photo) VALUES ('$nid', '$description', '$reg_status', '$monthly_rent', '$tenant_type', '$flat_no', '$building', '$street', '$postal_code', '$size', '$capacity', '$availability_status','$photo')";
    if ($conn->query($insert_room_sql) !== TRUE) {
        echo "Error inserting room data: " . $conn->error;
    }
    session_unset();
    session_destroy();
    header("Location: ../login.php");
    $conn->close();
?>
