<?php
session_start();
include("../Model/admin login.php");

$userModel = new User($conn);

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $admin = $userModel->loginAdmin($email, $password);

    if($admin){
        $_SESSION['admin_id'] = $admin['id'];
        $_SESSION['admin_name'] = $admin['name'];
        header("Location: ../views/dashboard.php");
        exit();
    } else {
        $error = "Invalid credentials!";
    }
}
