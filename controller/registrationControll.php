<?php
session_start();
require_once '../model/database.php';
require_once '../model/users.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullName = trim($_POST['fullname']);
    $email    = trim($_POST['email']);
    $password = $_POST['password'];

    if (empty($fullName) || empty($email) || empty($password)) {
        $_SESSION['error'] = "Please fill in all fields.";
        header("Location: ../view/register.php"); 
        exit();
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = "Invalid email format.";
        header("Location: ../view/register.php");
        exit();
    }

    $result = InsertUser($fullName, $email, $password);

    if ($result === true) {
        $_SESSION['success'] = "Registration successful! Please login.";
        header("Location: ../view/login.php");
        exit();
    } elseif ($result === "email_exists") {
        $_SESSION['error'] = "This email is already registered!";
        header("Location: ../view/registration.php");
        exit();
    } else {
        $_SESSION['error'] = "Database error. Please try again later.";
        header("Location: ../view/register.php");
        exit();
    }
}
?>