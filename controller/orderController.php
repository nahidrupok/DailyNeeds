<?php
session_start();
require_once '../model/database.php';
require_once '../model/products.php';

if (isset($_POST['add_to_cart'])) {
    // 1. Check if user is logged in
    if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
        $_SESSION['error'] = "Please login to add products to your cart.";
        header("Location: ../view/login.php");
        exit();
    }

    // 2. Get User Data from Session
    $cusId = $_SESSION['user_id'];
    $cusName = $_SESSION['user_name'];
    $cusEmail = $_SESSION['user_email'];

    // 3. Get Product Data from Form
    $proId = $_POST['pro_id'];
    $proName = $_POST['pro_name'];
    $proPrice = $_POST['pro_price'];

    // 4. Call the function
    $result = CreateOrder($cusId, $cusName, $cusEmail, $proId, $proName, $proPrice);

    if ($result) {
        // Redirect back to products with success
        header("Location: ../view/products.php?status=success");
    } else {
        header("Location: ../view/products.php?status=error");
    }
    exit();
}