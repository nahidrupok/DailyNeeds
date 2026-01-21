<?php
session_start();
require_once '../model/database.php';
require_once '../model/products.php';

if (isset($_POST['add_to_cart'])) {
    if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
        $_SESSION['error'] = "Please login to add products to your cart.";
        header("Location: ../view/login.php");
        exit();
    }

    $cusId = $_SESSION['user_id'];
    $cusName = $_SESSION['user_name'];
    $cusEmail = $_SESSION['user_email'];

    $proId = $_POST['pro_id'];
    $proName = $_POST['pro_name'];
    $proPrice = $_POST['pro_price'];

    $result = CreateOrder($cusId, $cusName, $cusEmail, $proId, $proName, $proPrice);

    if ($result) {
        header("Location: ../view/products.php?status=success");
    } else {
        header("Location: ../view/products.php?status=error");
    }
    exit();
}