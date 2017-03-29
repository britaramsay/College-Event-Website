<html>
 <head>
  <title>Admin - Add Event</title>
  <link rel="stylesheet" type="text/css" href="style.css" />	  
 </head>
 <body>
	<p><h2>College Event Website</h2></p>
	
	<p><h3>Please Enter Event Information.</h3></p>
	<?php
		session_start();
		$user = $_GET['userID'];
		$type = $_GET['type'];
	?>
	
	<!--Verify? inputed values on askaction.php-->
	<form method='POST' action='askactionadmin.php?userID=<?php echo $user ?>&type=<?php echo $type ?>'>
		<p>Name:
		<input type='text' name='name' /></br>
		<br>Date:
		<input type='date' name='date' /></br>
		<br>Time:
		<input type='time' name='time' /></br>
		<br>Category: 
		<input type='text' name='category' /></br>
		<br>Email:
		<input type='text' name='email' /></br>
		<br>Phone:
		<input type='text' name='phone' /></br>
		<br>Discription:
		<input type='text' name='discription' /></br>
		<br><input type='submit' value='Create Event' name='submit' />
	</form>
	
	<a href="adminmain.php?userID=<?php echo $user; ?>&usertype=<?php echo $type?>" class = "button">Return to Admin Homepage</a>
	
 </body>
</html>