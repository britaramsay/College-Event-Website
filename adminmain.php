<html>
 <head>
	<title>Admin - Main</title>
	<link rel="stylesheet" type="text/css" href="style.css" />	  
 </head>
 <body>
	
	<p><h2>College Event Website</h2></p>

	<p><h3>Welcome Admin!</h3></p>
	
	<?php
	$user = $_GET['userID'];
	?>

	<a href = "adminadd.php?userID=<?php echo $user ?>&type=Admin" class = "button2" type = "submit">Add an Event<a><br>
	
	<a href = "browseevents.php?userID=<?php echo $user?>&type=Admin" class = "button">Browse Events</a><br><br>
	
	<?php			
		echo '<p>'."Logged in as ".$user;
	?>
	<!--Logout Button-->
	<a href = "logout.php" class = "button2">Logout</a>
 </body>
</html>