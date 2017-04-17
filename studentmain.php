<html>
	<head>
		<title> Student Homepage</title>
		<link rel="stylesheet" type="text/css" href="style1.css" />
	</head>

<body>
	<header>
		<h1> College Event Website</h1>
	</header>
	<br>
	<sidebar>
		<section class = "student info">
		<h3> Welcome Student!</h3>

		<!--Get username and set user type-->
		<?php 
			session_start();
			$user = $_GET['userID'];
			$type = "Student";
		?>

		<?php			
			echo '<p1>'."You are logged in as: ".'<i>'.$user.'</i>'.'<p1>';
		?>

		<br><br>

		<a href = 'logout.php'> <button class = "button">Logout</button></a>
		</section>
	</sidebar>
	
	<article>
		<h3><ins>Create an RSO</ins></h3>
		<p>Create a new RSO with at least five other students!</p>
		<br>
		<a href ='studentcreate.php?userID=<?php echo $user; ?>&type=<?php echo $type?>'> <button class = "button">Create an RSO</button></a>

	</article>
	<br>
	<article>
		<h3><ins>Find RSOs</ins></h3>
		<p> Find and join RSOs for your university!</p>
		<br>

		<a href = 'browsersos.php?userID=<?php echo $user; ?>&type=<?php echo $type?>'> <button class = "button">Search RSOs</button></a>
	</article>
	<br>
	<article>
		<h3><ins>Find Events<ins></h3>
		<p> Search for public, private, and RSO events!</p>
		<br>
		<a href = 'browseevents.php?userID=<?php echo $user; ?>&type=<?php echo $type?>' ><button class = "button">Search Events</button></a>
	</article>
	
</body>
</html>
