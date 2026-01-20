<?php
include("../config.php");

if(isset($_POST['register'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password for security

    $sql = "INSERT INTO users(name,email,password,role)
            VALUES('$name','$email','$password','admin')";

    if(mysqli_query($conn,$sql)){
        echo "Admin registered successfully";
    }else{
        echo "Error!";
    }
}
?>gf

