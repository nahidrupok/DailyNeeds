<?php
require_once __DIR__ . '/DataBase.php';
function AddProduct($pName, $category, $price) 
{
    global $conn;

    $checkQuery = "SELECT * FROM products WHERE name = '$pName'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        return "product_exists"; 
    }

    
    $query = "INSERT INTO products (name, category, price) 
              VALUES ('$pName', '$category', '$price')";

    $result = mysqli_query($conn, $query);

    if ($result) {
        return true;
    } else {
        return false;
    }
}

function GetAllProducts() 
{
    global $conn;

    $query = "SELECT id, name, category, price FROM products ORDER BY id DESC";

    $result = mysqli_query($conn, $query);

    if ($result) {
        return $result;
    } else {
        return false;
    }
}
function GetProductById($id) {
    global $conn;
    $query = "SELECT * FROM products WHERE id = '$id'";
    $result = mysqli_query($conn, $query);
    
    if ($result && mysqli_num_rows($result) > 0) {
        return mysqli_fetch_assoc($result);
    }
    return false;
}

function UpdateProduct($id, $name, $category, $price) {
    global $conn;
    $query = "UPDATE products 
              SET name = '$name', category = '$category', price = '$price' 
              WHERE id = '$id'";
              
    return mysqli_query($conn, $query);
}

function CreateOrder($cusId, $cusName, $cusEmail, $proId, $proName, $proPrice) 
{
    global $conn;

    $quantity = 1;
    $totalAmount = $proPrice * $quantity;
    $orderStatus = 'pending';
    $paymentStatus = 'unPaid';


    $query = "INSERT INTO orders (cus_id, cus_name, cus_email, pro_id, pro_name, pro_price, order_status, total_amount, payment_status, quantity) 
              VALUES ('$cusId', '$cusName', '$cusEmail', '$proId', '$proName', '$proPrice', '$orderStatus', '$totalAmount', '$paymentStatus', '$quantity')";

    $result = mysqli_query($conn, $query);

    if ($result) {
        return true;
    } else {
        return false;
    }
}
function deleteProduct($id) {
    global $conn;
    $id = mysqli_real_escape_string($conn, $id); 
    $sql = "DELETE FROM products WHERE id = $id";
    
    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        return false;
    }
}