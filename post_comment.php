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
<?php

// mysqli_connect('localhost', 'root', 'root', 'project');
//mysqli_select_db("comments");
/*A connection to the database was created, if the connection is not possible than a error message should pop up.*/
$db = mysqli_connect('localhost', 'root', '', 'project') or die("Connection to the database is currently not possible");

$sender_name = $_POST["sender_name"];
$comment = $_POST["comment"];

$comment_size = strlen($comment);
if($comment_size > 1000)
{
	header("location: comment.php?error=1");//comment and sender name is stored in the database. displayed on the web page. A character limit was set.
}	
else
{
	echo "enters post comment";
	 mysqli_query($db, "INSERT INTO comments (sender_name, comment) VALUES('$sender_name', '$comment')");
	 //header("location: comment.php");
}
?>

</body>
</html>