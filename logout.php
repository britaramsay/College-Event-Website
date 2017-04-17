<html>
	<head>
		<title>Logout</title>
			<link rel="stylesheet" type="text/css" href="style1.css" />	  
	</head>
	<body>
	<article>
		<?php
		   session_start();
		   unset($_SESSION["username"]);
		   unset($_SESSION["password"]);
		   
		   echo '<h3>'.'Goodbye';
		   header('Refresh: 2; URL = login.php');
		?>
	</article>
	</body>
</html>