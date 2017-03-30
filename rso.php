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
	$sql="SELECT email FROM students WHERE username = '$user'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
		$email = $row["email"];
	
	$sql1="SELECT * FROM rsos WHERE rsoID = '$rso'";
	$result1 = mysqli_query($conn, $sql1);
	$row1 = mysqli_fetch_assoc($result1);		
		echo '<h4>'.$row1["name"];
	// Admin email
	$admin = $row1["adminID"];
	// In RSO statis
	$leave = "Join";	

	$sql2="SELECT * FROM admins WHERE email = '$admin'";
	$result2 = mysqli_query($conn, $sql2);
	$row2 = mysqli_fetch_assoc($result2);
		echo '<br>'."At ".$row2["university"].'<br>';
		$adminusermame = $row2["username"];
		
	$sql3="SELECT * FROM users WHERE username = '$adminusermame'";
	$result3 = mysqli_query($conn, $sql3);
	$row3 = mysqli_fetch_assoc($result3);
	echo '<h3>'."Admin: ".'</h3>'.'<p>'.$row3["firstName"]." ".$row3["lastName"]." (".$adminusermame.")<br>".$admin;
		
	$sql="SELECT * FROM inrso WHERE rsoID = '$rso'";
	$result = mysqli_query($conn, $sql);
	echo '<br>'.'<h3>'."Members: ".'</h3>';
	while($row = mysqli_fetch_array($result))
	{
		$student = $row["studentID"];
		$sql2="SELECT username, email FROM students WHERE email='$student'";
		$result2 = mysqli_query($conn, $sql2);
		$row2 = mysqli_fetch_assoc($result2);
		$temp = $row2["username"];
		$sql4="SELECT firstName, lastName FROM users WHERE username = '$temp'";
		$result4 = mysqli_query($conn, $sql4);
		$row4 = mysqli_fetch_assoc($result4);
		echo '<p>'.$row4["firstName"]." ".$row4["lastName"]." (".$row2["username"].") <br>".$row2["email"];
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