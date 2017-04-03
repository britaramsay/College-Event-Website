<html>
 <head>
  <title>Super Admin - Add University</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
 </head>
 <body>
	<p><h2>College Event Website</h2></p>
		
	<p><h3>Please Enter Information for the new University.</h3></p>
	<?php 
		session_start();
		$user = $_GET['userID'];
	?>
	<!--Verify? inputed values on askaction.php-->
	<form method='POST' action='askaction.php?userID=<?php echo $user ?>'>
		<p>Name:
		<input type='text' name='name' /></br>
		<br>City:
		<input type='text' name='city' /></br>
		<br>State:
		<input type='text' name='state' /></br>
		<br># of Students: 
		<input type='text' name='students' /></br>
		<br>Discription:
		<input type='text' name='discription' /></br>
		<br><input type='submit' value='Submit' name='submit' />
	</form>
	
	

	<p>
	<a href="login.php" class="button">Add Pictures of this Location</a>
	<br>
	<a href="superadminmain.php?userID=<?php echo $user; ?>" class="button">Return to SuperAdmin Homepage</a>
	
 </body>
</html>