<?php
session_start();
require_once '../model/database.php';
require_once '../model/products.php';

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: login.php");
    exit();
}

$userName  = $_SESSION['user_name'];
$userRole  = $_SESSION['user_role'];

if (isset($_GET['id'])) {
    $existingId = $_GET['id'];
    
    $product = GetProductById($existingId);

    if (!$product) {
        header("Location: allProducts.php?error=not_found");
        exit();
    }

    $existingName = $product['name'];
    $existingCategory = $product['category'];
    $existingPrice = $product['price'];
} else {
    header("Location: allProducts.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product | DailyNeeds</title>
    <style>
        :root {
            --primary-green: #27ae60;
            --primary-hover: #219150;
            --dark-text: #2c3e50;
            --light-bg: #f9f9f9;
            --white: #ffffff;
            --border: #e0e0e0;
            --danger: #e74c3c;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', sans-serif; }
        body { background-color: var(--light-bg); color: var(--dark-text); display: flex; flex-direction: column; min-height: 100vh; }
        
        nav { display: flex; justify-content: space-between; align-items: center; padding: 1rem 8%; background: var(--white); box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        .logo { font-size: 1.8rem; font-weight: 800; color: var(--primary-green); text-decoration: none; }

        .dashboard-container { display: flex; flex: 1; width: 100%; }
        .sidebar { width: 250px; background: var(--white); border-right: 1px solid var(--border); padding: 20px 0; }
        .sidebar-menu { list-style: none; }
        .sidebar-menu li a { display: block; padding: 15px 30px; color: var(--dark-text); text-decoration: none; font-weight: 600; border-left: 4px solid transparent; transition: 0.3s; }
        .sidebar-menu li a:hover, .sidebar-menu li a.active { background: #f0fdf4; color: var(--primary-green); border-left: 4px solid var(--primary-green); }

        .main-content { flex: 1; padding: 40px; display: flex; justify-content: center; }
        .content-card { background: var(--white); padding: 40px; border-radius: 12px; box-shadow: 0 2px 10px rgba(0,0,0,0.05); width: 100%; max-width: 600px; height: fit-content; }
        
        .content-card h2 { margin-bottom: 10px; color: var(--primary-green); }
        .content-card p { margin-bottom: 25px; color: #7f8c8d; font-size: 0.9rem; }

        .form-group { margin-bottom: 20px; }
        .form-group label { display: block; margin-bottom: 8px; font-weight: 600; }
        .form-group input, .form-group select {
            width: 100%;
            padding: 12px;
            border: 1px solid var(--border);
            border-radius: 8px;
            font-size: 1rem;
            outline: none;
        }
        .form-group input:focus { border-color: var(--primary-green); }

        .btn-container { display: flex; gap: 10px; margin-top: 10px; }
        
        .save-btn {
            flex: 2;
            background: var(--primary-green);
            color: white;
            padding: 14px;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s;
        }
        .save-btn:hover { background: var(--primary-hover); }

        .cancel-btn {
            flex: 1;
            background: #ecf0f1;
            color: var(--dark-text);
            text-decoration: none;
            text-align: center;
            padding: 14px;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            transition: 0.3s;
        }
        .cancel-btn:hover { background: #dee2e6; }

        footer { background: #1a1a1a; color: white; text-align: center; padding: 2rem 0; }
    </style>
</head>
<body>

    <nav>
        <a href="../index.php" class="logo">DailyNeeds</a>
        <div class="nav-links">
            <a href="../controller/logoutControll.php" class="logout-btn">Logout</a>
        </div>
    </nav>

    <div class="dashboard-container">
        <aside class="sidebar">
            <ul class="sidebar-menu">
                <li><a href="customerProfile.php">Profile</a></li>
                <li><a href="allUsers.php">All Users</a></li>
                <li><a href="addProduct.php">Add Products</a></li>
                <li><a href="allProducts.php" class="active">All Products</a></li>
            </ul>
        </aside>

        <main class="main-content">
            <div class="content-card">
                <h2>Edit Product</h2>
                <p>Modify the details for Product ID: #<?php echo $existingId; ?></p>
                
                <form action="../controller/updateProductControll.php" method="POST">
                    <input type="hidden" name="product_id" value="<?php echo $existingId; ?>">

                    <div class="form-group">
                        <label for="pname">Product Name</label>
                        <input type="text" id="pname" name="product_name" value="<?php echo htmlspecialchars($existingName); ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="category">Category</label>
                        <select id="category" name="category" required>
                            <option value="Fruits" <?php if($existingCategory == 'Fruits') echo 'selected'; ?>>Fruits</option>
                            <option value="Vegetables" <?php if($existingCategory == 'Vegetables') echo 'selected'; ?>>Vegetables</option>
                            <option value="Dairy" <?php if($existingCategory == 'Dairy') echo 'selected'; ?>>Dairy & Eggs</option>
                            <option value="Bakery" <?php if($existingCategory == 'Bakery') echo 'selected'; ?>>Bakery</option>
                            <option value="Meat" <?php if($existingCategory == 'Meat') echo 'selected'; ?>>Meat & Seafood</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="price">Price ($)</label>
                        <input type="number" id="price" name="price" step="0.01" value="<?php echo $existingPrice; ?>" required>
                    </div>

                    <div class="btn-container">
                        <button type="submit" name="update_product" class="save-btn">Update Changes</button>
                        <a href="allProducts.php" class="cancel-btn">Cancel</a>
                    </div>
                </form>
            </div>
        </main>
    </div>

    <footer>
        <p>&copy; 2026 DailyNeeds Grocery Delivery. Locally Sourced.</p>
    </footer>

</body>
</html>