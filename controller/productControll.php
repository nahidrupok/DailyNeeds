<?php
session_start();
require_once '../model/database.php';
require_once '../model/products.php';

if (isset($_POST['add_product'])) {
    
    $pName    = mysqli_real_escape_string($conn, $_POST['product_name']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $price    = mysqli_real_escape_string($conn, $_POST['price']);

    if (empty($pName) || empty($category) || empty($price)) {
        header("Location: ../view/addProduct.php?error=empty");
        exit();
    }

    if (AddProduct($pName, $category, $price))
         {
        header("Location: ../view/allProducts.php?msg=success");
    } else {
        header("Location: ../view/addProduct.php?error=failed");
    }
    exit();
}