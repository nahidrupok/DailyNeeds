<?php
session_start();
require_once '../model/database.php';
require_once '../model/users.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 1. Capture and clean input
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    // 2. Simple server-side validation
    if (empty($email) || empty($password)) {
        $_SESSION['error'] = "All fields are required.";
        header("Location: ../view/login.php");
        exit();
    }

    // 3. Call the Model function we created
    $result = CheckUserLogin($email, $password);

    // 4. Handle the response
    if (is_array($result)) {
        // SUCCESS: Create session variables for the user
        $_SESSION['user_id'] = $result['id'];
        $_SESSION['user_email'] = $result['email'];
        $_SESSION['user_name'] = $result['name'];
        $_SESSION['user_role'] = $result['role'];
        $_SESSION['logged_in'] = true;

        // Redirect based on role (optional)
        if ($result['role'] === 'admin') {
            header("Location: ../view/admin_dashboard.php");
        } else {
            header("Location: ../view/customerProfile.php");
        }
        exit();

    } else {
        // FAILURE: Show specific error messages
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