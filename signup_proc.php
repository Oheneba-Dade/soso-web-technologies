<?php
$response_json = array("success" => "myfalse");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	//collection form data
	$uname = $_POST['username'];
	$uemail = $_POST['useremail'];
	$upass = $_POST['userpass'];

	//database connection parameters
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "dua_db";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		//stop executing the code and echo error
		die("Connection failed: " . $conn->connect_error);
	}

	//encrypt password
	//use the php password_hard function
	$encrypted_pass = password_hash($upass, PASSWORD_DEFAULT);

	//write query
	//user role (1 is admin, 2 is standard user)
	//user status( 1 is active, 2 is inactive)
	$sql = "INSERT INTO `users` (fname, email, pword) 
	VALUES ('$uname', '$uemail', '$encrypted_pass')";


	// check if query worked
	if ($conn->query($sql) === TRUE) {

		//redirect to homepage
		$response_json["success"] = "mytrue";

	} else {
		//echo error but continue executing the code to close the session
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

	//close database connection
	$conn->close();

	header("Content-Type: application/json");
	echo json_encode($response_json);

}

// else
// {
// 	//redirect to shopping page
// 	header("Location: shopping.php");
// 	exit();
// }



?>