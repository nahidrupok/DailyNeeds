<?php 
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | DailyNeeds</title>
    <style>
        :root {
            --primary-green: #27ae60;
            --dark-text: #2c3e50;
            --light-bg: #f9f9f9;
            --white: #ffffff;
            --error-red: #e74c3c;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
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
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .logo {
            font-size: 1.8rem;
            font-weight: 800;
            color: var(--primary-green);
            text-decoration: none;
            letter-spacing: -1px;
        }

        .nav-links {
            list-style: none;
            display: flex;
            align-items: center;
        }

        .nav-links li { margin-left: 25px; }
        .nav-links a { text-decoration: none; color: var(--dark-text); font-weight: 500; }

        .login-wrapper {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px 20px;
        }

        .login-card {
            background: var(--white);
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
            width: 100%;
            max-width: 400px;
        }

        .login-card h2 { text-align: center; margin-bottom: 20px; font-size: 1.8rem; }

        #error-message {
            background-color: #fdeded;
            color: var(--error-red);
            padding: 10px;
            border-radius: 5px;
            border: 1px solid var(--error-red);
            margin-bottom: 20px;
            font-size: 0.85rem;
            text-align: center;
            font-weight: 600;
            display: <?php echo isset($_SESSION['error']) ? 'block' : 'none'; ?>;
        }

        .form-group { margin-bottom: 20px; }
        .form-group label { display: block; margin-bottom: 8px; font-weight: 600; font-size: 0.9rem; }
        .form-group input {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 1rem;
            outline: none;
        }
        .form-group input:focus { border-color: var(--primary-green); }

        .login-btn {
            width: 100%;
            padding: 14px;
            background: var(--primary-green);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
        }

        .register-link { text-align: center; margin-top: 20px; font-size: 0.9rem; }
        .register-link a { color: var(--primary-green); text-decoration: none; font-weight: bold; }

        footer {
            background: #1a1a1a;
            color: white;
            text-align: center;
            padding: 3rem 0;
            margin-top: auto;
        }
    </style>
</head>
<body>

    <nav>
        <a href="../index.php" class="logo">DailyNeeds</a>
        <ul class="nav-links">
            <li><a href="products.php">Products</a></li>
            <li><a href="login.php" style="color: var(--primary-green)">Login</a></li>
            <li><a href="register.php" style="background: var(--primary-green); color: white; padding: 8px 18px; border-radius: 5px;">Register</a></li>
        </ul>
    </nav>

    <div class="login-wrapper">
        <div class="login-card">
            <h2>Login</h2>

            <div id="error-message">
                <?php 
                if (isset($_SESSION['error'])) {
                    echo $_SESSION['error'];
                    unset($_SESSION['error']); }
                ?>
            </div>
            <form id="loginForm" method="POST" action="../controller/loginCheck.php">
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" placeholder="name@example.com">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password">
                </div>
                <button type="submit" class="login-btn">Sign In</button>
            </form>
            <div class="register-link">
                Don't have an account? <a href="register.php">Register</a>
            </div>
        </div>
    </div>

    <footer>
        <p>&copy; 2026 DailyNeeds Grocery Delivery. Locally Sourced.</p>
    </footer>

    <script>
        const loginForm = document.getElementById('loginForm');
        const errorDiv = document.getElementById('error-message');

        loginForm.addEventListener('submit', function(e) {
            errorDiv.style.display = 'none';
            errorDiv.innerHTML = '';

            const email = document.getElementById('email').value.trim();
            const password = document.getElementById('password').value;
            const emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;

            let errorText = "";

            if (email === "") {
                errorText = "Email address is required.";
            } else if (!email.match(emailPattern)) {
                errorText = "Please enter a valid email address.";
            } else if (password === "") {
                errorText = "Password is required.";
            } else if (password.length < 6) {
                errorText = "Password must be at least 6 characters.";
            }

            if (errorText !== "") {
                e.preventDefault();
                errorDiv.innerHTML = errorText;
                errorDiv.style.display = 'block';
            }
        });
    </script>

</body>
</html>