<html>
	<head>
		<title>Editing Comment</title>
		<link rel="stylesheet" type="text/css" href="style1.css" />
	</head>
	<body>
	<?php
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "mydb";
		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
			 die("Connection failed: " . $conn->connect_error);
		} 
		
		mysqli_select_db($conn, 'root');
			
		session_start();
		$user = $_GET['userID'];
		$type = $_GET['type'];
		$event = $_GET['eventID'];
		$comment = $_GET['comment'];
		
		?>
		
		<article>
			<form method ='POST' action='editcomment2.php?userID=<?php echo $user?>&type=<?php echo $type?>&eventID=<?php echo $event?>&comment=<?php echo $comment?>'>
				<h3>Edit Comment:</h3>
				<textarea rows="7" cols="85" name='newcomm' id='newcomm' placeholder = "Rewrite your comment"></textarea><br />		
				<br><input type='submit' value='Submit' />  
			</form>
		</article>
		<?php
		?><br><article>
		<a href='event.php?userID=<?php echo $user?>&event=<?php echo $event?>&type=<?php echo $type?>'> <button class = "button">Return to Event Page</button></a>
		</article><?php 
		mysqli_close($conn)
		?>
	</body>
</html>