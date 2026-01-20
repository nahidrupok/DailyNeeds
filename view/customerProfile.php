<?php
session_start();

// 1. Protection: If the user is not logged in, kick them back to the login page
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: login.php");
    exit();
}

// 2. Get data from session
$userName  = $_SESSION['user_name'];
$userEmail = $_SESSION['user_email'];
$userRole  = $_SESSION['user_role'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | DailyNeeds</title>
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

        /* --- HEADER --- */
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

        /* --- DASHBOARD LAYOUT --- */
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

        .sidebar-menu { list-style: none; }

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

        .main-content { flex: 1; padding: 40px; }

        .content-card {
            background: var(--white);
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }

        .content-card h2 {
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid var(--light-bg);
        }

        .content-card p { margin-bottom: 10px; font-size: 1.1rem; }

        footer {
            background: #1a1a1a;
            color: white;
            text-align: center;
            padding: 2rem 0;
        }

        .logout-btn {
            text-decoration: none;
            color: #e74c3c;
            font-weight: 600;
            padding: 8px 15px;
            border: 1px solid #e74c3c;
            border-radius: 5px;
            transition: 0.3s;
        }

        .logout-btn:hover {
            background: #e74c3c;
            color: white;
        }
    </style>
</head>
<body>

    <nav>
        <a href="customerProfile.php" class="logo">DailyNeeds</a>
        <div class="nav-links">
            <a href="../controller/logoutControll.php" class="logout-btn">Logout</a>
        </div>
    </nav>

    <div class="dashboard-container">
        
        <aside class="sidebar">
            <ul class="sidebar-menu">
                <li><a href="#" class="active">Profile</a></li>
                <li><a href="#">Orders</a></li>
                <li><a href="#">Cart</a></li>
            </ul>
        </aside>

        <main class="main-content">
            <div class="content-card">
                <h2>Welcome, <?php echo htmlspecialchars($userName); ?>!</h2>
                <p><strong>Name:</strong> <?php echo htmlspecialchars($userName); ?></p>
                <p><strong>Email:</strong> <?php echo htmlspecialchars($userEmail); ?></p>
                <p><strong>Account Type:</strong> <?php echo ucfirst(htmlspecialchars($userRole)); ?></p>
            </div>
        </main>

    </div>

    <footer>
        <p>&copy; 2026 DailyNeeds Grocery Delivery. Locally Sourced.</p>
    </footer>

</body>
</html>