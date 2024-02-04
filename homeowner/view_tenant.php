<!DOCTYPE html>
<html>

<head>
    <title>Tenant Details</title>
</head>

<body>
    <?php
    session_start();

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "rent_home";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $tenant_nid = $_GET['tenant_nid'];

    $sql_tenant = "SELECT * FROM tenant WHERE nid='$tenant_nid'";
    $result_tenant = $conn->query($sql_tenant);

    if ($result_tenant->num_rows > 0) {
        $tenant = $result_tenant->fetch_assoc();
    } else {
        echo "Tenant not found.";
    }

    // tenant er room fetch kortesi abr eviction er jonno
    $sql_room = "SELECT * FROM room WHERE tenant_nid='$tenant_nid'";
    $result_room = $conn->query($sql_room);

    if ($result_room->num_rows > 0) {
        $room = $result_room->fetch_assoc();
        $property_id = $room['property_id'];
    } else {
        echo "Room not found for the tenant.";
    }

    // eviction request submission
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $eviction_reason = $_POST['eviction_reason'];

        $homeowner_nid = $room['nid'];



        $sql_check_existing_request = "SELECT * FROM eviction_requests WHERE property_id = $property_id AND homeowner_nid = $homeowner_nid AND tenant_nid = $tenant_nid";
        $result = $conn->query($sql_check_existing_request);

        if ($result->num_rows > 0) {
            // Update the existing request
            $sql_update_request = "UPDATE eviction_requests SET owner_req = 'cancel', eviction_reason = '$eviction_reason' WHERE property_id = $property_id AND homeowner_nid = $homeowner_nid AND tenant_nid = $tenant_nid";

            if ($conn->query($sql_update_request) === TRUE) {
                header("Location: room_management.php");
            } else {
                echo "Error submitting eviction request: " . $conn->error;
            }
        } else {
            // Insert eviction request into table
            $sql_insert_request = "INSERT INTO eviction_requests (homeowner_nid, tenant_nid, property_id, owner_req, eviction_reason) 
                              VALUES ('$homeowner_nid', '$tenant_nid', '$property_id' , 'cancel','$eviction_reason')";

            if ($conn->query($sql_insert_request) === TRUE) {
                header("Location: room_management.php");
            } else {
                echo "Error submitting eviction request: " . $conn->error;
            }
        }
    }
    ?>

    <h1>Tenant Details</h1>
    <?php if ($result_tenant->num_rows > 0) { ?>
        <p><strong>Name:</strong> <?php echo $tenant['first_name'] . ' ' . $tenant['last_name']; ?></p>
        <p><strong>Gender:</strong> <?php echo $tenant['gender']; ?></p>
        <p><strong>University:</strong> <?php echo $tenant['university']; ?></p>
        <p><strong>Email:</strong> <?php echo $tenant['email']; ?></p>
        <p><strong>Phone:</strong> <?php echo $tenant['phone']; ?></p>
        <p><strong>Present Address:</strong> <?php echo $tenant['present_address']; ?></p>
        <p><strong>Permanent Address:</strong> <?php echo $tenant['permanent_address']; ?></p>
        <p><strong>Job:</strong> <?php echo $tenant['job']; ?></p>
        <p><strong>Salary:</strong> <?php echo $tenant['salary']; ?></p>
        <p><strong>Sponsor:</strong> <?php echo $tenant['sponsor']; ?></p>
        <p><strong>Marital Status:</strong> <?php echo $tenant['marital_status']; ?></p>
        <p><strong>NID Document:</strong> <?php echo $tenant['nid_doc']; ?></p>


        <!-- Eviction Request Form -->
        <h2>Eviction Request</h2>
        <form method="post">
            <label for="eviction_reason">Reason for Eviction:</label><br>
            <textarea name="eviction_reason" id="eviction_reason" rows="4" cols="50"></textarea><br>
            <input type="submit" value="Submit Eviction Request">
        </form>
    <?php } ?>
    <a href="javascript:history.back()">Go Back</a>
</body>

</html>