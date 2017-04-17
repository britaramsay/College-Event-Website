<html>
 <head>
	<title>Admin - Main</title>
		<link rel="stylesheet" type="text/css" href="style1.css" />	
 </head>
 <body>
	
<p><header><h1>College Event Website</h1></p></header>
	
	<?php
	$user = $_GET['userID'];
	?>
<br><sidebar>
	<section class = "Admin Main">
	<h3>Welcome Admin!</h3>
	<?php			
		echo '<p>'."Logged in as ".$user;
	?>
	<br><br><a href = 'logout.php'> <button class = "button">Logout</button></a>
	</section>
</sidebar>

<article><br>
	<p>Add a New Event: <a href = 'adminadd.php?userID=<?php echo $user ?>&type=Admin'> <button class = "button" type = "submit">Add an Event</button><a><br>
<br></article><br><article><br>
	<p>Browse Events: <a href = 'browseevents.php?userID=<?php echo $user?>&type=Admin'> <button class = "button">Browse Events</button></a><br><br>
</article>
	<!--Logout Button-->
 </body>
</html>