
<html>
	<head>
		<title>Logging In</title>
		<link rel="stylesheet" type="text/css" href="style1.css" />
	</head>
	<body>
	<article>
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

	$uid = isset($_POST['uid']) ? $_POST['uid'] : $_SESSION['uid'];
	$pwd = isset($_POST['pwd']) ? $_POST['pwd'] : $_SESSION['pwd'];
	
	$sql = "SELECT * FROM users WHERE username = '$uid' AND password = '$pwd'";
	$result = mysqli_query($conn, $sql);
		
	$row = mysqli_fetch_assoc($result);
	if(!$row){
		echo '<p>'."Wrong Username or Password".'<br>';
		?><a href = "login.php" class = "button">Try Again</a><?php
	}
	else{//A user, check if student
		$sqlstu = "SELECT * FROM students WHERE username = '$uid'";
		$result = mysqli_query($conn, $sqlstu);
		
		$rowstu = mysqli_fetch_assoc($result);
		
		if(!$rowstu){//If not in students check admins
			$sqlad = "SELECT * FROM admins WHERE username = '$uid'";
			$result = mysqli_query($conn, $sqlad);
		
			$rowsad = mysqli_fetch_assoc($result);
			if(!$rowsad){
				// check superadmin
				$sqlsup = "SELECT * FROM superadmins WHERE username = '$uid'";
				$result = mysqli_query($conn, $sqlsup);
		
				$rowssup = mysqli_fetch_assoc($result);
				if(!$rowssup){
					echo '<p>'."Username error";
				}
				else{
					echo '<p>'."Logged in as ".$row["firstName"]." ".$row["lastName"].'<br><br>';
					?><a href = 'superadminmain.php?userID=<?php echo $uid ?>'> <button class = "button">Go to SuperAdmin Homepage</button></a><?php
				}
			}
			else{
				echo '<p>'."Logged in as ".$row["firstName"]." ".$row["lastName"].'<br><br>';
				?><a href = 'adminmain.php?userID=<?php echo $uid ?>'> <button class = "button">Go to Admin Homepage</button></a><?php
			}
				
		}
		else{
			echo '<p>'."Logged in as ".$row["firstName"]." ".$row["lastName"].'<br><br>';
			?><a href = 'studentmain.php?userID=<?php echo $uid ?>'> <button class = "button">Go to Student Homepage</button></a><?php	
		}
	
	}	
	
	
	mysqli_close($conn)

?>
	</article>
	</body>
</html>