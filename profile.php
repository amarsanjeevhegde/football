<!DOCTYPE html>

<html>
<head> 

  <title>Preston F.C</title>

<?php
session_start();
  /*A connection to the database was created, if the connection is not possible than a error message should pop up.*/
  $db = mysqli_connect('localhost', 'root', '', 'project') or die("Connection to the database is currently not possible");
  if (!isset($_SESSION['username'])) 
  {
 	$_SESSION['comment'] = "login to the account to access the application ";
  	header('location: login.php');
  }
    
  if (isset($_GET['logout'])) 
  {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
  
?>
<link rel="stylesheet" type="text/css" href="stylesheet.css">	
</head>
<body>
<h1>Preston F.C</h1>

<ul>
<li><a href="menu.php">Home</a></li>
<li><a href="videos.php">Video</a></li>
<li><a href="profile.php">Profile</a></li>
<li><a href="comment.php">Comment</a></li>
<li><a href="timetable.php">Schedule</a></li>
<li><a href="login.php">Logout</a></li>
</ul>

<?php
/*data is pulled from the database, based upon the user filling up all the fields the database changes.*/
$query = " SELECT * FROM accounts WHERE username = '{$_SESSION['username']}' ";
$results = $db->query($query);
    
if ($results->num_rows > 0)
	{
		while($row = $results->fetch_assoc()) 
		{
    
?>
<h2>Profile</h2>
<form method="post" action="update_profile.php">
  	<div class="container"style="max-width: 250px">
	<img class="mySlides" src="profile_picture.jpg" style="width: 35%">
  	  <label>Username</label> <?php echo $row['username'] ?>
      <input type="hidden" name="username" value="<?php echo $row['username'] ?>" />
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
  	  <label>Email</label> <?php echo $row['email']?>
      <input name="email" value="<?php echo $row['email'] ?>" />
  	</div>
		
  	<div>
  	  <button type="submit" name="update" class="btn" >Submit</button>
  	</div>
	
  </form>

<?php

       }
	}

?>
  <?php if (isset($_SESSION['success'])) : ?>
      <div class="error_success" >
      <br>
          <?php 
          echo $_SESSION['success']; 
          unset($_SESSION['success']);
          ?>
      </br>
      </div>
  	<?php endif ?>
</body>
</html>