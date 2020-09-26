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

<form method="post" action="video_backend.php" enctype="multipart/form-data">
<table border="2" style="padding:5px">

<tr>

<Td>Upload  Video</td></tr>

<Tr><td><input type="file" name="fileToUpload"/></td></tr>
<tr><td>

<input type="submit" value="Upload Video" name="upd"/>
<input type="submit" value="Display Video" name="disp"/><!-- The button is connected to a seperate php to complete the intended task, in this case browsing, uploading and viewing the videos.-->
</td></tr>

</table>
</form>
  
</body>
</html>