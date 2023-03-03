<?php
session_start();
unset($_SESSION['cart'][$_GET['pid']]);
$_SESSION['cart'][$_GET['pid']] = $_GET['quantity'];
header("Location: cart.php");
?>