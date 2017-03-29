<html>
	<head>
		<title>Browse Events</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
	<body>
		<h2>College Event Website</h2>
		<h3>Events!</h3>
		<?php
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "mydb";
			$con=mysqli_connect($servername, $username, $password, $dbname);
			// Check connection
			if (mysqli_connect_errno())
			{
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}
			// $userID = ;
			// 
			
			// Must save selected school, city and move them to
			// this page as php variables to go into query
			// 
			session_start();
			$result = mysqli_query($con,"SELECT * FROM Events");
			$user = $_GET['userID'];
			
			if (mysqli_num_rows($result) > 0) {
			// output data of each row
			while($row = mysqli_fetch_assoc($result)) {
				
				$eventID = $row["eventID"];
				echo '<p>'.$row["name"].", ".$row["date"];
				
				?>
				<a href='event.php?id=<?php echo $eventID; ?>&userID=<?php echo $user; ?>'>View<br></a>
				</br>
				<?php
			}
			} else {
				echo "No Events";
			}

			mysqli_close($con);
		?>
		<a href = "studentmain.php?userID=<?php echo $user; ?>" class = "button">Return to Student Homepage</a>
		<br><a href = "adminmain.php" class = "button">Return to Admin Homepage</a>
	</body>
</html>