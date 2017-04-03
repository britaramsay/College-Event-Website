<html>
 <head>
  <title> Student - Create RSO </title>
  <link rel="stlesheet" tpe = "text/css" href="style.css"/>
 </head>
 <body>
	<p><h2>College Event Website</h2></p>

	<p><h3>Please Enter RSO Information: </h3></p>
	<?php
		session_start(); 
		$user = $_GET['userID'];
		$type = $_GET['type'];
	?>

	<!--Verify? inputed values on askaction.php-->
	<form method = 'POST' action = 'askactionstudent.php?userID =< ?php echo $user ?> &type=<?php echo $type?>'>
		<p>Name of RSO: 
		<input type ='text' name='name' /></br>
		<p>Affiliated University: 
		<input type ='text' name='university' /></br>
		<br>Username of Administrator: 
		<input type ='text' name ='username' /></br>
		<br>Email of Administrator: 
		<input type ='text' name ='adminID' /></br>
		<br>Email of Student 1: 
		<input type = 'text' name ='student1' />
		@ <input type = 'text' name ='domain1' 
                </br><br>
		<br>Email of Student 2: 
		<input type = 'text' name ='student2' />
		@ <input type = 'text' name ='domain2' 
                </br><br>
		<br>Email of Student 3: 
		<input type = 'text' name ='student3' />
		@ <input type = 'text' name ='domain3' 
                </br><br>
		<br>Email of Student 4: 
		<input type = 'text' name ='student4' />
		@ <input type = 'text' name ='domain4' 
                </br><br>
		<br>Email of Student 5: 
		<input type = 'text' name ='student5' />
		@ <input type = 'text' name ='domain5' 
                </br><br>
		<br>Description: 
		<input type ='text' name = 'description' /></br>
		<br><input type='submit' value='Create RSO' name='submit' />
	</form>

 <a href ="studentmain.php?userID=<?php echo $user; ?>&usertype=<?php echo $type?>" class = "button">Return to Student Homepage </a>
 
 </body>
</html>