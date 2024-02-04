<?php
session_start();


$_SESSION = array();


session_destroy();

// login page a back not sure**
header("Location:http://localhost/dashboard/370_project/admin/admin-auth-url.php?auth=agab2o12");
exit;
