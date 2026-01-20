<?php
session_start();
require_once '../model/database.php';
require_once '../model/products.php';

if (isset($_POST['add_product'])) {
    
    // 1. Get data from form and clean it
    $pName    = mysqli_real_escape_string($conn, $_POST['product_name']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $price    = mysqli_real_escape_string($conn, $_POST['price']);

    // 2. Simple check: Are fields empty?
    if (empty($pName) || empty($category) || empty($price)) {
        header("Location: ../view/addProduct.php?error=empty");
        exit();
    }

    // 3. Call the function
    if (AddProduct($pName, $category, $price)) {
        // Success: Go to the list
        header("Location: ../view/allProducts.php?msg=success");
    } else {
        // Fail: Go back to form
        header("Location: ../view/addProduct.php?error=failed");
    }
    exit();
}