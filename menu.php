<!DOCTYPE html>

<html>
<head> 

  <title>Preston F.C</title>

<?php
session_start();

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

<h1>Preston F.C</h1> <!-- The name of website, it also acts as the logo for it.-->

<!-- This code acts as a link to various other pages, this allows for easy naviagation between relevant pages. -->
<ul>
<li><a href="menu.php">Home</a></li>
<li><a href="videos.php">Video</a></li>
<li><a href="profile.php">Profile</a></li>
<li><a href="comment.php">Comment</a></li>
<li><a href="timetable.php">Schedule</a></li>
<li><a href="login.php">Logout</a></li>
</ul>

  <div class="container">
  <div class="header">
  	<h2>Menu</h2>
  </div>
  
<!--This code allows the user to view notification message, when the user is navigated to the home/menu page. -->
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
	

<!-- The user is logged on to the system, their basic information is retrived from the database and displayed on this page. -->

  <?php  if (isset($_SESSION['username'])) : ?>
    	<p> Welcome <?php echo $_SESSION['username']; ?> to Preston F.C official website, where the users can chat with each other, for example- players can interact with their trainers or peers easily.
        Users can share and view videos easily, access their timetable or basic information and finally, users can access their profiles to changes their basic information like username, password and email.</p>
  <?php endif ?>
</div>

<!-- This code allows for an static image banner to be displayed on the webpage, the . -->
	<?php
         $banner_1 = '<a href="Football_URL" target="_blank"> <img src="football.jpg" alt="Football_ALT" title="Football" style="width: 500px" ></a>';
         $banner_2 = '<a href="Players_URL" target="_blank"> <img src="players.jpg" alt="Players_ALT" title="Players" style="width: 500px" ></a>';
         $banner_3 = '<a href="Training_URL" target="_blank"> <img src="training.jpg" alt="Training_ALT" title="Training" style="width: 500px" ></a>';
         $banner_4 = '<a href="Matches_URL" target="_blank"> <img src="matches.jpg" alt="Matches" title="Matches" style="width: 500px" ></a>';
         $banners = array($banner_1, $banner_2, $banner_3, $banner_4);
         shuffle($banners);
    ?>
	<!-- The shuffle($banner) allows for random images to pop up when ever the user goes to the home page. -->
	
	<div>
         <?php print $banners[0] ?>
    <div>

</body>
</html>