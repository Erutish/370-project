<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $roomId = $_POST['room_id'];

    $newDescription = $_POST['description'];
    $newAvailabilityStatus = $_POST['availability_status'];
    $newMonthlyRent = $_POST['monthly_rent'];
    $newTenantType = $_POST['tenant_type'];
    $newFlatNo = $_POST['flat_no'];
    $newBuilding = $_POST['building'];
    $newStreet = $_POST['street'];
    $newPostalCode = $_POST['postal_code'];
    $newSizeSqft = $_POST['size_sqft'];
    $newCapacity = $_POST['capacity'];

    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "rent_home";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // update korbo sob info actual room table e
    $sql_update = "UPDATE room SET
        description='$newDescription',
        availability_status='$newAvailabilityStatus',
        monthly_rent='$newMonthlyRent',
        tenant_type='$newTenantType',
        flat_no='$newFlatNo',
        building='$newBuilding',
        street='$newStreet',
        postal_code='$newPostalCode',
        size_sqft='$newSizeSqft',
        capacity='$newCapacity'
        WHERE property_id='$roomId'";
    
    if ($conn->query($sql_update) === TRUE) {
        header("Location: room_management.php");
        exit();
    } else {
        echo "Error updating room: " . $conn->error;
    }

    $conn->close();
}
?>
