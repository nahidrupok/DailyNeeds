<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
    
<div class="login-container">
<h2>Admin Login</h2>

<form method="POST" action="../view/controllar/AuthController.php">
    
    <div class="login-row">
    <label>Name: </label>
    <input type="text" name="name" required><br><br>

    </div>
    <div class="login-row">
        <label>Email: </label>
     <input type="email" name="email" required><br><br>

    </div>
    <div class="login-row">
    <label >
        Password:
    </label>    
    <input type="password" name="password" required><br><br>
    </div>
    <div class="button-row">
    <button type="submit" name="login">Login</button>
    </div>
    <div class="login-row">
    <p>Don't have an account? <a href="../Registration/admin-registration.php">Register here</a></p>
    </div>
    
</form>
</div>
</body>
</html>
