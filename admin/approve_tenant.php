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

$id = $_GET["id"];

// tenant req 
$sql = "SELECT * FROM tenant_signup WHERE nid='$id'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    
    // Insert approved tenant
    $approved_sql = "INSERT INTO tenant (nid, first_name, last_name, gender, university, email, phone, present_address, permanent_address, sponsor, marital_status, job, salary, password) VALUES ('$row[nid]', '$row[first_name]', '$row[last_name]', '$row[gender]', '$row[university]', '$row[email]', '$row[phone]', '$row[present_address]', '$row[permanent_address]', '$row[sponsor]', '$row[marital_status]', '$row[job]', '$row[salary]', '$row[password]')";
    
    if ($conn->query($approved_sql) === TRUE) {
        
        $update_sql = "UPDATE tenant_signup SET reg_status='approved' WHERE nid='$id'";
        if ($conn->query($update_sql) === TRUE) {
            header('location:tenant_management.php');
        } else {
            echo "Error updating status: " . $update_sql . "<br>" . $conn->error;
        }
    } else {
        echo "Error inserting into approved_tenants table: " . $approved_sql . "<br>" . $conn->error;
    }
} else {
    echo "Tenant request not found.";
}

$conn->close();
?>
