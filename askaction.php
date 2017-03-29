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
	
	$sql="INSERT INTO Universities (name, city, state, numStudents, discription)
	VALUES ('$_POST[name]', '$_POST[city]', '$_POST[state]', '$_POST[students]', '$_POST[discription]')";
	
	
	if (!mysqli_query($conn, $sql)){
		die('Error: ' . mysql_error());}
	echo '<p>'."University Added";
 
	mysqli_close($conn)

?>
<html>
	<head>
		<title>Added University</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
	<body>
		<br><br>
		<a href = "superadminmain.php" class = "button">Return to SuperAdmin Homepage</a>
	</body>
</html>