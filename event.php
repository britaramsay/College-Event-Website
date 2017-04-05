<html>
 <head>
  <title>Event - Main</title>
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
	<p><h1>College Event Website</h1></p>
</header>
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

	session_start();
	$user = $_GET['userID'];
	
	mysqli_select_db($conn, 'root');
	
	$event = $_GET['id'];
	$type = $_GET['type'];

?><br>
<sidebar>
	<br><a href='browseevents.php?userID=<?php echo $user; ?>&type=<?php echo $type?>'> <button class="button">Return to Events</button></a>
</sidebar>
<br>
<article>
<?php	
	echo '<p><h3>'."Event Information:".'</h3></p>';

	$sql="SELECT name, date, time, category, email, phone, discription FROM Events WHERE eventID = $event";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
				
		echo '<p>'.$row["name"]."<br><br>".$row["date"]." at ".$row["time"]."<br>";
		
		echo '<br>'."This is a ".$row["category"]." event.<br><br>";
		
		echo "Discription: ".$row["discription"]."<br><br>";
?>
</article><br>
<article>
<?php
		echo '<p>'."For more information please contact: <br>";
		echo "Email: ".$row["email"]."<br>Phone: ".$row["phone"];
?>
</article><br>
<article>
<?php
		$sql = "SELECT locationID FROM held_at WHERE eventID = $event";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		if(!$row){
			echo '<p>'."";
		}
		else{
		$location = $row['locationID'];
		$sql = "SELECT name, image FROM locations WHERE locationID = '$location'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		echo '<p>'."Held at ".$row['name'].'<br>';
		$image = $row['image'];
		?><br><img src="<?php echo $image; ?>" style="width:304px;height:228px;"><br><br>
		<?php
		}
		
?>
</article>
<br>
<article>
	<form method ='POST' action='askactioncomment.php?userID=<?php echo $user?>&type=<?php echo $type?>&event=<?php echo $event?>'>
		<h3>Leave a Comment:</h3>
		<textarea name='comment' id='comment'></textarea><br />		
		<input type='submit' value='Submit' />  
	</form>
</article>
	
<br>
<article>	
	<?php 
	$result = mysqli_query($conn, "SELECT comment, username FROM comments WHERE eventID = '$event'");
			// View Results
			if (mysqli_num_rows($result) > 0) {
				echo '<h3>'."Comments".'</h3>';
				while($row = mysqli_fetch_assoc($result)) {
					echo '<p>'."''".$row["comment"]."''"." by ".$row["username"];					
				}
			} 
			else 
				echo '<h3>'."No comments".'</h3>';
	
	mysqli_close($conn)
	?>
</article>
 </body>
</html>