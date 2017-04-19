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
	
	$user = $_GET['userID'];
	
	if(empty($_POST["student1"]) || empty($_POST["student2"]) || 
	   empty($_POST["student3"]) || empty($_POST["student4"]) ||
	   empty($_POST["student5"])){
		die('Error: You must have 5 students to create an RSO');}
		
	$stuID[0] = $_POST['student1'].'@'.$_POST['domain1'];
	$stuID[1] = $_POST["student2"].'@'.$_POST["domain2"];
	$stuID[2] = $_POST["student3"].'@'.$_POST["domain3"];
	$stuID[3] = $_POST["student4"].'@'.$_POST["domain4"];
	$stuID[4] = $_POST["student5"].'@'.$_POST["domain5"];
	
	if(($_POST["domain1"] != $_POST["domain2"]) || ($_POST["domain1"] != $_POST["domain3"]) || ($_POST["domain1"] != $_POST["domain4"]) || ($_POST["domain1"] != $_POST["domain5"])){
		die('Error: Student emails must have the same domain.');}
		
	for($x = 0; $x <= 4; $x++){
		$temp = $stuID[$x];
		$result3 = mysqli_query($conn, "SELECT * FROM students WHERE email = '$temp'");
		
		if (mysqli_num_rows($result3) < 1) {
			die('<p>'.'Error: no email: '.$stuID[$x].' registered'.'<br>'. mysql_error());}
	}

	$sql="INSERT INTO rsos(name, adminID, description)
	VALUES ('$_POST[name]', '$_POST[adminID]', '$_POST[description]')";
	
	$temp = $_POST['username'];
	$email = $_POST['adminID'];
	
	$result4 = mysqli_query($conn, "SELECT * FROM admins WHERE username = '$temp'");

	if (mysqli_num_rows($result4) < 1) {
		$sql1 = "INSERT INTO admins(email, university, username)
		VALUES ('$_POST[adminID]', '$_POST[university]', '$_POST[username]')";
		
		if (!mysqli_query($conn, $sql1)){
			die('Error: ' . mysql_error());}
		echo '<p>'."RSO Added";	
	}	
	// add students to inrso table
	$sql2="SELECT rsoID FROM rsos WHERE adminID = '$email'";
	$result = mysqli_query($conn, $sql2);	
	$row = mysqli_fetch_assoc($result);
	$rsoID = $row['rsoID'];
	
	
	if (!mysqli_query($conn, $sql)){
		die('Error: not in rso' . mysql_error());}

	
 
	for($x = 0; $x <= 4; $x++){
		$sql4="INSERT INTO inrso(rsoID, studentID) VALUES ('$rsoID', '$stuID[$x]')";
		if (!mysqli_query($conn, $sql4)){
		die('Error: cant add students' . mysql_error());}
	}
 
	mysqli_close($conn)

?>
<html>
	<head>
		<title><p>Added RSO</p></title>
		<link rel="stylesheet" type="text/css" href="style1.css" />
	</head>
	<body>
		<br><br>
		<a href="studentmain.php?userID=<?php echo $user; ?>" class = "button">Return to Student Homepage</a>
	</body>
</html>