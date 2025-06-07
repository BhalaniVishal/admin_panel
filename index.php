<?php
session_start();

// If already logged in, go to dashboard
if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    header("Location: admin/dashboard.php");
    exit();
}

// Otherwise, redirect to login
header("Location: login.php");
exit();
?>
