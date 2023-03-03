<?php


require 'lib/PHPMailer/src/PHPMailer.php';
require 'lib/PHPMailer/src/SMTP.php';
require 'lib/PHPMailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


// get session vars and customer data
session_start();

$sql_user_email = "SELECT email, fname FROM users WHERE user_id = '$_SESSION[userid]'";
$result = mysqli_query($conn, $sql_user_email);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$customer_email = $row['email'];
$customer_name = $row['fname'];

$mail = new PHPMailer();

$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'duaplants@gmail.com';
$mail->Password = 'rbwzenkmgehcjfva';
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;
$mail->isHTML(true);


// timestamp
date_default_timezone_set('Asia/Kolkata');
$date = date('d-m-y');

// message to be delivered
$mail->setFrom('duaplants@gmail.com', 'Dua');
echo 'setting message... <br><br>';
//create some session var to be passed to this
$mail->addAddress($customer_email, $customer_name);
$mail->Subject = 'Order Confirmation';

//body?
$body = "Hello user, " . $customer_email . ".";
// $mail -> Body = $body;
$body .= "Your order has been placed successfully! Here are the details of your order: \n";

// cart total
$cart_total = 0;
foreach ($_SESSION['cart'] as $item => $item_val) {
    $sql = "SELECT product_name, price FROM product WHERE product_id = '$item'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $body .= $row['product_name'] . " x " . $item_val . "\n";
    $cart_total += $row['price'] * $item_val;
}

$body .= "Total = " . $cart_total;
$body .= "<br>";
$body .= "Your order will be delivered 2 days from " . $date;
$body .= "Thank You for shopping with us!";

$mail->Body = nl2br($body);

// send mail
if (!$mail->send()) {
    echo 'message could not be sent. MailerError: ' . $mail->ErrorInfo;
} else {
    echo 'mail delivered';
}