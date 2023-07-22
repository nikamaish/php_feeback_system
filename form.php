<?php

$name= $_POST['name'];
$address = $_POST['address'];
$mobileNumber = $_POST['mobileNumber'];
$email = $_POST['email'];
$password = $_POST['password'];


$conn = new mysqli('localhost','root','','form');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ".$conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(name, address, mobileNumber, email, password) values(?, ?, ?, ?, ?)");
		$stmt->bind_param("ssiss", $name, $address, $mobileNumber, $email, $password);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}


?>