<?php
session_start();

// Temporary session check
if (!isset($_SESSION['admin_id'])) {
    header("Location: ../login/admin login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Admin Dashboard - DailyNeeds</title>
    <link rel="stylesheet" href="dashbord.css">
</head>
<body>

<div class="admin-container">

    <?php include 'sidebar.php'; ?>

    <div class="main-content">
        <?php include 'header.php'; ?>

        <div class="dashboard-cards">

            <div class="card">
                <h3>Total Products</h3>
                <p>120</p>
            </div>

            <div class="card">
                <h3>Total Categories</h3>
                <p>8</p>
            </div>

            <div class="card">
                <h3>Total Orders</h3>
                <p>45</p>
            </div>

            <div class="card">
                <h3>Total Users</h3>
                <p>30</p>
            </div>

        </div>

        <div class="recent-orders">
            <h2>Recent Orders</h2>

            <table>
                <tr>
                    <th>Order ID</th>
                    <th>Customer</th>
                    <th>Status</th>
                </tr>

                <tr>
                    <td>#101</td>
                    <td>Rahim</td>
                    <td>Pending</td>
                </tr>

                <tr>
                    <td>#102</td>
                    <td>Karim</td>
                    <td>Approved</td>
                </tr>
            </table>
        </div>

        <?php include 'footer.php'; ?>
    </div>

</div>

</body>
</html>
