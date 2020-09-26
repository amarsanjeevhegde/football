<!DOCTYPE html>

<html>
<head> 

  <title>Profile</title>
  <link rel="stylesheet" type="text/css" href="stylesheet.css">	
</head>
<body>



<?php 
session_start();
$errors = array(); 
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


<?php
if (isset($_POST['update']))
   {
       $username = mysqli_real_escape_string($db, $_POST['username']);
       $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
       $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
       if ($password_1 != $password_2) 
       {	array_push($errors, "Passwords are not matching");
       }
       $email = mysqli_real_escape_string($db, $_POST['email']);
// similar to the code in server.php the user can enter details, the details are stored on the database, an notification is sent to the user of the update.
      if (empty($username)) { array_push($errors, "username is required"); }
      if (empty($password_1)) { array_push($errors, "password is required"); }
      if (empty($password_2)) { array_push($errors, "confirm password is required"); }
      if (empty($email)) { array_push($errors, "email is required"); }
  // As a result when the user logs on their account they must enter the updsted login information.

      if (count($errors) == 0) 
	  {
      $password = md5($password_1);
      $query = "update accounts set username='$username', password='$password', email='$email'
		 where username= '{$_SESSION['username']}' ";
         mysqli_query($db, $query);
  	     $_SESSION['username'] = $username;
         $_SESSION['success'] = "Your details are updated";
  	     header('location: profile.php');
      }
   }
?>     

</body>
</html>
