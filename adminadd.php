<html>
 <head>
  <title>Admin - Add Event</title>
	<link rel="stylesheet" type="text/css" href="style1.css" />
 </head>
 <body>
	<header><h1>College Event Website</h1></header>
	
	<?php
		session_start();
		$user = $_GET['userID'];
		$type = $_GET['type'];
	?>
	<br>
	<sidebar>
		<section = "Admin Add">
			<br><a href='adminmain.php?userID=<?php echo $user; ?>'> <button class = "button">Return to Admin Homepage</button></a>
		</section>
	</sidebar>
	
	<br>
	<article>
		<p><h3>Please Enter Event Information.</h3></p>
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
	</article>
	
 </body>
</html>