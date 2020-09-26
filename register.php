<!DOCTYPE html>
<html>
<head>
  <title>Preston F.C</title>
  <link rel="stylesheet" type="text/css" href="stylesheet.css">
  
</head>
<body>
<h1>Preston F.C</h1> <!-- The name of website, it also acts as the logo for it.-->

  <div class="header">
  	<h2>Register</h2>
  </div>
	
  <form method="post" action="server.php">
  	<div class="container">
  	  <label>Username</label>
  	  <input type="text" name="username"><!--Server.php is connected to the database, and ensures all the functions 
	  are occuring as a result the user can create a account or login in to an existing account.-->
  	</div>
	
	<div>
  	  <label>Password</label>
  	  <input type="password" name="password_1">
  	</div>
	
	<div>
  	  <label>Confirm password</label>
  	  <input type="password" name="password_2">
  	</div>
	
	<div>
  	  <label>Email</label>
  	  <input type="email" name="email" >
  	</div>
		
  	<div>
  	  <button type="submit" name="reg_user" class="btn" >Submit</button>
  	</div>
  	<p>
  		Are you a member? <a href="login.php">login</a><!--navigates to login or register page when required-->
  	</p> 
	
  </form>
  
</body>
</html>