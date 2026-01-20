<?php
session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: login.php");
    exit();
}

$userName  = $_SESSION['user_name'];
$userRole  = $_SESSION['user_role'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product | DailyNeeds</title>
    <style>
        /* --- KEEPING YOUR EXISTING STYLES --- */
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
        
        nav { display: flex; justify-content: space-between; align-items: center; padding: 1rem 8%; background: var(--white); box-shadow: 0 2px 10px rgba(0,0,0,0.1); z-index: 1000; }
        .logo { font-size: 1.8rem; font-weight: 800; color: var(--primary-green); text-decoration: none; }

        .dashboard-container { display: flex; flex: 1; width: 100%; }
        .sidebar { width: 250px; background: var(--white); border-right: 1px solid var(--border); padding: 20px 0; }
        .sidebar-menu { list-style: none; }
        .sidebar-menu li a { display: block; padding: 15px 30px; color: var(--dark-text); text-decoration: none; font-weight: 600; transition: 0.3s; border-left: 4px solid transparent; }
        .sidebar-menu li a:hover, .sidebar-menu li a.active { background: #f0fdf4; color: var(--primary-green); border-left: 4px solid var(--primary-green); }

        .main-content { flex: 1; padding: 40px; display: flex; justify-content: center; }
        .content-card { background: var(--white); padding: 40px; border-radius: 12px; box-shadow: 0 2px 10px rgba(0,0,0,0.05); width: 100%; max-width: 600px; height: fit-content; }
        
        .content-card h2 { margin-bottom: 25px; padding-bottom: 10px; border-bottom: 2px solid var(--light-bg); color: var(--primary-green); }

        /* --- FORM STYLES --- */
        .form-group { margin-bottom: 20px; }
        .form-group label { display: block; margin-bottom: 8px; font-weight: 600; font-size: 0.95rem; }
        .form-group input, .form-group select {
            width: 100%;
            padding: 12px;
            border: 1px solid var(--border);
            border-radius: 8px;
            font-size: 1rem;
            outline: none;
            transition: 0.3s;
        }
        .form-group input:focus, .form-group select:focus { border-color: var(--primary-green); box-shadow: 0 0 0 3px rgba(39, 174, 96, 0.1); }

        .submit-btn {
            width: 100%;
            background: var(--primary-green);
            color: white;
            padding: 14px;
            border: none;
            border-radius: 8px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s;
            margin-top: 10px;
        }
        .submit-btn:hover { background: var(--primary-hover); transform: translateY(-1px); }

        .logout-btn { text-decoration: none; color: var(--danger); font-weight: 600; padding: 8px 15px; border: 1px solid var(--danger); border-radius: 5px; }
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
                <li><a href="addProduct.php" class="active">Add Products</a></li>
                <li><a href="allProducts.php">All Products</a></li>
            </ul>
        </aside>

        <main class="main-content">
            <div class="content-card">
                <h2>Add New Product</h2>
                <form action="../controller/productControll.php" method="POST">
                    <div class="form-group">
                        <label for="pname">Product Name</label>
                        <input type="text" id="pname" name="product_name" placeholder="Enter product name" required>
                    </div>

                    <div class="form-group">
                        <label for="category">Category</label>
                        <select id="category" name="category" required>
                            <option value="" disabled selected>Select a category</option>
                            <option value="Fruits">Fruits</option>
                            <option value="Vegetables">Vegetables</option>
                            <option value="Dairy">Dairy & Eggs</option>
                            <option value="Bakery">Bakery</option>
                            <option value="Meat">Meat & Seafood</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="price">Price ($)</label>
                        <input type="number" id="price" name="price" step="0.01" min="0" placeholder="0.00" required>
                    </div>

                    <button type="submit" name="add_product" class="submit-btn">Save Product</button>
                </form>
            </div>
        </main>

    </div>

    <footer>
        <p>&copy; 2026 DailyNeeds Grocery Delivery. Locally Sourced.</p>
    </footer>

</body>
</html>