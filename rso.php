<html>
 <head>
  <title>RSO - Main</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
 </head>
 <body>
	
	<p><h2>College Event Website</h2></p>

	<p><h3>RSO Information:</h3></p>
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
	
	mysqli_select_db($conn, 'root');
	$type = $_GET['type'];
	
	//Send both of these to askactionjoinrso.php
	$rso = $_GET['id'];
	$user = $_GET['userID'];
	$sql1="SELECT email FROM students WHERE username = '$user'";
	$result1 = mysqli_query($conn, $sql1);
	$row1 = mysqli_fetch_assoc($result1);
		$email = $row1["email"];
	
	$sql="SELECT * FROM rsos WHERE rsoID = '$rso'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);		
		echo '<h4>'.$row["name"];
		
	$admin = $row["adminID"];
	$leave = "Join";	
		
	$sql="SELECT * FROM admins WHERE email = '$admin'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
		echo '<br>'."At ".$row["university"].'<br>';
		echo '<h3>'."Admin: ".'</h3>'.'<p>'.$row["firstName"]." ".$row["lastName"]." (".$row["username"].")<br>".$row["email"];
		
	$sql="SELECT * FROM inrso WHERE rsoID = '$rso'";
	$result = mysqli_query($conn, $sql);
	echo '<br>'.'<h3>'."Members: ".'</h3>';
	while($row = mysqli_fetch_array($result))
		{
			
			$student = $row["studentID"];
			$sql2="SELECT firstName, lastName, username, email FROM students WHERE email='$student'";
			$result2 = mysqli_query($conn, $sql2);
			$row2 = mysqli_fetch_assoc($result2);		
		echo '<p>'.$row2["firstName"]." ".$row2["lastName"]." (".$row2["username"].") <br>".$row2["email"];
			if($row2["username"]==$user)
				$leave = "Leave";	
		}	
		
		
	
	
?>	
	<br>
	<a href='askactionrso.php?rso=<?php echo $rso?>&email=<?php echo $email?>&userID=<?php echo $user?>&state=<?php echo $leave?>&type=<?php echo $type?>'> <button class = "button button2"><?php echo $leave?> RSO</button></a>
	
	<br>
	<a href='browsersosearch.php?rso=<?php echo $rso?>&userID=<?php echo $user?>&type=<?php echo $type?>'> <button class = "button">View Events by this RSO</button></a>

	<a href="browsersos.php?userID=<?php echo $user?>&type=<?php echo $type?>" class="button">Return to RSO List</a>
<?php	mysqli_close($conn);
?>
	
</p>
	Implement:<br>
	Change to leave RSO if already a member<br>
	Need to save students email as variable $email<br>
	View events by this RSO, send $rso, relate events to rso
	
 </body>
</html>