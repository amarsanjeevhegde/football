<!DOCTYPE html>
<html>

<head>
  <title>Preston F.C</title
<link rel="stylesheet" type="text/css" href="stylesheet.css">
<style>
body {
  font-family: verdana;
  color: #026c45; 
  background: #92CD00; 
}
ul {
  list-style-type: none; 
  text-align: center;
  font-family: verdana;
  padding: 100px; 
}

li{
  font-family: verdana;
  border-left: 5px solid #026c45;
  display: inline;
  padding: 15px; 
}
</style>

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


  <div class="header">
  	<h2>Comment</h2>
  </div>

<form method="post"  action="post_comment.php">
  	<div class="container">
  	  <label>Name</label>
  	  <input type="text" name="sender_name">
  	</div>
	
	<div>
  	  <label>comment</label>
  	  <input type="comment" name="comment"  size="25">
  	</div>

  	<div>
  	  <button type="submit" name="sub_comm" class="btn" >Submit</button>
  	</div>

</form>

<?php
/*A connection to the database was created, if the connection is not possible than a error message should pop up.*/

$db = mysqli_connect('localhost', 'root', '', 'project') or die("Connection to the database is currently not possible");

//mysqli_select_db("comments");

$search_comments =	mysqli_query($db, "SELECT * FROM comments");
while($row = mysqli_fetch_assoc($search_comments))
{
	$sender_name = $row['sender_name'];
	$comment = $row['comment'];
	
	echo "$sender_name - $comment<p>";
}
//The name and comment is stored in the database, which will be retrived from the database and displayed on the web page.
if(isset($_GET['error']))
{
	echo "<p>1000 character limit";	
}
?>

</body>
</html>