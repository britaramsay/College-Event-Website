<html>
 <head>
  <title>RSO - Join</title>
		<link rel="stylesheet" type="text/css" href="style1.css" />
 </head>
 <body>
	
	<header><h1>College Event Website</h1></header>

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
	$type = $_GET['type'];
	
	?>
	<br><sidebar>	
		<br><a href="rso.php?id=<?php echo $rso;?>&userID=<?php echo $user?>&type=<?php echo $type?>" class = "button"> Return to RSO Page </a>
	</sidebar><p>
	<?php
	$sql="INSERT INTO inrso (rsoID, studentID)
	VALUES ('$rso', '$email')";
	$sql1="DELETE FROM inrso WHERE studentID = '$email' AND rsoID ='$rso'";
	//Implement: Dont allow duplicate values
	?><br><article><?php
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
	}?></article><?php
	mysqli_close($conn)

?>
	

 </body>
</html>