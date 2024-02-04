<?php
$validToken = 'agab2o12'; 
$recievedToken = $_GET['auth'];

if ($recievedToken == $validToken) {
    // Allow access to the admin registration page
    include('admin-panel.php');
} else {
    // Redirect to homepage
    header('index.php'); 
    exit;
}
?>
