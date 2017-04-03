<html>
	<head>
		<title>Student - Main</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
	<body>
		<h2>College Event Website</h2>
		<h3>Welcome Student!</h3>
		<!--Get username and set user type-->
		<?php 
			session_start();
			$user = $_GET['userID'];
			$type = "Student";
		?>
		<!--Link to browse RSOs-->
		<a href='browsersos.php?userID=<?php echo $user; ?>&type=<?php echo $type?>' class = "button">Browse RSOs<br></a>
		<!--Link to create an RSO-->
		<a href='studentcreate.php?userID=<?php echo $user; ?>&type=<?php echo $type?>' class = "button2">Create an RSO<br></a><br><br>
		<!--Link to browse events-->
		<a href = 'browseevents.php?userID=<?php echo $user; ?>&type=<?php echo $type?>' class = "button">Browse Events</a>
		<br>
		<!--Shows current user-->
		<?php			
			echo '<p>'."Logged in as ".$user;
		?>
		<!--Logout button-->
		<a href = "logout.php" class = "button2">Logout</a>
	</body>
</html>