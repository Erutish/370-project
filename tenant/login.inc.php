<?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $email = $_POST["email"];
        $password = $_POST["password"];

        require_once '../include/db.inc.php';
        require_once '../include/functions.inc.php';

        if (emptyInputLogin($email, $password) !== false) {
            header("Location: login.php");
            exit();
        }

        loginUser($conn, $email, $password);
    }
    else {
        header("Location: login.php");
        exit();
    }