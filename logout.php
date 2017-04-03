<?php
   session_start();
   unset($_SESSION["username"]);
   unset($_SESSION["password"]);
   
   echo '<p>'.'Goodbye';
   header('Refresh: 2; URL = login.php');
?>
<html>
	<head>
		<title>Logout</title>
			<link rel="stylesheet" type="text/css" href="style.css" />	  
	</head>
	<body>
	</body>
</html>