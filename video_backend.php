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

<?php

error_reporting(1);
/*A connection to the database was created, if the connection is not possible than a error message should pop up.*/
$db = mysqli_connect('localhost', 'root', '', 'project') or die("Connection to the database is currently not possible");

extract($_POST);
$target_dir = "test_upload/";

$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

if($upd)
{
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);//The web page will be able to support the video file type as stated below, a error message is displayed if a wrong file is chosen or a notification is given if uploaded successfully.

if($imageFileType != "mp4" && $imageFileType != "avi" && $imageFileType != "mov" && $imageFileType != "3gp" && $imageFileType != "mpeg")
{
    echo "File Format Not Suppoted";
} 

else
{

$video_path=$_FILES['fileToUpload']['name'];
$find_query1 = "insert into video(video_name) values('$video_path')";

$result1 = mysqli_query($db, $find_query1);

move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$target_file);

echo "uploaded ";//The folder of videos were stored in the root directory where all the project files are stored.

}

}

//display all uploaded video

if($disp)

{

// $query=mysql_query("select * from video");

$find_query = "select * from video";

$result = mysqli_query($db, $find_query);

foreach ($result as $row):

?>
	 
	 <video width="300" height="200" controls>
	<source src="test_upload/<?php echo $row['video_name']; ?>" type="video/mp4">
	</video> 
	
	<?php endforeach; } ?>
	
</body>
</html>