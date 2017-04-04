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
	
	$user = $_GET['userID'];
	$type = $_GET['type'];
	
	if(empty($_POST["student1"]) || empty($_POST["student2"]) || 
	   empty($_POST["student3"]) || empty($_POST["student4"]) ||
	   empty($_POST["student5"])){
		die('Error: You must have 5 students to create an RSO');}
	
	if(($_POST["domain1"] != $_POST["domain2"]) || ($_POST["domain1"] != $_POST["domain3"]) || ($_POST["domain1"] != $_POST["domain4"]) || ($_POST["domain1"] != $_POST["domain5"])){
		die('Error: Student emails must have the same domain.');}

	$sql="INSERT INTO rsos(name, adminID, description)
	VALUES ('$_POST[name]', '$_POST[adminID]', '$_POST[description]')";

	$sql1 = "INSERT INTO admins(email, university, username)
	VALUES ('$_POST[adminID]', '$_POST[university]', '$_POST[username]')";
	
	// add students to inrso table
	
	
	if (!mysqli_query($conn, $sql)){
		die('Error: not in rso' . mysql_error());}

	if (!mysqli_query($conn, $sql1)){
		die('Error: ' . mysql_error());}
	echo '<p>'."RSO Added";
 
	mysqli_close($conn)

?>
<html>
	<head>
		<title>Added RSO</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
	<body>
		<br><br>
		<a href="studentmain.php?userID=<?php echo $user; ?>&type=<?php echo $type?>" class = "button">Return to Student Homepage</a>
	</body>
</html>