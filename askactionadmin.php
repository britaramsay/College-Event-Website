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
	session_start();
	mysqli_select_db($conn, 'root');
	
	$user = $_GET['userID'];
	
	$sql="INSERT INTO events (name, date, time, category, email, phone, discription)
	VALUES ('$_POST[name]', '$_POST[date]', '$_POST[time]', '$_POST[category]', '$_POST[email]', '$_POST[phone]', '$_POST[discription]')";
	
	if (!mysqli_query($conn, $sql)){
		die('Error: ' . mysql_error());}
	echo '<p>'."Event Added";
 
	mysqli_close($conn)

?>
<html>
	<head>
		<title>Added University</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
	<body>
		<br><br>
		<a href="adminmain.php?userID=<?php echo $user?>" class = "button">Return to Admin Homepage</a>
	</body>
</html>