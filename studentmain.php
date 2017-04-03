<html>
	<head>
		<title>Student - Main</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
	<body>
		<h2>College Event Website</h2>
		<h3>Welcome Student!</h3>
		<!--Students can look for an RSO to join-->
		<?php 
			session_start();
			$user = $_GET['userID'];
			echo '<p>'."Logged in as ".$user;
			$type = "Student";
		?>
		
		<br><a href='browsersos.php?userID=<?php echo $user; ?>&type=<?php echo $type?>' class = "button">Browse RSOs<br></a>
		
		
		<a href='studentcreate.php?userID=<?php echo $user; ?>&type=<?php echo $type?>' class = "button">Create an RSO<br></a>
		<br><br>
		<a href = 'browseevents.php?userID=<?php echo $user; ?>&type=<?php echo $type?>' class = "button">Browse Events</a>
		<br>
		View University Events			$stuUniv</br>
		View Events By Student's RSOs	$stuRSOs
		
		<br><a href = "logout.php" class = "button">Logout</a>
	</body>
</html>