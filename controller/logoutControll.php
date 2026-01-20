<?php
session_start();
session_unset();    // Clear all variables
session_destroy();  // Destroy the session
header("Location: ../view/login.php");
exit();
?>