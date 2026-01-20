<?php 
// 1. Start the session to access stored errors
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | DailyNeeds</title>
    <style>
        /* CSS Variables */
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

        /* --- HEADER --- */
        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 8%;
            background: var(--white);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
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

        .nav-links a {
            text-decoration: none;
            color: var(--dark-text);
            font-weight: 500;
        }

        /* --- FORM SECTION --- */
        .reg-wrapper {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px 20px;
        }

        .reg-card {
            background: var(--white);
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            width: 100%;
            max-width: 400px;
        }

        .reg-card h2 { text-align: center; margin-bottom: 10px; }
        .reg-card p { text-align: center; color: #777; margin-bottom: 20px; font-size: 0.9rem; }

        /* --- ERROR MESSAGE DIV --- */
        #error-message {
            background-color: #fdeded;
            color: var(--error-red);
            padding: 10px;
            border-radius: 5px;
            border: 1px solid var(--error-red);
            margin-bottom: 20px;
            font-size: 0.85rem;
            /* PHP logic to show/hide based on session */
            display: <?php echo isset($_SESSION['error']) ? 'block' : 'none'; ?>;
            text-align: center;
            font-weight: 600;
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

        .reg-btn {
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

        .reg-btn:hover { background: #219150; }

        .login-link { text-align: center; margin-top: 20px; font-size: 0.9rem; }
        .login-link a { color: var(--primary-green); text-decoration: none; font-weight: bold; }

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
        <a href="../index.html" class="logo">DailyNeeds</a>
        <ul class="nav-links">
            <li><a href="products.html">Products</a></li>
            <li><a href="login.php">Login</a></li>
            <li><a href="register.php" style="background: var(--primary-green); color: white; padding: 8px 18px; border-radius: 5px;">Register</a></li>
        </ul>
    </nav>

    <div class="reg-wrapper">
        <div class="reg-card">
            <h2>Create Account</h2>
            <p>Join the DailyNeeds family today!</p>

            <div id="error-message">
                <?php 
                if (isset($_SESSION['error'])) {
                    echo $_SESSION['error'];
                    unset($_SESSION['error']); // Clear error after showing it once
                }
                ?>
            </div>

            <form id="registrationForm" method="POST" action="../controller/registrationControll.php">
                <div class="form-group">
                    <label for="fullname">Full Name</label>
                    <input type="text" id="fullname" name="fullname" placeholder="John Doe">
                </div>

                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" placeholder="name@example.com">
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Create a password">
                </div>

                <button type="submit" class="reg-btn">Register Now</button>
            </form>

            <div class="login-link">
                Already have an account? <a href="login.php">Login</a>
            </div>
        </div>
    </div>

    <footer>
        <p>&copy; 2026 DailyNeeds Grocery Delivery. Locally Sourced.</p>
    </footer>

    <script>
        const form = document.getElementById('registrationForm');
        const errorDiv = document.getElementById('error-message');

        form.addEventListener('submit', function (e) {
            // JS handles instant validation
            const name = document.getElementById('fullname').value.trim();
            const email = document.getElementById('email').value.trim();
            const password = document.getElementById('password').value;
            const emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;

            let errorMessage = "";

            if (name === "") {
                errorMessage = "Full Name is required.";
            } else if (name.length < 3) {
                errorMessage = "Name must be at least 3 characters.";
            } else if (!email.match(emailPattern)) {
                errorMessage = "Please enter a valid email address.";
            } else if (password.length < 6) {
                errorMessage = "Password must be at least 6 characters.";
            }

            if (errorMessage !== "") {
                // If JS validation fails, stop the form and show the error
                e.preventDefault(); 
                errorDiv.innerHTML = errorMessage;
                errorDiv.style.display = 'block';
            }
        });
    </script>
</body>
</html>