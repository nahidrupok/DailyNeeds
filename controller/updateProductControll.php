<?php
session_start();
require_once '../model/database.php';
require_once '../model/products.php';

if (isset($_POST['update_product'])) {
    
    // 1. Collect and sanitize inputs
    $id       = $_POST['product_id'];
    $pName    = mysqli_real_escape_string($conn, trim($_POST['product_name']));
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $price    = mysqli_real_escape_string($conn, trim($_POST['price']));

    // 2. Validation
    if (empty($pName) || empty($category) || empty($price)) {
        // Redirect back with an error if any field is empty
        header("Location: ../view/editProduct.php?id=$id&error=empty");
        exit();
    }

    if (!is_numeric($price) || $price < 0) {
        // Ensure price is a positive number
        header("Location: ../view/editProduct.php?id=$id&error=invalid_price");
        exit();
    }

    // 3. Call the Model Function
    // This calls the UpdateProduct($id, $name, $category, $price) we built earlier
    $result = UpdateProduct($id, $pName, $category, $price);

    // 4. Final Redirection
    if ($result) {
        header("Location: ../view/allProducts.php?msg=updated");
    } else {
        header("Location: ../view/editProduct.php?id=$id&error=db_fail");
    }
    exit();

} else {
    // Prevent direct access to the controller
    header("Location: ../view/allProducts.php");
    exit();
}