<!DOCTYPE html>

<html>
<head>

  <title>Preston F.C</title>
  <link rel="stylesheet" type="text/css" href="stylesheet.css">
  
</head>
<body>
<h1>Preston F.C</h1> <!-- The name of website, it also acts as the logo for it.-->


<?php
session_start();

/*This is a necessary step to identify and initialize the variable.*/
$username = "";
$email = "";

$errors = array(); 
/*learnt from w3hschool and codeshack*/
/*A connection to the database was created, if the connection is not possible than a error message should pop up.*/
$db = mysqli_connect('localhost', 'root', '', 'project') or die("Connection to the database is currently not possible");
if (isset($_POST['reg_user'])) /*isset($_POST()) allows the user to register with the system.*/
   {
    /*The data is recieved due to the users inputing the suggested values from the login/register forms.*/
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
    $email = mysqli_real_escape_string($db, $_POST['email']);

 /*The form will be validated to ensure that the user entered the correct details.*/
      if (empty($username)) { array_push($errors, "Needs a username"); }  /* (array_push()) is added to the matching $errors array to ensure an error checking occurs.*/
      if (empty($password_1)) { array_push($errors, "Needs a password"); }
      if ($password_1 != $password_2) 
      {	array_push($errors, "Passwords are not matching");
      }
	   /*The if statement allows for the error message to pop up on all fields based upon the data within the database.*/
      if (empty($email)) { array_push($errors, "Needs a email"); }
      
	  
	  /*A account should be created if a similar username or email is stored.*/
      $user_query = "SELECT * FROM accounts WHERE username= '$username' OR email= '$email' LIMIT 1";
      $result = mysqli_query($db,$user_query);
      $user_account = mysqli_fetch_assoc($result);
      
      if ($user_account) /* An if statement to highlight errors based upon the a existing account.*/
      {
        if ($user_account['username'] === $username)
        {
              array_push($error, "Use another username");
            }

        if ($user_account['email'] === $email) 
          {
              array_push($errors, "Use another email");
            }  /* The account is registered and stored within the database if no errors are found.*/
        }
        
      if (count($errors) == 0) 
      {
        $password = md5($password_1); /* Security is maintained as the passwords are all encrypted.*/
        $query = "INSERT INTO accounts (username, email, password) VALUES('$username', '$email', '$password')";
        echo $query;
        mysqli_query($db, $query);
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "The user logged on to the account";	
        header('location: menu.php'); /* The user is navigated to the menu page.*/
      } else {
        foreach ($errors as $value){ 
          echo $value;
        } 
      }
  }

if (isset($_POST['login_account']))  /*isset($_POST()) allows the user to l with the system.*/
   {
     $username = mysqli_real_escape_string($db, $_POST['username']);
     $password = mysqli_real_escape_string($db, $_POST['password_1']);
    if (empty($username))  /* An if statement that highlights the need to fill in all the fields given on the login form.*/
		{
  	      array_push($errors, "Needs a username");
        }
    if (empty($password)) 
	    {
  	      array_push($errors, "Needs a password");
        }
    if (count($errors) == 0) 
	   { 
  	     $password = md5($password);
  	     $query = "SELECT * FROM accounts WHERE username='$username' AND password='$password'";
  	     $results = mysqli_query($db, $query);
  	     if (mysqli_num_rows($results) == 1) 
		    {
          echo "logged in";
          echo $username;
  	          $_SESSION['username'] = $username;
  	          $_SESSION['success'] = "User has logged on to the account";
  	          header('location: menu.php');
  	        }
		else 
	    {
  		  echo "The username or password was incorrect";
  	    }
    } else {
      foreach ($errors as $value){ 
        echo $value;
      } 
    }
  }

/* The login and register forms details are stored in the database, a condition is set due to the if statetment which may result in an error message popping up. Based upon the database an error is displayed or navigates to the menu page.*/

?>

</body>
</html>