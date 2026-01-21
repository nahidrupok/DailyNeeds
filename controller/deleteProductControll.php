<?php
session_start();
require_once '../model/database.php';
require_once '../model/products.php';


if (!isset($_SESSION['logged_in'])) {
    header("Location: ../view/login.php");
    exit();
}


if (isset($_GET['id'])) {
    $id = $_GET['id'];

    
    if (deleteProduct($id)) {
        
        header("Location: ../view/allProducts.php?status=deleted");
    } else {
        header("Location: ../view/allProducts.php?status=error");
    }
} else {
    header("Location: ../view/allProducts.php");
}
exit();
?>