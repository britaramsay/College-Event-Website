

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
	
	//mysqli_select_db($conn, 'root');
		
	session_start();
	$user = $_GET['userID'];
	$type = $_GET['type'];
	$event = $_GET['eventID'];
	$commentID = $_GET['comment'];
	
	$sql = "DELETE FROM comments WHERE commentID = '$commentID'";
	if (mysqli_query($conn, $sql)) {
		echo "Record deleted successfully";
	}
	
	?>
	<a href='event.php?userID=<?php echo $user; ?>&event=<?php echo $event?>&type=<?php echo $type?>>'> <button class = "button">Return to Event Page</button></a>
	<?php

	mysqli_close($conn)

?>
<html>
	<head>
		<title>Deleting Comment</title>
		<link rel="stylesheet" type="text/css" href="style1.css" />
	</head>
	<body>
	</body>
</html>