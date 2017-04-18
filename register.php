<html>
 <head>
  <title>Student - Register</title>
  <link rel="stylesheet" type="text/css" href="style1.css" />

 </head>
 <body>
	<header>
	<h1> College Event Planner</h1>
	</header>
	<br><br>

	<!--Verify? inputed values on askaction.php-->
	<article>
	<form method='POST' action='askactionregister.php'>
	<fieldset>

			<legend><h3>User Information</h3></legend>
			<p><label>First Name:
			<input type='text' name='firstName' required = 'required'/></p>
			<p><label>Last Name:
			<input type='text' name='lastName' required = 'required'/></p>
			<p><label>University:
			<input type='text' name='school' required = 'required'/></p>
			<p><label>Email: 
			<input type='text' name='email' required = 'required'/></br>
	</fieldset>
	<br><br>
	<fieldset>
			<legend><h3>Login Information</h3></legend>
			<p><label>Username:
			<input type='text' name='username' required = 'required'/></p>
			<p><label>Password:
			<input type='password' name='password' required = 'required'/></p>
			<p><label>Confirm Password: 
			<input type='password' name='password2' required = 'required'/></br>

	</fieldset>

	<br><input type='submit' value='Register' name='submit' style = "text-align: center;">
	
	</form>
	<a href="login.php" class="button" style = "text-align: left; font-size:14px;"> Return to Login Page</a>
	</article>

	
 </body>
</html>
 