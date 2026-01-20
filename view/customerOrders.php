<?php
session_start();

// 1. Check Login
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: login.php");
    exit();
}

// 2. Database Connection and Model
require_once '../model/database.php';

$current_cus_id = $_SESSION['user_id'];
$orderQuery = "SELECT * FROM orders WHERE cus_id = '$current_cus_id' ORDER BY id DESC";
$orderResult = mysqli_query($conn, $orderQuery);

$userName  = $_SESSION['user_name'];
$userEmail = $_SESSION['user_email'];
$userRole  = $_SESSION['user_role'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Orders | DailyNeeds</title>
    <style>
        :root {
            --primary-green: #27ae60;
            --dark-text: #2c3e50;
            --light-bg: #f9f9f9;
            --white: #ffffff;
            --border: #e0e0e0;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', Roboto, sans-serif; }

        body { background-color: var(--light-bg); color: var(--dark-text); display: flex; flex-direction: column; min-height: 100vh; }

        nav { display: flex; justify-content: space-between; align-items: center; padding: 1rem 8%; background: var(--white); box-shadow: 0 2px 10px rgba(0,0,0,0.1); z-index: 1000; }
        .logo { font-size: 1.8rem; font-weight: 800; color: var(--primary-green); text-decoration: none; }

        .dashboard-container { display: flex; flex: 1; width: 100%; }

        .sidebar { width: 250px; background: var(--white); border-right: 1px solid var(--border); padding: 20px 0; }
        .sidebar-menu { list-style: none; }
        .sidebar-menu li a { display: block; padding: 15px 30px; color: var(--dark-text); text-decoration: none; font-weight: 600; transition: 0.3s; border-left: 4px solid transparent; }
        .sidebar-menu li a:hover, .sidebar-menu li a.active { background: #f0fdf4; color: var(--primary-green); border-left: 4px solid var(--primary-green); }

        .main-content { flex: 1; padding: 40px; }
        .content-card { background: var(--white); padding: 30px; border-radius: 12px; box-shadow: 0 2px 10px rgba(0,0,0,0.05); }
        .content-card h2 { margin-bottom: 20px; padding-bottom: 10px; border-bottom: 2px solid var(--light-bg); }

        /* --- TABLE STYLING --- */
        .order-table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        .order-table th, .order-table td { text-align: left; padding: 12px; border-bottom: 1px solid var(--border); }
        .order-table th { background-color: #f8f9fa; color: var(--dark-text); font-weight: 600; }
        
        .status-badge { padding: 4px 8px; border-radius: 4px; font-size: 0.85rem; font-weight: bold; text-transform: uppercase; }
        .status-pending { background: #fff3cd; color: #856404; }
        .status-unpaid { background: #f8d7da; color: #721c24; }
        .status-paid { background: #d4edda; color: #155724; }

        footer { background: #1a1a1a; color: white; text-align: center; padding: 2rem 0; }
        .logout-btn { text-decoration: none; color: #e74c3c; font-weight: 600; padding: 8px 15px; border: 1px solid #e74c3c; border-radius: 5px; transition: 0.3s; }
        .logout-btn:hover { background: #e74c3c; color: white; }
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
                <li><a href="#">Profile</a></li>
                <li><a href="#" class="active">My Orders</a></li>
                <li><a href="../view/products.php">Shop More</a></li>
            </ul>
        </aside>

        <main class="main-content">
            <div class="content-card">
                <h2>Your Order History</h2>
                
                <table class="order-table">
                    <thead>
                        <tr>
                            <th>Pro ID</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Order Status</th>
                            <th>Payment</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($orderResult && mysqli_num_rows($orderResult) > 0): ?>
                            <?php while ($order = mysqli_fetch_assoc($orderResult)): ?>
                                <tr>
                                    <td>#<?php echo htmlspecialchars($order['pro_id']); ?></td>
                                    <td><strong><?php echo htmlspecialchars($order['pro_name']); ?></strong></td>
                                    <td>$<?php echo number_format($order['pro_price'], 2); ?></td>
                                    <td><?php echo $order['quantity']; ?></td>
                                    <td>$<?php echo number_format($order['total_amount'], 2); ?></td>
                                    <td>
                                        <span class="status-badge status-pending">
                                            <?php echo htmlspecialchars($order['order_status']); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <span class="status-badge <?php echo ($order['payment_status'] == 'unPaid') ? 'status-unpaid' : 'status-paid'; ?>">
                                            <?php echo htmlspecialchars($order['payment_status']); ?>
                                        </span>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="7" style="text-align: center; padding: 20px;">You haven't placed any orders yet.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </main>

    </div>

    <footer>
        <p>&copy; 2026 DailyNeeds Grocery Delivery. Locally Sourced.</p>
    </footer>

</body>
</html>