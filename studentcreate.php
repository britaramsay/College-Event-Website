<html>
 	<head>
  		<title> Student - Create RSO </title>
			<link rel="stylesheet" type="text/css" href="style1.css" />
 	</head>
 	<body>
		<header>
		<p><h1>College Event Website</h1></p>
		</header>
		<br><br>
		
		<?php
		session_start(); 
		$user = $_GET['userID'];
		$type = $_GET['type'];
		?>
		
		<article>
		<form method = 'POST' action ='askactionstudent.php?userID=<?php echo $user ?>'>
		<fieldset>
			<legend><h3>RSO Information</h3></legend>
			<p><label>Name of RSO:
			<input type ='text' name='name' /></p>
			<p><label>Affiliated University:
			<input type ='text' name='university' /></p>
			<p><label>Username of Admin:
			<input type ='text' name ='username' /></p>
			<p><label>Email of Admin:
			<input type ='text' name ='adminID' /></p>
			<p><label>Email of Student1:
			<input type = 'text' name ='student1' />
			@ <input type = 'text' name ='domain1'/></p>
			<p><label>Email of Student 2: 
			<input type = 'text' name ='student2' />
			@ <input type = 'text' name ='domain2'/></p> 
             		<p><label>Email of Student 3: 
			<input type = 'text' name ='student3' />
			@ <input type = 'text' name ='domain3'/></p> 
			<p><label>Email of Student 4: 
			<input type = 'text' name ='student4' />
			@ <input type = 'text' name ='domain4'/></p>
			<p><label>Email of Student 5: 
			<input type = 'text' name ='student5' />
			@ <input type = 'text' name ='domain5'/></p> 
			<p><label>Description: 
			<input type ='text' name = 'description' /></br>
			<br><input type='submit' value='Create RSO' name='submit' /><br>
			<br><a href ="studentmain.php?userID=<?php echo $user; ?>&usertype=<?php echo $type?>" class = "button" style = "font-size: 14px;">Return to Student Homepage </a>
 
		</fieldset>
	</form>
</article>
	
	
</body>
</html>	