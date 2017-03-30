<html>
 <head>
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
 </head>
 <body>
	<p><h2>College Event Website</h2></p>
	
	<p><h3>Please Login</h3></p>
	
	<!--Verify? inputed values on askaction.php-->
	<form method='POST' action='askactionlogin.php'>
		<p>Username:
		<input type='text' name='uid' /></br>
		<br>Password:
		<input type='password' name='pwd' /></br><br>
		<input type='submit' value='Login' name='submit' />
	</form>
	
	
	<a href="register.php" class="button">Register</a>
	
 </body>
</html>