<?php
session_start();


$_SESSION = array();


session_destroy();

// login page a back not sure**
header("Location:../index.php");
exit;
