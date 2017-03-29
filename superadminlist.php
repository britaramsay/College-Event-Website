<html>
	<head>
		<title>Super Admin - List</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
	<body>
		<h2>College Event Website</h2>
		<h3>Universities:</h3>
	<?php
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "mydb";
		$con=mysqli_connect($servername, $username, $password, $dbname);
		// Check connection
		if (mysqli_connect_errno())
		{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		
		// Must save selected state, city and move them to
		// this page as php variables to go into query
		// 
		$result = mysqli_query($con,"SELECT * FROM Universities");
		echo '<p>';
		echo "<table border='1'>
		<tr>
			<th>Name</th>
			<th>City</th>
			<th>State</th>
			<th>Students</th>
			<th>Discription</th>
		</tr>";

		while($row = mysqli_fetch_array($result))
		{
		echo "<tr>";
			echo "<td>" . $row['Name'] . "</td>";
			echo "<td>" . $row['City'] . "</td>";
			echo "<td>" . $row['State'] . "</td>";
			echo "<td>" . $row['NumStudents'] . "</td>";
			echo "<td>" . $row['Discription'] . "</td>";

		echo "</tr>";
		}
		echo "</table>";

		mysqli_close($con);
	?>
	
	<p>
	<a href="superadminmain.php" class="button">Return to SuperAdmin Homepage</a>
	</body>
</html>