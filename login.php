<!DOCTYPE html>

<html>
<head>
  <title>Preston F.C</title>
  <link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>
<h1>Preston F.C</h1> <!-- The name of website, it also acts as the logo for it.-->

  <div class="container">
  <div class="header">
  	<h2>Login</h2>
  </div>
	
  <form action="server.php" method="post">
  	<div>
  	  <label>Username</label>
  	  <input type="text" name="username" required>  <!--Server.php is connected to the database, and ensures all the functions are occuring as a result the user can create a account or login in to an existing account.-->
  	</div>
	
	<div>
  	  <label>Password</label>
  	  <input type="password" name="password_1" required>
  	</div>

	<div>
  	  <button type="submit" name="login_account" class="btn">Login</button>
  	</div>
	
	<p>
  		Not a member? <a href="register.php">Register Now</a>
  	</p>

</form>
</div>
  
</body>
</html>