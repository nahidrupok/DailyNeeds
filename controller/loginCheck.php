<?php
session_start();
require_once '../model/database.php';
require_once '../model/users.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        $_SESSION['error'] = "All fields are required.";
        header("Location: ../view/login.php");
        exit();
    }

    $result = CheckUserLogin($email, $password);

    if (is_array($result)) {
        $_SESSION['user_id'] = $result['id'];
        $_SESSION['user_email'] = $result['email'];
        $_SESSION['user_name'] = $result['name'];
        $_SESSION['user_role'] = $result['role'];
        $_SESSION['logged_in'] = true;

        if ($result['role'] === 'admin') {
            header("Location: ../view/admin_dashboard.php");
        } else {
            header("Location: ../view/customerProfile.php");
        }
        exit();

    } else {
        if ($result === "wrong_password" || $result === "user_not_found") {
            $_SESSION['error'] = "Invalid email or password.";
        } elseif ($result === "account_locked") {
            $_SESSION['error'] = "Account locked. Please contact support.";
        } else {
            $_SESSION['error'] = "Something went wrong. Try again.";
        }

        header("Location: ../view/login.php");
        exit();
    }
}