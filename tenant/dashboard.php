<?php
include("../head-nav-foot/header.php");

$firstName = $_SESSION["user"]["first_name"];
$lastName = $_SESSION["user"]["last_name"];
$nid = $_SESSION["user"]["nid"];
$gender = $_SESSION["user"]["gender"];
$university = $_SESSION["user"]["university"];
$email = $_SESSION["user"]["email"];
$phone = $_SESSION["user"]["phone"];
$presentAddress = $_SESSION["user"]["present_address"];
$permanentAddress = $_SESSION["user"]["permanent_address"];
$job = $_SESSION["user"]["job"];
$salary = $_SESSION["user"]["salary"];
$sponsor = $_SESSION["user"]["sponsor"];
$maritalStatus = $_SESSION["user"]["marital_status"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../head-nav-foot/header.css">
    <link rel="stylesheet" href="../styles/dashboard.css">
    <title>Tenant Dashboard</title>
</head>

<body>
    <nav>
        <ul>
            <li><a href="./dashboard/rent.php">Rent Information</a></li>
            <li><a href="./dashboard/requests.php">Booking Requests</a></li>
        </ul>
    </nav>
    <div class="dashboard">
        
        <div class="profile">
            <h2>Profile Information</h2>
            <p>First Name: <?php echo $firstName; ?></p>
            <p>Last Name: <?php echo $lastName; ?></p>
            <p>National ID: <?php echo $nid; ?></p>
            <p>Gender: <?php echo $gender; ?></p>
            <p>University: <?php echo $university; ?></p>
            <p>Email: <?php echo $email; ?></p>
            <p>Phone: <?php echo $phone; ?></p>
            <p>Present Address: <?php echo $presentAddress; ?></p>
            <p>Permanent Address: <?php echo $permanentAddress; ?></p>
            <p>Job: <?php echo $job; ?></p>
            <p>Salary: <?php echo $salary; ?></p>
            <p>Sponsor: <?php echo $sponsor; ?></p>
            <p>Marital Status: <?php echo $maritalStatus; ?></p>
        </div>
    </div>
    <div class="center-button">
            <a href="../index.php">
                <button>Home Page</button>
            </a>
        </div>
    <div class="center-button">
            <a href="../homeowner/homeowner_view.php">
                <button>Homeowner List</button>
            </a>
        </div>    
        <div class="center-button">
            <a href="../room/room_view.php">
                <button>Room List</button>
            </a>
        </div> 
    
</body>

</html>