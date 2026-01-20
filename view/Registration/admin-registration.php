<!DOCTYPE html>
<html>
<head>
    <title>Admin Registration</title>
    <link rel="stylesheet" type="text/css" href="admin-registration.css">

</head>
<body>

<div class="div1">
    <h2>Admin Registration</h2>

<form method="POST">
    

    <div class="div2">
        <label>Name:</label>
        <input type="text" name="name" required><br><br>
    </div>

    <div class="div2">
        <label>Email:</label>
        <input type="email" name="email" required><br><br>
    </div>
    <div class="div2">
        <label>Password:</label>
        <input type="password" name="password" required><br><br>
    </div>
    <div class="div3">
         <button type="submit" name="register">Register</button>
    </div>
    <div class="div2">
    <p>Alread have an account? <a href="../login/admin login.php">login here</a></p>
    </div>
    
</form>
</div>
</body>
</html>
