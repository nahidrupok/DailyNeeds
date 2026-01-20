<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Cart | DailyNeeds</title>
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

        th, td {
            padding: 15px;
            border-bottom: 1px solid var(--border);
            vertical-align: middle;
        }

        th {
            background-color: var(--light-bg);
            font-weight: 700;
            font-size: 0.8rem;
            color: #7f8c8d;
            text-transform: uppercase;
        }

        .pay-btn {
            background-color: var(--primary-green);
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s;
        }

        .pay-btn:hover {
            background-color: #219150;
        }

        
        footer {
            background: #1a1a1a;
            color: white;
            text-align: center;
            padding: 2rem 0;
            margin-top: auto;
        }
    </style>
</head>
<body>

    <nav>
        <a href="../index.php" class="logo">DailyNeeds</a>
        <div class="nav-links">
            <a href="login.html" style="text-decoration: none; color: var(--dark-text); font-weight: 500;">Logout</a>
        </div>
    </nav>

    <div class="dashboard-container">
        
        <aside class="sidebar">
            <ul class="sidebar-menu">
                <li><a href="dashboard.html">Profile</a></li>
                <li><a href="orders.html">Orders</a></li>
                <li><a href="cart.html" class="active">Cart</a></li>
            </ul>
        </aside>

        <main class="main-content">
            <div class="content-card">
                <h2>Shopping Cart</h2>
                
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>Pro_ID</th>
                                <th>Pro_Name</th>
                                <th>Pro_Price</th>
                                <th>Quantity</th>
                                <th>Total_Amount</th>
                                <th>Order_Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>#P-101</td>
                                <td>Organic Oranges</td>
                                <td>$4.99</td>
                                <td>2 kg</td>
                                <td><strong>$9.98</strong></td>
                                <td>Unpaid</td>
                                <td><button class="pay-btn">Pay Now</button></td>
                            </tr>
                            <tr>
                                <td>#P-205</td>
                                <td>Fresh Milk</td>
                                <td>$3.20</td>
                                <td>1 L</td>
                                <td><strong>$3.20</strong></td>
                                <td>Unpaid</td>
                                <td><button class="pay-btn">Pay Now</button></td>
                            </tr>
                            <tr>
                                <td>#P-302</td>
                                <td>Grain Bread</td>
                                <td>$1.80</td>
                                <td>2 Packs</td>
                                <td><strong>$3.60</strong></td>
                                <td>Unpaid</td>
                                <td><button class="pay-btn">Pay Now</button></td>
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