
<html>
	<head>
		<title>Event Added - Get Details</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
	<body>
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
		$type = $_GET['type'];
		$eventID = $_GET['eventID'];
		$eventtype = $_GET['eventtype'];
		$name = $_POST['name'];
		
		
		if($eventtype == "RSO"){
			$sql = "SELECT rsoID FROM rsos WHERE name = '$name'";
			$result = mysqli_query($conn, $sql);
		
			$row = mysqli_fetch_assoc($result);
			if(!$row){echo '<p>'."No RSO by this name";}
			else{
				$id = $row["rsoID"];
			}
			
			
			$sql="INSERT INTO rsoevents (eventID, rsoID)
			VALUES ('$eventID', '$id')";
			if (!mysqli_query($conn, $sql)){
				die('Error: ' . mysql_error());
			}
			echo '<p>'."Event Updated";
			?>
				<br><a href="adminmain.php?userID=<?php echo $user?>&type=<?php echo $type?>?" class = "button">Return to Admin Homepage</a>
			<?php
		}
		if($eventtype == "Private"){
			
			$sql = "SELECT university FROM admins WHERE username = '$user'";
			$result = mysqli_query($conn, $sql);
		
			$row = mysqli_fetch_assoc($result);
			if(!$row){echo '<p>'."No university associated with you";}
			else{
				$school = $row["university"];
			}
			
			
			$sql="INSERT INTO privateevents (eventID, university)
			VALUES ('$eventID', '$school')";
			if (!mysqli_query($conn, $sql)){
				die('Error: ' . mysql_error());
			}
			echo '<p>'."Event Updated";
			?>
				<br><a href="adminmain.php?userID=<?php echo $user?>&type=<?php echo $type?>?" class = "button">Return to Admin Homepage</a>
			<?php
		}
		
		
	
		mysqli_close($conn)

	?>		
	</body>
</html>