<html>
	<head>
		<title> Student Homepage</title>
		<style type = "text/css">
		header, section, footer, sidebar, nav, article, figure, 
		figcaption { display: block;}

		body {
			background-color: #D8D8D8;
			color: white;
			padding: 20px;
			font-family: Arial, Verdana, sans-serif;}
		
		page{
			background-color: #5A7194;}

		header {
			height: 160px; 
			background-color: #6390BF;
			padding: inherit;}

		sidebar {
			background-color: white; 
			width: 180px;   
			float: left; 
			padding: 0px 15px 15px 10px;}

		article{
			background-color: white; 
			width: 800px;
			margin: 0px 0px 0px 250px;  
			padding: inherit;}

		p {
			padding: 5px;
			margin: 0px;
			color: black;}

		h1 {
			text-align: center;
			font-size: 40px;
			color: white;	
			padding-top: 40px;}

		h3 {
			color: black; }
		
		
		</style>

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
			echo '<p>'."You are logged in as: ".'<i>'.$user.'</i>';
		?>

		<br><br>

		<a href = "" class = "button">View Your RSOs</a>
		<br><br>
		<a href = "logout.php" class = "button2">Logout</a>
		</section>
	</sidebar>
	
	<article>
		<h3><ins>Create an RSO</ins></h3>
		<p>Create a new RSO with at least five other students!</p>
		<br>
				<!--<a href ='studentcreate.php?userID=<?php echo $user; ?>&type=<?php echo $type?>'> <button class = "button">Create an RSO</button></a>
-->
		<a href ='studentcreate.php?userID=<?php echo $user; ?>&type=<?php echo $type?>' class = "button">Create an RSO</a>
	</article>
	<br>
	<article>
		<h3><ins>Find RSOs</ins></h3>
		<p> Find and join RSOs for your university!</p>
		<br>
		<a href = 'browsersos.php?userID=<?php echo $user; ?>&type=<?php echo $type?>' class = "button">Search RSOs</a>
	</article>
	<br>
	<article>
		<h3><ins>Find Events<ins></h3>
		<p> Search for public, private, and RSO events!</p>
		<br>
		<a href = 'browseevents.php?userID=<?php echo $user; ?>&type=<?php echo $type?>' class = "button1">Search Events</a>
	</article>
	
</body>
</html>
