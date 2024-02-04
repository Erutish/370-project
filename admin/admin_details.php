<!DOCTYPE html>
<html>
<head>
    <title>Admin Details</title>
    <link rel="stylesheet" type="text/css" href="admin_style.css">
</head>
<body>

<div class="container">
    <h1>Admin Details</h1>

    <?php
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "rent_home";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    //  URL parameter theke id
    if (isset($_GET['id'])) {
        $adminId = $_GET['id'];

        
        $query = "SELECT * FROM admin WHERE id = $adminId";
        $result = $conn->query($query);

        // print korbe admin details
        if ($result->num_rows > 0) {
            $admin = $result->fetch_assoc();
            echo "<p><strong>ID:</strong> {$admin['id']}</p>";
            echo "<p><strong>Name:</strong> {$admin['Name']}</p>";
            echo "<p><strong>Email:</strong> {$admin['email']}</p>";
            
        } else {
            echo "Admin not found.";
        }
    } else {
        echo "No ID specified.";
    }

   
    $conn->close();
    ?>
</div>

</body>
</html>
