<?php 
ob_start();
session_start();
include 'admin/inc/config.php'; 
unset($_SESSION['register']);
header("location: login.php"); 
?>