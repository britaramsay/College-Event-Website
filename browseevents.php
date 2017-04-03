<html>
	<head>
		<title>Browse Events</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
	<body>
		<h2>College Event Website</h2>
				
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
			
			session_start();
			echo '<h3>'."Public Events".'</h3>';

			$result = mysqli_query($con,"SELECT * FROM Events WHERE category = 'Public'");
			$user = $_GET['userID'];
			$type = $_GET['type'];
			
			if (mysqli_num_rows($result) > 0) {
			// output data of each row
			while($row = mysqli_fetch_assoc($result)) {
				
				$eventID = $row["eventID"];
				echo '<p>'.$row["name"].", ".$row["date"];
				
				?>
				<a href='event.php?id=<?php echo $eventID; ?>&userID=<?php echo $user; ?>&type=<?php echo $type?>'>View<br></a>
				</br>
				<?php
			}
			} else {
				echo "No Public Events";
			}
			
			
			
			echo '<h3>'."Your RSO Events".'</h3>';
			// Get RSO events if user is an admin
			if($type == "Admin"){
				$resultinfo = mysqli_query($con,"SELECT email, university FROM admins WHERE username = '$user'");
				$rowsinfo = mysqli_fetch_assoc($resultinfo);
				// Get email and school
				$email = $rowsinfo["email"];
				$school = $rowsinfo["university"];
				
				$resultrsos = mysqli_query($con, "SELECT rsoID FROM rsos WHERE adminID = '$email'");
				if (mysqli_num_rows($resultrsos) > 0) {
					// get rsoIDs that user is admin for
					while($rowrsos = mysqli_fetch_assoc($resultrsos)) {
						$id = $rowrsos["rsoID"];
						
						$resultevent = mysqli_query($con, "SELECT eventID FROM rsoevents WHERE rsoID = '$id'");
						if (mysqli_num_rows($resultevent) > 0) {
							// get eventIDs of events by this RSO
							while($rowevent = mysqli_fetch_assoc($resultevent)) {
								$eventID = $rowevent["eventID"];
								// Display event info for each one
								$resultf = mysqli_query($con,"SELECT * FROM Events WHERE eventID = '$eventID'");
	
									
								if (mysqli_num_rows($resultf) > 0) {
								// output data of each row
								while($rowf = mysqli_fetch_assoc($resultf)) {
										
									$eventID = $rowf["eventID"];
									echo '<p>'.$rowf["name"].", ".$rowf["date"];
										
									?>
									<a href='event.php?id=<?php echo $eventID; ?>&userID=<?php echo $user; ?>&type=<?php echo $type?>'>View<br></a>
									</br>
									<?php
								}
								} else {
									echo "No Public Events";
								}
							
							}
						}
						else{
							echo '<p>'."No events by this RSO";
						}
						
					}
				}
				else{
					echo '<p>'."Not in any RSOs";
					
				}
			}
			// Get RSO events if user is a student
			if($type == "Student"){
				$resultinfo = mysqli_query($con,"SELECT email, university FROM students WHERE username = '$user'");
				$rowsinfo = mysqli_fetch_assoc($resultinfo);
				// Get email and school
				$email = $rowsinfo["email"];
				$school = $rowsinfo["university"];
				
				$resultrsos = mysqli_query($con, "SELECT rsoID FROM inrso WHERE studentID = '$email'");
				if (mysqli_num_rows($resultrsos) > 0) {
					// get rsoIDs that user is in
					while($rowrsos = mysqli_fetch_assoc($resultrsos)) {
						$id = $rowrsos["rsoID"];
						
						$resultevent = mysqli_query($con, "SELECT eventID FROM rsoevents WHERE rsoID = '$id'");
						if (mysqli_num_rows($resultevent) > 0) {
							// get eventIDs of events by this RSO
							while($rowevent = mysqli_fetch_assoc($resultevent)) {
								$eventID = $rowevent["eventID"];
								// Display event info for each one
								$resultf = mysqli_query($con,"SELECT * FROM Events WHERE eventID = '$eventID'");
	
									
								if (mysqli_num_rows($resultf) > 0) {
								// output data of each row
								while($rowf = mysqli_fetch_assoc($resultf)) {
										
									$eventID = $rowf["eventID"];
									echo '<p>'.$rowf["name"].", ".$rowf["date"];
										
									?>
									<a href='event.php?id=<?php echo $eventID; ?>&userID=<?php echo $user; ?>&type=<?php echo $type?>'>View<br></a>
									</br>
									<?php
								}
								} else {
									echo "No Public Events";
								}
							
							}
						}
						else{
							echo '<p>'."No events by this RSO";
						}
						
					}
				}
				else{
					echo '<p>'."Not in any RSOs";
					
				}
			}
			// Get Private events
			echo '<h3>'."Private Events at Your University".'</h3>';
			$resultpriv = mysqli_query($con, "SELECT eventID FROM privateevents WHERE university = '$school'");
			if (mysqli_num_rows($resultpriv) > 0) {
					// get private eventIDs for that school
				while($rowpriv = mysqli_fetch_assoc($resultpriv)) {
					$eventID2 = $rowpriv["eventID"];
					// Display event info for each one
					$resultf = mysqli_query($con,"SELECT * FROM events WHERE eventID = '$eventID2'");
	
									
					if (mysqli_num_rows($resultf) > 0) {
								// output data of each row
						while($rowf = mysqli_fetch_assoc($resultf)) {
										
							$eventID = $rowf["eventID"];
							echo '<p>'.$rowf["name"].", ".$rowf["date"];
										
							?>
								<a href='event.php?id=<?php echo $eventID; ?>&userID=<?php echo $user; ?>&type=<?php echo $type?>'>View<br></a>
								</br>
							<?php
						}
					} else {
						echo "Error";
					}
							
				}
			}
			else{
				echo '<p>'."No private events by this University";
			}
						
				
			
			
			
		
			
			
			
			if($type == "Admin"){
				?><br><a href = 'adminmain.php?userID=<?php echo $user; ?>' class = 'button'>Return to Admin Homepage</a><?php
			}
			if ($type == "Student"){
				?>
				<a href = "studentmain.php?userID=<?php echo $user; ?>&type=<?php echo $type?>" class = "button">Return to Student Homepage</a>
				<?php
			}

			mysqli_close($con);?>
		
	</body>
</html>