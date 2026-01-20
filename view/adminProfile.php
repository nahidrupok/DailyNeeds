<?php
session_start();

// 1. Protection
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: login.php");
    exit();
}

// 2. Data from session
$userName   = $_SESSION['user_name'];
$userEmail  = $_SESSION['user_email'];
$userRole   = $_SESSION['user_role'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile | DailyNeeds</title>
    <style>
        :root {
            --green: #27ae60;
            --text: #333;
            --border: #eee;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Segoe UI', sans-serif;
            display: flex;
            color: var(--text);
        }

        /* Slim Sidebar */
        .sidebar {
            width: 200px;
            height: 100vh;
            border-right: 1px solid var(--border);
            padding-top: 30px;
            position: fixed;
        }

        .logo {
            padding: 0 25px;
            font-size: 1.4rem;
            font-weight: 800;
            color: var(--green);
            text-decoration: none;
            display: block;
            margin-bottom: 40px;
        }

        .sidebar-menu a {
            display: block;
            padding: 12px 25px;
            text-decoration: none;
            color: #666;
            font-size: 14px;
        }

        .sidebar-menu a.active {
            color: var(--green);
            font-weight: 600;
            background: #f9f9f9;
        }

        /* Main Content */
        .main {
            margin-left: 200px;
            flex: 1;
            padding: 60px;
        }

        .header h1 { 
            font-size: 22px; 
            margin-bottom: 40px; 
        }

        /* Simple Info List */
        .info-item {
            display: flex;
            padding: 15px 0;
            border-bottom: 1px solid var(--border);
            max-width: 500px;
        }

        .label {
            width: 140px;
            font-weight: 700;
            color: #888;
            font-size: 13px;
        }

        .value {
            font-size: 15px;
        }

        .logout-btn {
            margin-top: 40px;
            display: inline-block;
            color: #e74c3c;
            text-decoration: none;
            font-size: 14px;
        }
    </style>
</head>
<body>

    <div class="sidebar">
        <a href="#" class="logo">DailyNeeds</a>
        <div class="sidebar-menu">
            <a href="#" class="active">UserProfile</a>
            <a href="allUsers.php">All Users</a>
            <a href="allOrders.php">All Orders</a>
        </div>
    </div>

    <main class="main">
        <div class="header">
            <h1>Account Details</h1>
        </div>

        <div class="info-item">
            <div class="label">NAME</div>
            <div class="value"><?php echo htmlspecialchars($userName); ?></div>
        </div>

        <div class="info-item">
            <div class="label">EMAIL</div>
            <div class="value"><?php echo htmlspecialchars($userEmail); ?></div>
        </div>

        <div class="info-item">
            <div class="label">ACCOUNT TYPE</div>
            <div class="value"><?php echo ucfirst(htmlspecialchars($userRole)); ?></div>
        </div>

        <a href="../controller/logoutControll.php" class="logout-btn">Logout</a>
    </main>

</body>
</html>