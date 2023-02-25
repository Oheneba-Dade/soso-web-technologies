<?php
session_start();
unset($_SESSION['cart'][$_GET['pid']]);
header("Location: cart.php");
?>