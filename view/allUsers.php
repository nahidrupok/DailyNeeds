<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Users | DailyNeeds Admin</title>
    <style>
        :root {
            --primary-green: #27ae60;
            --dark-text: #2c3e50;
            --light-bg: #f9f9f9;
            --white: #ffffff;
            --border: #e0e0e0;
            --danger: #e74c3c;
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

        /* LEFT SIDEBAR */
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

        /* MAIN CONTENT AREA */
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
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        /* --- USER TABLE STYLING --- */
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

        .user-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .user-avatar {
            width: 35px;
            height: 35px;
            background: #eee;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            color: #777;
        }

        .status-badge {
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .status-active { background: #e6f7ed; color: #27ae60; }
        .status-pending { background: #fff4e6; color: #f39c12; }

        .action-btn {
            background: transparent;
            border: 1px solid var(--border);
            padding: 5px 10px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 0.8rem;
            transition: 0.2s;
        }

        .action-btn:hover {
            background: var(--light-bg);
            border-color: #ccc;
        }

        .delete-text {
            color: var(--danger);
            margin-left: 10px;
            cursor: pointer;
            font-size: 0.8rem;
            font-weight: 600;
        }

        /* --- FOOTER --- */
        footer {
            background: #1a1a1a;
            color: white;
            text-align: center;
            padding: 1.5rem 0;
            margin-top: auto;
        }
    </style>
</head>
<body>

    <nav>
        <a href="admin_dashboard.html" class="logo">DailyNeeds Admin</a>
        <div class="nav-links">
            <a href="login.html" style="text-decoration: none; color: var(--dark-text); font-weight: 500;">Logout</a>
        </div>
    </nav>

    <div class="dashboard-container">
        
        <aside class="sidebar">
            <ul class="sidebar-menu">
                <li><a href="user_profile.html">Profile</a></li>
                <li><a href="all_users.html" class="active">All Users</a></li>
                <li><a href="all_orders.html">All Orders</a></li>
            </ul>
        </aside>

        <main class="main-content">
            <div class="content-card">
                <h2> Registered Users <span>Total: 3</span></h2>
                
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>User ID</th>
                                <th>Name & Email</th>
                                <th>Phone</th>
                                <th>Join Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>#U-501</td>
                                <td>
                                    <div class="user-info">
                                        <div class="user-avatar">RH</div>
                                        <div>
                                            <strong>Rakibul Hasan</strong><br>
                                            <small style="color: #888;">rakib@email.com</small>
                                        </div>
                                    </div>
                                </td>
                                <td>01712-345678</td>
                                <td>12 Jan 2026</td>
                                <td><span class="status-badge status-active">Active</span></td>
                                <td>
                                    <button class="action-btn">Edit</button>
                                    <span class="delete-text">Remove</span>
                                </td>
                            </tr>
                            <tr>
                                <td>#U-502</td>
                                <td>
                                    <div class="user-info">
                                        <div class="user-avatar">SN</div>
                                        <div>
                                            <strong>Sadiya Nasrin</strong><br>
                                            <small style="color: #888;">sadiya@email.com</small>
                                        </div>
                                    </div>
                                </td>
                                <td>01911-987654</td>
                                <td>15 Jan 2026</td>
                                <td><span class="status-badge status-active">Active</span></td>
                                <td>
                                    <button class="action-btn">Edit</button>
                                    <span class="delete-text">Remove</span>
                                </td>
                            </tr>
                            <tr>
                                <td>#U-503</td>
                                <td>
                                    <div class="user-info">
                                        <div class="user-avatar">TA</div>
                                        <div>
                                            <strong>Tanvir Ahmed</strong><br>
                                            <small style="color: #888;">tanvir@email.com</small>
                                        </div>
                                    </div>
                                </td>
                                <td>01552-112233</td>
                                <td>18 Jan 2026</td>
                                <td><span class="status-badge status-pending">Pending</span></td>
                                <td>
                                    <button class="action-btn">Edit</button>
                                    <span class="delete-text">Remove</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>

    </div>

    <footer>
        <p>&copy; 2026 DailyNeeds Admin Panel. Control Center.</p>
    </footer>

</body>
</html>