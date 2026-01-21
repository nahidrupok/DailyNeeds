<?php
session_start();
require_once '../model/database.php';
require_once '../model/products.php';

if (isset($_POST['update_product'])) {
    
    $id       = $_POST['product_id'];
    $pName    = mysqli_real_escape_string($conn, trim($_POST['product_name']));
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $price    = mysqli_real_escape_string($conn, trim($_POST['price']));

    if (empty($pName) || empty($category) || empty($price)) {
        header("Location: ../view/editProduct.php?id=$id&error=empty");
        exit();
    }

    if (!is_numeric($price) || $price < 0) {
        header("Location: ../view/editProduct.php?id=$id&error=invalid_price");
        exit();
    }

    
    $result = UpdateProduct($id, $pName, $category, $price);

    if ($result) {
        header("Location: ../view/allProducts.php?msg=updated");
    } else {
        header("Location: ../view/editProduct.php?id=$id&error=db_fail");
    }
    exit();

} else {
    header("Location: ../view/allProducts.php");
    exit();
}