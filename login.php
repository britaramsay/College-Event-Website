<html>
 <head>
  <title>Login</title>
	
  <style type = "text/css">
  body {
	background-color: #D8D8D8;
	padding: 20px; 
	font-family: Arial, Verdana, sans-serif;}

   header {
	   height: 160px; 
	   background-color: #6390BF;
	   padding: inherit;}

   article{
	   background-color: white;
	   padding: 20px;}


  h1 {
	text-align: center;
	font-size: 40px;
	color: white;	
	padding-top: 40px;}


  fieldset{
	text-align: center;
	font-size: 20px;}

</style>

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
		
		<legend><b>Login</b></legend>
		<p><label>Username:
		<input type='text' name='uid' required ='required'/></label></p>
		<label>Password:
		<input type='password' name='pwd' required ='required'/></label><br>
		
		<!--Submit Button-->
		<br><input type='submit' value='Submit' name='submit'/><br>
		
		<!--Register-->
		<br><label style = "font-size: 14px;"> Don't have an account? </label>
		<a href="register.php" class="button" style ="font-size: 14px;">Register</a><br>
	
	</fieldset>
        </form>
	</article>

 </body>
</html>
