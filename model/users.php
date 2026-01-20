<?php
require_once __DIR__ . '/DataBase.php';

function InsertUser($fullName, $email, $pass) 
{
    global $conn;

    // 1. Check if email already exists
    $checkQuery = "SELECT * FROM users WHERE email = '$email'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        return "email_exists"; 
    }

    // 2. Prepare values
    $role = 'user';
    $status = 'active';
    $createdAt = date('Y-m-d H:i:s');

    // 3. Proceed to Insert
    // Note: It is best practice to wrap $pass in password_hash(), 
    // but keeping it simple per your example.
    $query = "INSERT INTO users (name, email, password, role, status, created_at) 
              VALUES ('$fullName', '$email', '$pass', '$role', '$status', '$createdAt')";

    $result = mysqli_query($conn, $query);

    if ($result) {
        return true;
    } else {
        return false;
    }
}
function CheckUserLogin($email, $password) {
    global $conn;

    $email = mysqli_real_escape_string($conn, $email);
    $password = mysqli_real_escape_string($conn, $password); 

    $query = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        if ($password === $user['password']) { 
            
            if ($user['status'] === 'locked') {
                return "account_locked";
            }

            return $user; 
        } else {
            return "wrong_password";
        }
    } else {
        return "user_not_found";
    }
}
?>