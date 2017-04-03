<html>
 <head>
  <title>Super Admin - Main</title>

		<link rel="stylesheet" type="text/css" href="style.css" />
	
 </head>
 <body>
	<h2>College Event Website</h2>
	<p><h3>Welcome SuperAdmin!</h3></p>
	
	
	
	<?php 
		session_start();
		$user = $_GET['userID'];
		$type = 'superadmin';
	?>
	
	<!--Browse Locations-->
	<p><a href="superadminlist.php?userID=<?php echo $user; ?>" class="button">Browse Locations</a>
	
	<!--Add a Location-->
	<a href="superadminadd.php?userID=<?php echo $user; ?>" class="button2">Add a Location</a>
	<?php			
			echo '<p>'."Logged in as ".$user;
	?>
	<a href = "logout.php" class = "button2">Logout</a>
	<br><br><br>Bonus Feature:  narrowing search, populate dropdown from db
	<br><h3>Please narrow your search</h3>
	
	<p>Select State: 
	<select>
		<option value="Public">Florida</option>
		<option value="Private">Georgia</option>
		<option value="RSO">Alabama</option>
	</select>
	Select City
	<select> <!--will be options from database-->
		<option value="Public">Orlando</option>
		<option value="Private">Miama</option>
		<option value="RSO">Atlanta</option>
	</select>

 </body>
</html>