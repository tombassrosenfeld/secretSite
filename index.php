<!DOCTYPE html>
 <html>
 <head>
 	<title>My Secret Site</title>
 </head>
 <body>

 	<header>
 		<h1>My Secret Site</h1>
 	</header>


<?php 
	
	$KNOWN_EMAIL = "myemail@myemailprovider.com";

	$KNOWN_PASSWORD = "letmein";

	if (!empty($_POST) && $_POST['email'] === $KNOWN_EMAIL && $_POST['password'] === $KNOWN_PASSWORD) {
		?>
		<h2>Welcome to the secrets!</h2>

<?php
	} else{
?>

		<form method="post" >
	 		<p>
	 			<label for="email">email</label>
	 		<input id="email" type="email" name="email" placeholder="Please enter your email address here."/>
	 		</p>

	 		<p>
	 			<label for="password">Password</label>
	 			<input id="password" type="password" name="password"/>
	 		</p>
	 		
	 		<p>
	 			<input type="submit" name="action" value="log in" action="index.php">
	 		</p>
 		</form>
<?php
	}
?>
	

 



 

 	
 
 </body>
 </html>