

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
	$userType = $_POST['usertype'];	
	
	if($userType == "Student"){
		$sql = "SELECT * FROM students WHERE
		username = '$uid' AND password = '$pwd'";
		$result = mysqli_query($conn, $sql);
		
		$row = mysqli_fetch_assoc($result);
		if(!$row){
			echo '<p>'."Wrong Username or Password".'<br>';
			?><a href = "login.php" class = "button">Try Again</a><?php
		}
		else{
			echo '<p>'."Logged in as ".$row["firstName"]." ".$row["lastName"].'<br><br>';
			?><a href = 'studentmain.php?userID=<?php echo $uid; ?>' class = "button">Go to Student Homepage</a><?php
		}	
	}
	if($userType == "Admin"){
			$sql = "SELECT * FROM admins WHERE
			username = '$uid' AND password = '$pwd'";
			$result = mysqli_query($conn, $sql);
			
			$row = mysqli_fetch_assoc($result);
			if(!$row){
				echo '<p>'."Wrong Username or Password".'<br>';
				?><a href = "login.php" class = "button">Try Again</a><?php
			}
			else{
				echo '<p>'."Logged in as ".$row["firstName"]." ".$row["lastName"].'<br><br>';
				?><a href = 'adminmain.php?userID=<?php echo $uid; ?>' class = "button">Go to Admin Homepage</a><?php
			}	
		}
	
	
	mysqli_close($conn)

?>
<html>
	<head>
		<title>Logging In</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
	<body>
	</body>
</html>