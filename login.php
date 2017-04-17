<html>
 <head>
  <title>Login</title>
	<link rel="stylesheet" type="text/css" href="style1.css" />	  
 </head>
 <body>
	<header>
	<h1>College Event Planner</h1>
	</header>
	<br><br>
	<!--Verify? inputed values on askaction.php-->
	<!--Fieldset-->
	<article>
	<form method = 'POST' action = 'askactionlogin.php'>
	<fieldset>
		
		<legend><h3>Login</h3></legend>
		<p><label>Username:
		<input type='text' name='uid' required ='required'/></label></p>
		<p><label>Password:
		<input type='password' name='pwd' required ='required'/></label><br>
		
		<!--Submit Button-->
		<br><input type='submit' value='Submit' name='submit'/><br>
		
		<!--Register-->
		<p><label style = "font-size: 14px;"> Don't have an account? </label>
		<a href="register.php" class="button" style ="font-size: 14px;">Register</a><br>
	
	</fieldset>
        </form>
	</article>

 </body>
</html>
