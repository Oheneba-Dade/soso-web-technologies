<?php

$response_json = array("success" => "myfalse");
if ($_SERVER["REQUEST_METHOD"] == "POST") {

	$emailcheck = $_POST['logemail'];
	$passcheck = $_POST['logpass'];


	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "dua_db";


	$conn = new mysqli($servername, $username, $password, $dbname);


	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}


	$sql = "SELECT * FROM `users` WHERE email='$emailcheck'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

	$count = mysqli_num_rows($result);


	if ($count == 1) {

		$theid = $row['user_id'];
		$fname = $row['fname'];
		$email = $row['email'];
		$pass = $row['pword'];
		$role = $row['role_id'];


		if (password_verify($passcheck, $pass)) {

			$sql = "UPDATE `users` SET `user_stat`= 1 WHERE `user_id` = '$theid'";
			$result = mysqli_query($conn, $sql);
			$thestat = 1;


			if ($thestat == 1) {
				session_start();
				$_SESSION['userid'] = $theid;
				$_SESSION['urrole'] = $role;

				if ($_SESSION['urrole'] == 2) {
					if (empty($_SESSION['cart'])){
					$response_json["success"] = "mytrue";
					} else {
						$response_json["success"] = "mytruecart";
					}
				} else {
					$response_json["success"] = "admin";
					// header("location: shoppingAdmin.php");
				}
			}
		} else {
			$response_json["success"] = "passnomatch";
		}
	} else {
		$response_json["success"] = "accountnoexist";
	}

	header("Content-Type: application/json");
	echo json_encode($response_json);

	$conn->close();




}
?>