<html>
 <head>
  <title>Event - Main</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
 </head>
 <body>
	
	<p><h2>College Event Website</h2></p>

	<p><h3>Event Information:</h3></p>
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
	$user = $_GET['userID'];
	
	mysqli_select_db($conn, 'root');
	
	$event = $_GET['id'];
	$type = $_GET['type'];
	
	$sql="SELECT name, date, time, category, email, phone, discription FROM Events WHERE eventID = $event";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
				
		echo '<p>'.$row["name"]."<br>".$row["date"]." at ".$row["time"]."<br>";
		
		echo '<br>'."This is a ".$row["category"]." event.<br><br>";
		
		echo $row["discription"]."<br><br>";
		
		echo "For more information please contact: <br>";
		echo "Email: ".$row["email"]."<br>Phone: ".$row["phone"];
	mysqli_close($conn)

?>
	
	<p>
	<a href="browseevents.php?userID=<?php echo $user; ?>&type=<?php echo $type?>" class="button">Return to Events</a>

 </body>
</html>