<?php
require_once '../model/database.php';
require_once '../model/products.php'; 

$searchTerm = isset($_GET['q']) ? $_GET['q'] : '';
$demoImgBase = "https://images.unsplash.com/photo-1542838132-92c53300491e?auto=format&fit=crop&q=80&w=200&h=150";

$searchPattern = '%' . $searchTerm . '%';
$query = "SELECT * FROM products WHERE name LIKE ? OR category LIKE ?";
$stmt = mysqli_prepare($conn, $query);

if (!$stmt) {
    echo "<p style='grid-column: 1/-1; text-align: center;'>Database error: " . htmlspecialchars(mysqli_error($conn)) . "</p>";
    exit();
}

mysqli_stmt_bind_param($stmt, "ss", $searchPattern, $searchPattern);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($result && mysqli_num_rows($result) > 0) {
    while ($product = mysqli_fetch_assoc($result)) {
        ?>
        <div class="card">
            <img src="<?php echo $demoImgBase; ?>" alt="Product" class="product-img">
            <span class="category-label"><?php echo htmlspecialchars($product['category']); ?></span>
            <h3><?php echo htmlspecialchars($product['name']); ?></h3>
            <span class="price">$<?php echo number_format($product['price'], 2); ?></span>
            
            <form method="POST" action="../controller/orderController.php">
                <input type="hidden" name="pro_id" value="<?php echo $product['id']; ?>">
                <input type="hidden" name="pro_name" value="<?php echo $product['name']; ?>">
                <input type="hidden" name="pro_price" value="<?php echo $product['price']; ?>">
                <button type="submit" name="add_to_cart" class="btn">Add to Cart</button>
            </form>
        </div>
        <?php
    }
} else {
    echo "<p style='grid-column: 1/-1; text-align: center;'>No products found.</p>";
}

mysqli_stmt_close($stmt);
?>