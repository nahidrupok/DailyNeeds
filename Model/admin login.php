<?php
session_start();
include("../config.php");

if (isset($_POST['login'])) {

    $email    = trim($_POST['email']);
    $password = $_POST['password'];

    // 1️⃣ check if admin exists
    $sql = "SELECT * FROM users WHERE email='$email' AND role='admin'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 0) {
        // ❌ no account → go to registration
        header("Location: ../Registration/admin-registration.php");
        exit();
    }

    // 2️⃣ admin exists → verify password
    $admin = mysqli_fetch_assoc($result);

    if (!password_verify($password, $admin['password'])) {
        echo "Invalid password";
        exit();
    }

    // 3️⃣ login success
    $_SESSION['admin_id']   = $admin['id'];
    $_SESSION['admin_name'] = $admin['name'];

    header("Location: dashbord.php");
    exit();
}
?>
