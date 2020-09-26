<!DOCTYPE html>

<html>
<head>

  <title>Preston F.C</title>
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
<!-- An error message is displayed based upon the set condtion on the server.php.-->

<?php  if (count($errors) > 0) : ?>
  <div class="error">
  	<?php foreach ($errors as $error) : ?>
  	  <p><?php echo $error ?></p>
  	<?php endforeach ?>
  </div>
<?php  endif ?>

</body>
</html>