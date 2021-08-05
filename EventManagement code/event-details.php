<?php 
session_start();
if(isset($_GET['eventid']))
{
	$eventid=$_GET['eventid'];
}
require "header.php";
?>

<br />
				<div class="row">
					<div class="col-lg-8">
					<div class="site-header"><h4 class="text-center">View Event Details</h4></div>	
					</div>
				</div>
				<?php
				$conn=new mysqli("localhost","root","","events");
				if ($conn===false)
					{
						die("Connection failed".mysqli_connect_error());
					}
				$result=$conn->query("SELECT * FROM events WHERE e_id='$eventid'");
				?>
				<div class="row">
					<?php
					if ($result->num_rows>0)
					{
					echo "<div class='col-md-8 col-md-offset-2'>";
					echo "<table class='table table-condensed'>";
					echo "<thead>";
					echo "</thead>";
					echo "<tbody>";
					
						while ($row=$result->fetch_assoc())
						{
						echo "<tr><th>Title:</th><td>".$row["e_title"]."</td></tr>";
						echo "<tr><th>Date:</th><td>".$row["e_date"]."</td></tr>";
						echo "<tr><th>Location:</th><td>".$row['e_location']."</td></tr>";
						echo "<tr><th>Category:</th><td>".$row['e_category']."</td></tr>";
						echo "<tr><th>Organizer:</th><td>".$row['e_organizer']."</td></tr>";
						echo "<tr><th>Description:</th><td>".$row['e_description']."</td></tr>";
						$title=$row['e_title'];
						$edate=$row['e_date'];
						}
					}
					
					echo "</tbody>";
					echo "</table>";
					echo "<a class='btn btn-primary' href='join-event.php?event=".$title."&edate=".$edate."'>Join this Event</a>";
					echo "</div>";
					?>
					
				</div>
			<?php require "footer.php"; ?>