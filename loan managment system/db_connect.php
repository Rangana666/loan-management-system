<?php
$servername = "localhost";
$username = "sale_root";
$password = "root";
$dbname = "sale_loan";
$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());

if (mysqli_connect_errno()) {
	printf("Connect failed: %s\n", mysqli_connect_error());
	exit();
}
?>
