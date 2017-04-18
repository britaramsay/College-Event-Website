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
	
	session_start();
	$user = $_GET['userID'];
	$type = $_GET['type'];
	$event = $_GET['event'];

	$sql="INSERT INTO comments (eventID, comment, username)
	VALUES ('$event', '$_POST[comment]', '$user')";
	?><article><?php
	if (!mysqli_query($conn, $sql)){
		die('Error: ' . mysql_error());}
	echo '<h3>'."Left Comment";
	?></article><?php
	mysqli_close($conn)

?>
<html>
	<head>
		<title>Leaving A Comment</title>
		<link rel="stylesheet" type="text/css" href="style1.css" />
	</head>
	<body><br><br>
		
		<br><article>
		<a href='event.php?event=<?php echo $event ?>&userID=<?php echo $user; ?>&type=<?php echo $type?>' class = "button">Return to Event Page<br></a>
		</br></article>
				
	</body>
</html>