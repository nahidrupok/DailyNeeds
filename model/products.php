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

    
    // 3. Execute Insert
    $query = "INSERT INTO products (name, category, price) 
              VALUES ('$pName', '$category', '$price')";

    $result = mysqli_query($conn, $query);

    if ($result) {
        return true;
    } else {
        return false;
    }
}

// all products
function GetAllProducts() 
{
    global $conn;

    // 1. Define the query to fetch all products
    $query = "SELECT id, name, category, price FROM products ORDER BY id DESC";

    // 2. Execute the query
    $result = mysqli_query($conn, $query);

    // 3. Return the result set
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

// create order 
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