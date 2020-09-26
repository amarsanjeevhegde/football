<!DOCTYPE html>

<html>
<head>

  <title>Preston F.C</title>
  <link rel="stylesheet" type="text/css" href="stylesheet.css">
  
</head>
<body>
<h1>Preston F.C</h1> <!-- The name of website, it also acts as the logo for it
<!-- This code acts as a link to various other pages, this allows for easy naviagation between relevant pages. -->
<ul>
<li><a href="menu.php">Home</a></li>
<li><a href="videos.php">Video</a></li>
<li><a href="profile.php">Profile</a></li>
<li><a href="comment.php">Comment</a></li>
<li><a href="timetable.php">Schedule</a></li>
<li><a href="login.php">Logout</a></li>
</ul>

<!--
Extra research was taken place in order to create a responsive calender with events, but unfortunatly i was not able to display and complete the task.
-->
<?php
$db = mysqli_connect('localhost', 'root', '', 'project') or die("Connection to the database is currently not possible");
$activity = isset($_POST['activity']) ? $_POST['activity'] : "";
$start_date = isset($_POST['start_date']) ? $_POST['start_date'] : "";
$finish_date = isset($_POST['finish_date']) ? $_POST['finish_date'] : "";
//The query allows the user to add events.
$add_query = "INSERT INTO events (activity, start_date, finish_date) VALUES ('".$activity."', '".$start_date."', '".$finish_date ."')";

$result = mysqli_query($db, $add_query);

if (!$result) 
{
    $result = mysqli_error($db);
}
?>

</body>
</html>