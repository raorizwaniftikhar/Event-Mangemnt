<?php 
session_start();
if(!isset($_SESSION['loginadmin']))
{
	header("Location: login.php");
}
	require "header.php";
?>

<br />
				<?php
				$conn=new mysqli("localhost","root","","events");
				if ($conn===false)
					{
						die("Connection failed".mysqli_connect_error());
					}
				$result=$conn->query("SELECT * FROM events ORDER BY e_date DESC");
				if ($result->num_rows>0)
				{
					echo "<div class='row'>";
					while ($row=$result->fetch_assoc())
						{
						echo "<div class='col-md-3'>";
						echo "<div class='panel panel-info'>";
						echo "<div class='panel-heading'>";
						echo "<h5>".$row['e_title']."</h5>";
						echo "<small>".$row['e_date']."</small>";
						echo "</div>";
						echo "<div class='panel panel-body'>";
						echo "<p>".$row['e_description']."</p>";
						echo "</div>";
						echo "<div class='panel-footer'>";
						echo "<a class='btn btn-primary' href='event-details.php?eventid=".$row['e_id'] ."'>View Details</a>";
						echo "</div>";
						echo "</div>";
						echo "</div>";
						}
					echo "</div>";
				}
													
			?>
				
				
			
			<?php require "footer.php"; ?>