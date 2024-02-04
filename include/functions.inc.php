<?php 

function uidExists($conn, $email) {
    $sql = "SELECT * FROM tenant WHERE email = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../tenant/tenant_reg.php");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }
    else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}


function emptyInputLogin($email, $password) {
    $result = false;
    if (empty($email) || empty($password)) {
        $result = true;
    }
    return $result;
}


function loginUser($conn, $email, $password) {
    $user = uidExists($conn, $email);

    if ($user === false) {
        header("Location: tenant/login.php?error=wronglogin");
        // echo "id wrong";
        exit();
    }

    $pwdHashed = $user['password'];
    $checkPwd = password_verify($password, $pwdHashed);

    if ($checkPwd === false) {
        header("Location: tenant/login.php?error=wronglogin");
        // echo "pwd wrong";
        exit();
    }

    elseif ($checkPwd === true) {
        session_start();
        $_SESSION["user"] = $user;
        header("Location: ../tenant/dashboard.php");
        exit();
    }
}