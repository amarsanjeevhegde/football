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

<!--
Extra research was taken place in order to create a responsive calender with events, but unfortunatly i was not able to display and complete the task.
-->
<?php
$db = mysqli_connect('localhost', 'root', '', 'project') or die("Connection to the database is currently not possible");
$event = array();
$find_query = "SELECT * FROM events ORDER BY id";

$result = mysqli_query($db, $find_query);
$event_array = array();
while ($row = mysqli_fetch_assoc($result))
   {
      array_push($event_array, $row);
   }
  // The query is to serach for a event and retrieve it from the database.
mysqli_free_result($result);
mysqli_close($db);
echo json_encode($event_array);
?>

</body>
</html>