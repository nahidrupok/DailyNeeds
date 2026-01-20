<?php
include("../config.php");

class User {
    private $conn;

    public function __construct($db){
        $this->conn = $db;
    }

    // Check admin login
    public function loginAdmin($email, $password){
        $sql = "SELECT * FROM admin_user WHERE email='$email' AND role='admin'";
        $result = mysqli_query($this->conn, $sql);
        if(mysqli_num_rows($result) > 0){
            $admin = mysqli_fetch_assoc($result);
            if(password_verify($password, $admin['password'])){
                return $admin; // return admin data
            }
        }
        return false;
    }
}
