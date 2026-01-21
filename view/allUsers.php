<?php
session_start();
require_once '../model/users.php';

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: login.php");
    exit();
}

$userName  = $_SESSION['user_name'];
$userRole  = $_SESSION['user_role'];

$usersResult = GetAllUsers(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Users | DailyNeeds</title>
    <style>
        :root {
            --primary-green: #27ae60;
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
        .sidebar-menu li a { display: block; padding: 15px 30px; color: var(--dark-text); text-decoration: none; font-weight: 600; border-left: 4px solid transparent; }
        .sidebar-menu li a:hover, .sidebar-menu li a.active { background: #f0fdf4; color: var(--primary-green); border-left: 4px solid var(--primary-green); }
        .main-content { flex: 1; padding: 40px; }
        .content-card { background: var(--white); padding: 30px; border-radius: 12px; box-shadow: 0 2px 10px rgba(0,0,0,0.05); }
        .user-table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        .user-table th, .user-table td { text-align: left; padding: 15px; border-bottom: 1px solid var(--border); }
        .user-table th { background-color: #f8f9fa; font-weight: 700; }
        .status-select { padding: 6px 10px; border-radius: 4px; border: 1px solid var(--border); font-size: 0.9rem; outline: none; cursor: pointer; }
        .badge { padding: 4px 8px; border-radius: 4px; font-size: 0.8rem; font-weight: bold; }
        .active-badge { background: #d4edda; color: #155724; }
        .locked-badge { background: #f8d7da; color: #721c24; }
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
                <li><a href="./adminProfile.php">Profile</a></li>
                <li><a href="./allUsers.php" class="active">All Users</a></li>
                <li><a href="./addProduct.php">Add Products</a></li>
                <li><a href="./allProducts.php">All Products</a></li>
            </ul>
        </aside>

        <main class="main-content">
            <div class="content-card">
                <h2>User Management</h2>
                <table class="user-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        if ($usersResult && mysqli_num_rows($usersResult) > 0):
                            while ($user = mysqli_fetch_assoc($usersResult)): 
                        ?>
                        <tr>
                            <td><?php echo $user['id']; ?></td>
                            <td><?php echo htmlspecialchars($user['name']); ?></td>
                            <td><?php echo htmlspecialchars($user['email']); ?></td>
                            <td><?php echo ucfirst(htmlspecialchars($user['role'])); ?></td>
                            <td>
                                <span class="badge <?php echo ($user['status'] == 'active') ? 'active-badge' : 'locked-badge'; ?>">
                                    <?php echo ucfirst(htmlspecialchars($user['status'])); ?>
                                </span>
                            </td>
                            <td>
                                <select class="status-select" onchange="updateStatus(<?php echo $user['id']; ?>, this.value)">
                                    <option value="active" <?php echo ($user['status'] == 'active') ? 'selected' : ''; ?>>Unlock</option>
                                    <option value="locked" <?php echo ($user['status'] == 'locked') ? 'selected' : ''; ?>>Lock</option>
                                </select>
                            </td>
                        </tr>
                        <?php 
                            endwhile; 
                        else:
                        ?>
                        <tr>
                            <td colspan="6" style="text-align: center; padding: 20px;">No users found in database.</td>
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

    <script>
        function updateStatus(userId, status) {
            if(confirm("Are you sure you want to " + (status === 'locked' ? 'LOCK' : 'UNLOCK') + " this user?")) {
                window.location.href = "../controller/updateUserStatus.php?id=" + userId + "&status=" + status;
            } else {
                location.reload();
            }
        }
    </script>
</body>
</html>