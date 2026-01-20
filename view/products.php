<?php
session_start();
// 1. Include your database and product model
require_once '../model/database.php';
require_once '../model/products.php'; 

// 2. Fetch all products from the database
$productsResult = GetAllProducts();

// Demo image URL base (using a service like Unsplash)
$demoImgBase = "https://images.unsplash.com/photo-1542838132-92c53300491e?auto=format&fit=crop&q=80&w=200&h=150";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DailyNeeds | All Products</title>
    <style>
        body { margin: 0; font-family: 'Segoe UI', sans-serif; background: #f4f4f4; display: flex; flex-direction: column; min-height: 100vh; }
        nav { background: #fff; padding: 15px 5%; display: flex; justify-content: space-between; align-items: center; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        .logo { font-size: 24px; font-weight: bold; color: #27ae60; text-decoration: none; }
        .nav-links { list-style: none; display: flex; gap: 20px; }
        .nav-links a { text-decoration: none; color: #333; font-weight: 600; }
        .search-box { background: #27ae60; padding: 30px; text-align: center; }
        #productSearch { padding: 12px; width: 80%; max-width: 500px; border-radius: 25px; border: none; font-size: 16px; outline: none; }
        .content { padding: 40px 5%; flex: 1; }
        .product-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(220px, 1fr)); gap: 25px; }
        .card { background: white; padding: 15px; border-radius: 12px; text-align: center; box-shadow: 0 4px 15px rgba(0,0,0,0.05); transition: transform 0.2s; }
        .card:hover { transform: translateY(-5px); }
        .product-img { width: 100%; height: 150px; object-fit: cover; border-radius: 8px; margin-bottom: 15px; background: #eee; }
        .card h3 { font-size: 1.1rem; margin: 10px 0 5px; color: #2c3e50; }
        .category-label { font-size: 0.8rem; color: #7f8c8d; text-transform: uppercase; letter-spacing: 1px; }
        .price { color: #27ae60; font-weight: bold; font-size: 1.2rem; display: block; margin: 10px 0; }
        .btn { background: #27ae60; color: white; border: none; padding: 12px; width: 100%; border-radius: 8px; cursor: pointer; font-weight: 600; transition: 0.3s; }
        .btn:hover { background: #219150; }
        footer { background: #333; color: white; text-align: center; padding: 20px; margin-top: 20px; }
    </style>
</head>
<body>

    <nav>
        <a href="index.php" class="logo">DailyNeeds</a>
        <div class="nav-links">
            <a href="products.php">Products</a>
            <a href="login.php">Login</a>
            <a href="register.php">Register</a>
        </div>
    </nav>

    <div class="search-box">
        <input type="text" id="productSearch" placeholder="Search for groceries..." onkeyup="filterProducts()">
    </div>

    <div class="content">
        <div class="product-grid" id="productGrid">
            
            <?php 
            // 3. Loop through database results
            if ($productsResult && mysqli_num_rows($productsResult) > 0):
                while ($product = mysqli_fetch_assoc($productsResult)): 
                    // Create search keywords for the data-name attribute
                    $searchKeywords = strtolower($product['name'] . " " . $product['category']);
            ?>
                <div class="card" data-name="<?php echo $searchKeywords; ?>">
                    <img src="<?php echo $demoImgBase; ?>" alt="Product" class="product-img">
                    
                    <span class="category-label"><?php echo htmlspecialchars($product['category']); ?></span>
                    <h3><?php echo htmlspecialchars($product['name']); ?></h3>
                    <span class="price">$<?php echo number_format($product['price'], 2); ?></span>
                    
                    <button class="btn">Add to Cart</button>
                </div>
            <?php 
                endwhile; 
            else:
                echo "<p style='grid-column: 1/-1; text-align: center;'>No products available at the moment.</p>";
            endif; 
            ?>
            
        </div>
    </div>

    <footer>
        &copy; 2026 DailyNeeds Store - Freshness Delivered.
    </footer>

    <script>
        function filterProducts() {
            let input = document.getElementById('productSearch').value.toLowerCase();
            let cards = document.getElementsByClassName('card');

            for (let i = 0; i < cards.length; i++) {
                let name = cards[i].getAttribute('data-name');
                if (name.includes(input)) {
                    cards[i].style.display = "";
                } else {
                    cards[i].style.display = "none";
                }
            }
        }
    </script>

</body>
</html>