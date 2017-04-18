<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "mydb";
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		 die("Connection failed: " . $conn->connect_error);
	} 

	mysqli_select_db($conn, 'root');
	
	if($_POST["password"] != $_POST["password2"]){
		die('Error: Passwords do not match.');}

	$sql="INSERT INTO users(firstName, lastName, username, password)
	VALUES ('$_POST[firstName]', '$_POST[lastName]', '$_POST[username]', '$_POST[password]')";
	
	$sql1="INSERT INTO students(username, email, university)
	VALUES ('$_POST[username]', '$_POST[email]', '$_POST[school]')";
 
	if (!mysqli_query($conn, $sql)){
		die('Error: ' . mysql_error());}

	if (!mysqli_query($conn, $sql1)){
		die('Error: ' . mysql_error());}

	echo "Registered as Student";

	mysqli_close($conn)

?>
<html>
	<head>
		<title>Student Registration</title>
		<link rel="stylesheet" type="text/css" href="style1.css" />
	</head>
	<body><br><br>
		<a href="login.php" class = "button">Return to Login Page</a>
	</body>
</html>