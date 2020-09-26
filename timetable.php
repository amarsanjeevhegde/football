<!--
Extra research was taken place in order to create a responsive calender with events, but unfortunatly i was not able to display and complete the task.
-->

<!DOCTYPE html>
<html>

<head>
  <title> Preston F.C </title>
  <link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>

<script>
/*W3school, phppot and codexworld was referenced in order to create a calender which acts as a timetable, but in the end it result in a failure as the system was to complex for me. Advance knowlege of the javascript, ajax and jquery is reuired in order to complete the task.
$(document).ready(function () 
 
{
	var timetable = $('#timetable').fulltimetable(
	{
        edit: true,
        events: "find_event.php",
        Event_Time: false,
        eventRfinish_dateer: function (event, element, view) 
		{
            if (event.days === 'true') 
			{
                event.days = true;
            } else {
                event.days = false;
            }
        },

        edit: true,
        eventDrop: function (event, delta) 
		{
                    var start_date = $.fulltimetable.formatDate(event.start_date, "Y-MM-DD HH:mm:ss");
                    var finish_date = $.fulltimetable.formatDate(event.finish_date, "Y-MM-DD HH:mm:ss");
                    $.single_timetable(
					{
                        url: 'edit_event.php',
                        data: 'activity=' + event.activity + '&start_date=' + start_date + '&finish_date=' + finish_date + '&id=' + event.id,
                        type: "POST",
                        success: function (output) {
                            message("Event is updated");
                        }
                    });
                },
				
				        select: true,
        select_Helper: true,
        select: function (start_date, finish_date, days) 
		{
            var activity = prompt('Current activity:');

            if (activity)
				{
                var start_date = $.fulltimetable.formatDate(start_date, "Y-MM-DD HH:mm:ss");
                var finish_date = $.fulltimetable.formatDate(finish_date, "Y-MM-DD HH:mm:ss");

                $.single_timetable({
                    url: 'add_event.php',
                    data: 'activity=' + activity + '&start_date=' + start_date + '&finish_date=' + finish_date,
                    type: "POST",
                    success: function (data) 
					{
                        message("Event is added");
                    }
                });
                timetable.fulltimetable('event_type',
                        {
                            activity: activity,
                            start_date: start_date,
                            finish_date: finish_date,
                            Days: Days
                        },
                true
                        );
            }
            timetable.fulltimetable('unselect');
        },
        
				
        eventClick: function (event) 
		{
            var deleteMsg = confirm("Do you really want to delete?");
            if (deleteMsg) {
                $.ajax({
                    type: "POST",
                    url: "del_event.php",
                    data: "&id=" + event.id,
                    success: function (output)
					{
                        if(parseInt(output) > 0) 
						{
                            $('#timetable').fulltimetable('removeEvents', event.id);
                            message("Event is deleted");
                        }
                    }
                });
            }
        }

    });
});
//an notification is displayed based upon what the user entered on the database.
function message(message) {
	    $(".output").html("<div'event is edited'>"+message+"</div>");
    setInterval(function() { $(".event is edited").fadeOut(); }, 2000);
}
 */
</script>

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

<h1>Timetable</h1>

<div class= "output"> </div>
<div class= "event" id= "timetable"> </div>

</body>
</html>

