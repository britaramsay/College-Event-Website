
<html>
	<head>
		<title>Added University</title>
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
		$name = $_POST['name'];
		$sql="INSERT INTO events (name, date, time, category, email, phone, discription)
		VALUES ('$_POST[name]', '$_POST[date]', '$_POST[time]', '$_POST[category]', '$_POST[email]', '$_POST[phone]', '$_POST[discription]')";
		
		
		if (!mysqli_query($conn, $sql)){
			die('Error: ' . mysql_error());}
		echo '<p>'."Event Added";
		
		$sql = "SELECT eventID FROM events WHERE name = '$name'";
		$result = mysqli_query($conn, $sql);
		
		$row = mysqli_fetch_assoc($result);
		if(!$row){echo '<p>'."No such event";}
		else{
			$eventID = $row["eventID"];}
		
		if($_POST['category']=="RSO"){
			echo '<p>'."Please enter the name of the RSO this event is being held by";?>
			
			<form method='POST' action='askactionadmin2.php?userID=<?php echo $user ?>&eventtype=<?php echo $_POST['category'];?>&eventID=<?php echo $eventID ?>&type=<?php echo $type ?>'>
			<p>Name:<input type='text' name='name' /></br>
			<br><input type='submit' value='Update Event' name='submit' />
			</form><?php
		
		}
		if($_POST['category']=="Private"){
			echo '<p>'."Please enter the name of the University this event is being held at";?>
			
			<form method='POST' action='askactionadmin2.php?userID=<?php echo $user ?>&eventtype=<?php echo $_POST['category'];?>&eventID=<?php echo $eventID ?>&type=<?php echo $type ?>'>
			<p>Name:<input type='text' name='name' /></br>
			<br><input type='submit' value='Update Event' name='submit' />
			</form><?php
		
		}
		if($_POST['category']=="Public"){
			?>
				<a href="adminmain.php?userID=<?php echo $user?>&type=<?php echo $type?>?" class = "button">Return to Admin Homepage</a>
			<?php
		}
		mysqli_close($conn)

	?>		
	</body>
</html>