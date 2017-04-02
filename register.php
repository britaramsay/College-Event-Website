<html>
 <head>
  <title>Student - Register</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
 </head>
 <body>
	<p><h2>College Event Website</h2></p>
	
	<p><h3>Please Enter Your Information</h3></p>
	
	<!--Verify? inputed values on askaction.php-->
	<form method='POST' action='askactionregister.php'>
		<p>First Name:
		<input type='text' name='firstName' /></br>
		<br>Last Name:
		<input type='text' name='lastName' /></br>
		<br>School:
		<input type='text' name='school' /></br>
		<br>Email: 
		<input type='text' name='email' /></br>
		<br>Username:
		<input type='text' name='username' /></br>
		<br>Password:
		<input type='password' name='password' /></br>
		<br>Confirm Password: 
		<input type='password' name='password2' /></br>
		<br><input type='submit' value='Register' name='submit' />
	</form>
	
	<a href="login.php" class="button">Return to Login Page</a>
	
 </body>
</html>