<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $fields = [
            "first_name", "last_name", "nid", "gender", "university", "email", 
            "phone", "present_address", "permanent_address", "job", "salary", 
            "sponsor", "marital_status", "password", "re-password"
        ];

        $fD = [];

        foreach ($fields as $field) {
            $fD[$field] = filter_input(INPUT_POST, $field, FILTER_SANITIZE_SPECIAL_CHARS);
        }

        $reg_status = 'pending';
        $hashedPwd = password_hash($fD['password'], PASSWORD_DEFAULT);

        require_once '../include/db.inc.php';
        
        $sql = "INSERT INTO tenant_signup (first_name, last_name, nid, gender, university, email, phone, present_address, permanent_address, job, salary, sponsor, marital_status, password, reg_status) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);
        
        $params = [
            $fD['first_name'], $fD['last_name'], $fD['nid'], $fD['gender'], $fD['university'], $fD['email'], $fD['phone'], $fD['present_address'], $fD['permanent_address'], $fD['job'], $fD['salary'], $fD['sponsor'], $fD['marital_status'],  $hashedPwd, $reg_status
        ];

        
        $types = str_repeat('s', count($params)); 

        
        $stmt->bind_param($types, ...$params);

        if ($stmt->execute()) {
            // echo "Registration successful!";
            header("Location: ../index.php");
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    }
?>
