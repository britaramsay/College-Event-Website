<html>
	<head>
		<title>Browse RSOs</title>
			<link rel="stylesheet" type="text/css" href="style1.css" />
	</head>
	<body>
		<header>
			<h1>College Event Website</h1>
		</header><br>
		
		<?php
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "mydb";
			$conn=mysqli_connect($servername, $username, $password, $dbname);
			// Check connection
			if (mysqli_connect_errno())
			{
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}
			
			session_start();
			// Get active username
			$user = $_GET['userID'];
			$type = $_GET['type'];
			?>
			<sidebar>
		<!--Link back to student main page, acrry userID-->
		<br><a href='studentmain.php?userID=<?php echo $user; ?>'> <button class = "button">Return to Student Homepage</button></a><br>
		</sidebar>
			<?php
			
			// Get the email of the current user
			$result1 = mysqli_query($conn, "SELECT email FROM students WHERE username = '$user'");
			$row1 = mysqli_fetch_assoc($result1);
			// Save current users email
			$stemail = $row1["email"];			
			// Find RSO that are associated with the students email
			$result2 = mysqli_query($conn, "SELECT rsoID FROM inrso WHERE studentID = '$stemail'");
			// View Results
			?>
			<article><?php
			if (mysqli_num_rows($result2) > 0) {
				echo '<h3>'."Your RSOs".'</h3>';
				while($row2 = mysqli_fetch_assoc($result2)) {
					// Id of curretn RSO that student belongs to
					$id = $row2["rsoID"];
					// Get info for that rsoID
					$result = mysqli_query($conn,"SELECT * FROM rsos WHERE rsoID = '$id'");
					$row = mysqli_fetch_assoc($result);
					// Save rsoID as variable to pass in link to individual RSO page
					$rsoID = $row["rsoID"];
					// Preview RSOs
					echo '<p>'.$row["name"].'<br><br>'." Admin: ".$row["adminID"];
					// Link to individual RSO page
					?>
					<a href='rso.php?id=<?php echo $rsoID; ?>&userID=<?php echo $user;?>&type=<?php echo $type?>'>View<br></a>
					</br>
					<?php
					}
			} 
			else 
				echo "No RSOs";
			?>
			</article><br><article>
			<?php
			echo '<h3>'."Available RSOs".'</h3>';
			$result3 = mysqli_query($conn, "SELECT * FROM rsos");
			if (mysqli_num_rows($result3) > 0) {
				while($row3 = mysqli_fetch_assoc($result3)) {
					$temp = $row3["rsoID"];
					$result4 = mysqli_query($conn, "SELECT studentID, rsoID FROM inrso 
						WHERE rsoID = '$temp' AND studentID = '$stemail'");
					if (mysqli_num_rows($result4) < 1) {

						$rsoID = $row3["rsoID"];
					
						// Preview RSOs
						echo '<p>'.$row3["name"].'<br><br>'." Admin: ".$row3["adminID"];
						// Link to individual RSO page
						?>
						<a href='rso.php?id=<?php echo $rsoID; ?>&userID=<?php echo $user;?>&type=<?php echo $type?>'>View<br></a>
						</br><br>
						<?php

					}
					else{
					}

						
						
						
					}
			}
			else{
			}
						
					// if not show $row["rsoID"]
				
	 
			
			// Not show available RSOs
			// Close sql connection
			mysqli_close($conn);
		?>
		</article>
		
		</br>
	</body>
</html>