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

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Roboto, sans-serif;
        }

        body {
            background-color: var(--light-bg);
            color: var(--dark-text);
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 8%;
            background: var(--white);
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            z-index: 1000;
        }

        .logo {
            font-size: 1.8rem;
            font-weight: 800;
            color: var(--primary-green);
            text-decoration: none;
        }

        .dashboard-container {
            display: flex;
            flex: 1;
            width: 100%;
        }

        .sidebar {
            width: 250px;
            background: var(--white);
            border-right: 1px solid var(--border);
            padding: 20px 0;
        }

        .sidebar-menu {
            list-style: none;
        }

        .sidebar-menu li a {
            display: block;
            padding: 15px 30px;
            color: var(--dark-text);
            text-decoration: none;
            font-weight: 600;
            transition: 0.3s;
            border-left: 4px solid transparent;
        }

        .sidebar-menu li a:hover, .sidebar-menu li a.active {
            background: #f0fdf4;
            color: var(--primary-green);
            border-left: 4px solid var(--primary-green);
        }

        .main-content {
            flex: 1;
            padding: 40px;
        }

        .content-card {
            background: var(--white);
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }

        .content-card h2 {
            margin-bottom: 25px;
            padding-bottom: 10px;
            border-bottom: 2px solid var(--light-bg);
        }

        .table-container {
            width: 100%;
            overflow-x: auto; 
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
        }

        thead {
            background-color: var(--light-bg);
        }

        th, td {
            padding: 15px;
            border-bottom: 1px solid var(--border);
        }

        th {
            font-weight: 700;
            text-transform: uppercase;
            font-size: 0.85rem;
            color: #7f8c8d;
        }

        tr:hover {
            background-color: #fcfcfc;
        }

        .status {
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: bold;
        }

        .status.delivered { background: #eafff0; color: #27ae60; }
        .status.pending { background: #fff9e6; color: #f1c40f; }
        .status.shipped { background: #e6f7ff; color: #3498db; }

        footer {
            background: #1a1a1a;
            color: white;
            text-align: center;
            padding: 2rem 0;
        }
    </style>
</head>
<body>

    <nav>
        <a href="../index.php" class="logo">DailyNeeds</a>
        <div class="nav-links">
            <a href="login.php" style="text-decoration: none; color: var(--dark-text); font-weight: 500;">Logout</a>
        </div>
    </nav>

    <div class="dashboard-container">
        
        <aside class="sidebar">
            <ul class="sidebar-menu">
                <li><a href="dashboard.html">Profile</a></li>
                <li><a href="orders.html" class="active">Orders</a></li>
                <li><a href="#">Cart</a></li>
            </ul>
        </aside>

        <main class="main-content">
            <div class="content-card">
                <h2>Recent Orders</h2>
                
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Date</th>
                                <th>Items</th>
                                <th>Total</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>#DN-9012</td>
                                <td>Oct 12, 2025</td>
                                <td>Fresh Oranges, Milk</td>
                                <td>$12.50</td>
                                <td><span class="status delivered">Delivered</span></td>
                            </tr>
                            <tr>
                                <td>#DN-8845</td>
                                <td>Oct 15, 2025</td>
                                <td>Whole Grain Bread</td>
                                <td>$3.60</td>
                                <td><span class="status shipped">Shipped</span></td>
                            </tr>
                            <tr>
                                <td>#DN-8721</td>
                                <td>Oct 18, 2025</td>
                                <td>Organic Spinach, Eggs</td>
                                <td>$8.20</td>
                                <td><span class="status pending">Pending</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>

    </div>

    <footer>
        <p>&copy; 2026 DailyNeeds Grocery Delivery. Locally Sourced.</p>
    </footer>

</body>
</html>