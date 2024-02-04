<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $homeownerNid = $_POST['homeowner_nid'];

    // room from the info 
    $description = $_POST['description'];
    $availabilityStatus = 'Available'; 
    $sizeSqft = $_POST['size_sqft'];
    $capacity = $_POST['capacity'];
    $monthlyRent = $_POST['monthly_rent'];
    $tenantType = $_POST['tenant_type'];
    $flatNo = $_POST['flat_no'];
    $building = $_POST['building'];
    $street = $_POST['street'];
    $postalCode = $_POST['postal_code'];
    $reg_status = "pending";
    $photo = $_SESSION["photo"];


    

    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "rent_home";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert new room into room_reg
    $sql_insert = "INSERT INTO room_reg (property_id, description, availability_status, size_sqft, capacity, monthly_rent, tenant_type, flat_no, building, street, postal_code, nid,reg_status,photo)
        VALUES (NULL, '$description', 'Available', $sizeSqft, $capacity, $monthlyRent, '$tenantType', '$flatNo', '$building', '$street', '$postalCode', $homeownerNid,'$reg_status','$photo')";

    if ($conn->query($sql_insert) === TRUE) {
        header("Location: owner_dash.php");
        exit();
    } else {
        echo "Error adding room: " . $conn->error;
    }

    $conn->close();
}
?>


