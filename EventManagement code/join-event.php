<?php
	session_start();
	if(isset($_SESSION['login']))
	{
		if(isset($_GET['event']))
		{
					$event=$_GET['event'];
					$edate=$_GET['edate'];
					$organizer=$_SESSION['user'];
					$conn=new mysqli("localhost","root","","events");
				if ($conn===false)
					{
						die("Connection failed".mysqli_connect_error());
					}
				$result=$conn->query("SELECT * FROM Events WHERE e_organizer='".$_SESSION['user']."' AND e_date='$edate'");
				$res=$conn->query("SELECT * FROM participants WHERE p_name='$organizer'AND p_date='$edate'");
				if($result->num_rows>0)
				{
					$msg="You are already organizing an event on this date.";
				}
				elseif($result->num_rows>0)
				{
					$msg="You are already joining an event on this date";
				}
				else
				{
				
					if($conn->query("INSERT INTO participants(p_name,p_event) VALUES('$organizer','$event')"))
					{
						$msg="You are joining this event";
					}
				}		
		}
	}
	else
	{
		$msg="Please Login or Register to join this event";
	}
	include "header.php";
?>
				<div class="row">
								<p class="bg-primary text-center"><?php echo $msg ?></p>
				</div>
	<?php include "footer.php";?>			