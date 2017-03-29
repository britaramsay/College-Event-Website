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
	
	$sql="INSERT INTO students (firstName, lastName, university, email, username, password)
	VALUES ('$_POST[firstName]', '$_POST[lastName]', '$_POST[school]', '$_POST[email]', '$_POST[username]', '$_POST[password]')";
	
	if (!mysqli_query($conn, $sql)){
		die('Error: ' . mysql_error());}
	echo "Registered as Student";
 
	mysqli_close($conn)

?>
<html>
	<head>
		<title>Student Registration</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
	<body><br><br>
		<a href="studentmain.php" class = "button">Return to Student Homepage</a>
	</body>
</html>