<html>
 <head>
  <title>RSO - Join</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
 </head>
 <body>
	
	<p><h2>College Event Website</h2></p>

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
	
	$rso = $_GET['rso'];
	$email = $_GET['email'];
	$user = $_GET['userID'];
	$state = $_GET['state'];
	
	$sql="INSERT INTO inrso (rsoID, studentID)
	VALUES ('$rso', '$email')";
	$sql1="DELETE FROM inrso WHERE studentID = '$email'";
	//Implement: Dont allow duplicate values
	if($state == "Join"){
		echo '<p><h3>'."Trying to Join".'</h3></p>';

		if (!mysqli_query($conn, $sql)){
			die('Error: ' . mysql_error());}
		echo '<p>'."Joined RSO".'<br><br>';
	}
	if($state == "Leave"){
		echo '<p><h3>'."Trying to Leave".'</h3></p>';
		if (!mysqli_query($conn, $sql1)){
			die('Error: ' . mysql_error());}
		echo '<p>'."Left RSO".'<br><br>';
	}
	mysqli_close($conn)

?>
	<a href="rso.php?id=<?php echo $rso;?>&userID=<?php echo $user?>" class = "button"> Return to RSO Page </a>
	<p>

 </body>
</html>