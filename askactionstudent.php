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
		$result3 = mysqli_query($conn, "SELECT * FROM students WHERE email = 'stuID[$x]'");
		
		if (mysqli_num_rows($result3) == 0) {
			die('<p>'.'Error: no email: '.$stuID[$x].' registered'.'<br>'. mysql_error());}
	}

	$sql="INSERT INTO rsos(name, adminID, description)
	VALUES ('$_POST[name]', '$_POST[adminID]', '$_POST[description]')";
	
	$sql1 = "INSERT INTO admins(email, university, username)
	VALUES ('$_POST[adminID]', '$_POST[university]', '$_POST[username]')";
	
	// add students to inrso table
	$sql2="SELECT MAX(rsoID) FROM inrso";
	$result = mysqli_query($conn, $sql2);	
	$row = mysqli_fetch_assoc($result);
	$rsoID = $row['MAX(rsoID)'] + 1;
	
	
	if (!mysqli_query($conn, $sql)){
		die('Error: not in rso' . mysql_error());}

	if (!mysqli_query($conn, $sql1)){
		die('Error: ' . mysql_error());}
	echo '<p>'."RSO Added";
 
	for($x = 0; $x <= 4; $x++){
		$sql4="INSERT INTO inrso(rsoID, studentID) VALUES ('$rsoID', '$stuID[$x]')";
		if (!mysqli_query($conn, $sql4)){
		die('Error: cant add students' . mysql_error());}
	}
 
	mysqli_close($conn)

?>
<html>
	<head>
		<title>Added RSO</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
	<body>
		<br><br>
		<a href="studentmain.php?userID=<?php echo $user; ?>" class = "button">Return to Student Homepage</a>
	</body>
</html>