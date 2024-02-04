<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel - Tenant Management</title>
    <link rel="stylesheet" type="text/css" href="tenant_management.css">

</head>
<body>
    <h2>Tenant Registration Requests</h2>
    <?php

    $db_host = "localhost";
    $db_username = "root";
    $db_password = "";
    $db_name = "rent_home";

    $conn = new mysqli($db_host, $db_username, $db_password, $db_name);
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch pending tenant registration requests.
    $sql = "SELECT * FROM tenant_signup WHERE reg_status='pending'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<p>NID: " . $row["nid"] . "<br>";
            echo "Name: " . $row["first_name"] . " " . $row["last_name"] . "<br>";
            echo "Gender: " . $row["gender"] . "<br>";
            echo "university: " . $row["university"] . "<br>";
            echo "email: " . $row["email"] . "<br>";
            echo "phone: " . $row["phone"] . "<br>";
            echo "permanent_address: " . $row["permanent_address"] . "<br>";
            echo "present_address: " . $row["present_address"] . "<br>";
            echo "marital_status: " . $row["marital_status"] . "<br>";
            echo "job: " . $row["job"] . "<br>";
            echo "salary: " . $row["salary"] . "<br>";
            echo "reg_Status: " . $row["reg_status"] . "<br>";
            echo '<a href="approve_tenant.php?id=' . $row["nid"] . '">Approve</a> | ';
            echo '<a href="cancel_tenant.php?id=' . $row["nid"] . '">Cancel</a></p>';
        }
    } else {
        echo "No pending tenant registration requests.";
    }

    $conn->close();
    ?>
    <hr>
    <h2>Approved Tenants</h2>
    <?php

    $db_host = "localhost";
    $db_username = "root";
    $db_password = "";
    $db_name = "rent_home";

    $conn = new mysqli($db_host, $db_username, $db_password, $db_name);
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch approved tenants
    $sql = "SELECT * FROM tenant";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<p>NID: " . $row["nid"] . "<br>";
            echo "Name: " . $row["first_name"] . " " . $row["last_name"] . "<br>";
            echo "Gender: " . $row["gender"] . "<br>";
            echo "university: " . $row["university"] . "<br>";
            echo "email: " . $row["email"] . "<br>";
            echo "phone: " . $row["phone"] . "<br>";
            echo "permanent_address: " . $row["permanent_address"] . "<br>";
            echo "present_address: " . $row["present_address"] . "<br>";
            echo "marital_status: " . $row["marital_status"] . "<br>";
            echo "job: " . $row["job"] . "<br>";
            echo "salary: " . $row["salary"] . "<br>";
            if (isset($row["nid"])) {
                echo '<a href="delete_tenant.php?nid=' . $row["nid"] . '">Delete</a></p>';
            } else {
                echo "No 'nid' found in the fetched row.";
            }
        }
    } else {
        echo "No approved tenants.";
    }

    $conn->close();
    ?>
    <a href="javascript:history.back()">Go Back</a>
</body>
</html>
