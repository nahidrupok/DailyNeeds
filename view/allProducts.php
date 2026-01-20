<?php
session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: login.php");
    exit();
}

$userName  = $_SESSION['user_name'];
$userRole  = $_SESSION['user_role'];

// Example data - In a real app, fetch this from your 'products' table
$products = [
    ['id' => 1, 'name' => 'Organic Bananas', 'category' => 'Fruits', 'price' => 2.99],
    ['id' => 2, 'name' => 'Fresh Milk', 'category' => 'Dairy', 'price' => 4.50],
    ['id' => 3, 'name' => 'Whole Wheat Bread', 'category' => 'Bakery', 'price' => 3.25],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Products | DailyNeeds</title>
    <style>
        /* --- KEEPING CONSISTENT STYLES --- */
        :root {
            --primary-green: #27ae60;
            --dark-text: #2c3e50;
            --light-bg: #f9f9f9;
            --white: #ffffff;
            --border: #e0e0e0;
            --danger: #e74c3c;
            --info: #3498db;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', sans-serif; }
        body { background-color: var(--light-bg); color: var(--dark-text); display: flex; flex-direction: column; min-height: 100vh; }
        
        nav { display: flex; justify-content: space-between; align-items: center; padding: 1rem 8%; background: var(--white); box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        .logo { font-size: 1.8rem; font-weight: 800; color: var(--primary-green); text-decoration: none; }

        .dashboard-container { display: flex; flex: 1; width: 100%; }
        .sidebar { width: 250px; background: var(--white); border-right: 1px solid var(--border); padding: 20px 0; }
        .sidebar-menu { list-style: none; }
        .sidebar-menu li a { display: block; padding: 15px 30px; color: var(--dark-text); text-decoration: none; font-weight: 600; border-left: 4px solid transparent; }
        .sidebar-menu li a:hover, .sidebar-menu li a.active { background: #f0fdf4; color: var(--primary-green); border-left: 4px solid var(--primary-green); }

        .main-content { flex: 1; padding: 40px; }
        .content-card { background: var(--white); padding: 30px; border-radius: 12px; box-shadow: 0 2px 10px rgba(0,0,0,0.05); }
        
        .content-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; padding-bottom: 10px; border-bottom: 2px solid var(--light-bg); }

        /* --- TABLE STYLES --- */
        .product-table { width: 100%; border-collapse: collapse; }
        .product-table th, .product-table td { text-align: left; padding: 15px; border-bottom: 1px solid var(--border); }
        .product-table th { background-color: #f8f9fa; font-weight: 700; color: var(--dark-text); }
        
        .price-tag { font-weight: 700; color: var(--primary-green); }
        .category-badge { background: #e8f5e9; color: var(--primary-green); padding: 4px 10px; border-radius: 20px; font-size: 0.85rem; }

        /* --- ACTION BUTTONS --- */
        .btn-action { text-decoration: none; padding: 5px 12px; border-radius: 4px; font-size: 0.85rem; font-weight: 600; margin-right: 5px; transition: 0.2s; }
        .btn-edit { border: 1px solid var(--info); color: var(--info); }
        .btn-edit:hover { background: var(--info); color: white; }
        .btn-delete { border: 1px solid var(--danger); color: var(--danger); }
        .btn-delete:hover { background: var(--danger); color: white; }

        .logout-btn { text-decoration: none; color: var(--danger); font-weight: 600; padding: 8px 15px; border: 1px solid var(--danger); border-radius: 5px; }
        footer { background: #1a1a1a; color: white; text-align: center; padding: 2rem 0; margin-top: auto; }
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
                <div class="content-header">
                    <h2>Inventory List</h2>
                    <a href="addProduct.php" style="text-decoration: none; color: var(--primary-green); font-weight: 600;">+ Add New</a>
                </div>

                <table class="product-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Product Name</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($products as $product): ?>
                        <tr>
                            <td>#<?php echo $product['id']; ?></td>
                            <td><strong><?php echo htmlspecialchars($product['name']); ?></strong></td>
                            <td><span class="category-badge"><?php echo htmlspecialchars($product['category']); ?></span></td>
                            <td class="price-tag">$<?php echo number_format($product['price'], 2); ?></td>
                            <td>
                                <a href="editProduct.php?id=<?php echo $product['id']; ?>" class="btn-action btn-edit">Edit</a>
                                <a href="#" onclick="confirmDelete(<?php echo $product['id']; ?>)" class="btn-action btn-delete">Delete</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </main>

    </div>

    <footer>
        <p>&copy; 2026 DailyNeeds Grocery Delivery. Locally Sourced.</p>
    </footer>

    <script>
        function confirmDelete(id) {
            if(confirm("Are you sure you want to remove this product?")) {
                window.location.href = "../controller/deleteProduct.php?id=" + id;
            }
        }
    </script>

</body>
</html>