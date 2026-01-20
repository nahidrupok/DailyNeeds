<?php
$conn = mysqli_connect("localhost","root","","dailyneeds");

if(!$conn){
    die("Database connection failed: " . mysqli_connect_error());
}
?>
