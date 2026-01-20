<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DailyNeeds | Fresh Groceries Delivered</title>
    <style>
        /* Keep all your existing CSS here */
        :root {
            --primary-green: #27ae60;
            --dark-text: #2c3e50;
            --light-bg: #f9f9f9;
            --white: #ffffff;
        }
        /* ... including the rest of your styles ... */
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', Roboto, sans-serif; }
        body { background-color: var(--light-bg); color: var(--dark-text); }
        nav { display: flex; justify-content: space-between; align-items: center; padding: 1rem 8%; background: var(--white); box-shadow: 0 2px 10px rgba(0,0,0,0.1); position: sticky; top: 0; z-index: 1000; }
        .logo { font-size: 1.8rem; font-weight: 800; color: var(--primary-green); text-decoration: none; letter-spacing: -1px; }
        .nav-links { list-style: none; display: flex; align-items: center; }
        .nav-links li { margin-left: 25px; }
        .nav-links a { text-decoration: none; color: var(--dark-text); font-weight: 500; transition: 0.3s; }
        .nav-links a:hover { color: var(--primary-green); }
        .hero { height: 60vh; background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('https://images.unsplash.com/photo-1542838132-92c53300491e?auto=format&fit=crop&w=1350&q=80'); background-size: cover; background-position: center; display: flex; flex-direction: column; justify-content: center; align-items: center; text-align: center; color: white; }
        .hero h1 { font-size: 3.5rem; text-shadow: 2px 2px 4px rgba(0,0,0,0.5); }
        .hero p { font-size: 1.2rem; margin: 15px 0 25px; }
        .btn-main { padding: 15px 35px; background: var(--primary-green); color: white; border: none; border-radius: 30px; font-size: 1rem; font-weight: bold; text-decoration: none; transition: 0.3s; }
        .btn-main:hover { background: #219150; transform: translateY(-2px); }
        .section-title { text-align: center; margin: 50px 0 30px; font-size: 2rem; }
        .product-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 30px; padding: 0 8% 50px; }
        .product-card { background: var(--white); padding: 15px; border-radius: 12px; text-align: center; box-shadow: 0 4px 6px rgba(0,0,0,0.05); transition: 0.3s; }
        .product-card img { width: 100%; height: 200px; object-fit: cover; border-radius: 8px; margin-bottom: 15px; }
        .price { color: var(--primary-green); font-weight: bold; font-size: 1.1rem; display: block; margin-bottom: 15px; }
        .add-btn { width: 100%; padding: 10px; background: #f1f1f1; border: none; border-radius: 5px; cursor: pointer; font-weight: 600; }
        footer { background: #1a1a1a; color: white; text-align: center; padding: 3rem 0; }
        .footer-links a { color: white; margin: 0 10px; text-decoration: none; }
        
        /* New User Styling */
        .user-name {
            font-weight: bold;
            color: var(--primary-green);
        }
    </style>
</head>
<body>

    <nav>
        <a href="index.php" class="logo">DailyNeeds</a>
        <ul class="nav-links">
            <li><a href="./view/products.php">Products</a></li>

            <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true): ?>
                <li>
                    <a href="./view/customerProfile.php">
                        Welcome, <span class="user-name"><?php echo htmlspecialchars($_SESSION['user_name']); ?></span>
                    </a>
                </li>
                <li>
                    <a href="./controller/logoutControll.php" style="color: #e74c3c;">Logout</a>
                </li>
            <?php else: ?>
                <li><a href="./view/login.php">Login</a></li>
                <li>
                    <a href="./view/registration.php" style="background: var(--primary-green); color: white; padding: 8px 18px; border-radius: 5px;">
                        Register
                    </a>
                </li>
            <?php endif; ?>

        </ul>
    </nav>

    <header class="hero">
        <h1>Freshness at your doorstep</h1>
        <p>Get organic groceries delivered in 30 minutes.</p>
        <a href="./view/products.php" class="btn-main">Shop Groceries Now</a>
    </header>

    <main>
        <h2 class="section-title">Featured Products</h2>
        <div class="product-grid">
            <div class="product-card">
                <img src="https://images.unsplash.com/photo-1610832958506-aa56368176cf?auto=format&fit=crop&w=400&q=80" alt="Fresh Oranges">
                <h3>Organic Oranges</h3>
                
            </div>  

            <div class="product-card">
                <img src="https://images.unsplash.com/photo-1550989460-0adf9ea622e2?auto=format&fit=crop&w=400&q=80" alt="Green Vegetables">
                <h3>Fresh Spinach</h3>
                
            </div>

            <div class="product-card">
                <img src="https://images.unsplash.com/photo-1523472721958-978152f4d69b?auto=format&fit=crop&w=400&q=80" alt="Dairy">
                <h3>Farm Fresh Milk</h3>
                
            </div>

            <div class="product-card">
                <img src="https://images.unsplash.com/photo-1586201375761-83865001e31c?auto=format&fit=crop&w=400&q=80" alt="Grain">
                <h3>Whole Grain Bread</h3>
                
            </div>

            <div class="product-card">
                <img src="https://images.unsplash.com/photo-1610832958506-aa56368176cf?auto=format&fit=crop&w=400&q=80" alt="Fresh Oranges">
                <h3>Organic Oranges</h3>
                
            </div>

            <div class="product-card">
                <img src="https://images.unsplash.com/photo-1550989460-0adf9ea622e2?auto=format&fit=crop&w=400&q=80" alt="Green Vegetables">
                <h3>Fresh Spinach</h3>
                
            </div>

            <div class="product-card">
                <img src="https://images.unsplash.com/photo-1523472721958-978152f4d69b?auto=format&fit=crop&w=400&q=80" alt="Dairy">
                <h3>Farm Fresh Milk</h3>
                
            </div>

            <div class="product-card">
                <img src="https://images.unsplash.com/photo-1610832958506-aa56368176cf?auto=format&fit=crop&w=400&q=80" alt="Fresh Oranges">
                <h3>Organic Oranges</h3>
                
            </div>

            <div class="product-card">
                <img src="https://images.unsplash.com/photo-1550989460-0adf9ea622e2?auto=format&fit=crop&w=400&q=80" alt="Green Vegetables">
                <h3>Fresh Spinach</h3>
                
            </div>

            <div class="product-card">
                <img src="https://images.unsplash.com/photo-1523472721958-978152f4d69b?auto=format&fit=crop&w=400&q=80" alt="Dairy">
                <h3>Farm Fresh Milk</h3>
                
            </div>

            <div class="product-card">
                <img src="https://images.unsplash.com/photo-1586201375761-83865001e31c?auto=format&fit=crop&w=400&q=80" alt="Grain">
                <h3>Whole Grain Bread</h3>
               
            </div>
        </div>
    </main>

    <footer>
        <div class="footer-links">
            <a href="#">About</a>
            <a href="#">Delivery Info</a>
            <a href="#">Support</a>
        </div>
        <p>&copy; 2026 DailyNeeds Grocery Delivery. Locally Sourced.</p>
    </footer>

</body>
</html>