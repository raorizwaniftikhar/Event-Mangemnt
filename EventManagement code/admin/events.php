<?php 
session_start();
if (!isset($_SESSION['loginadmin']))
{
	header("Location: login.php");
}
if(isset($_GET['delete']))
{
	$id=$_GET['delete'];
	$conn=new mysqli("localhost","root","","events");
				if ($conn===false)
					{
						die("Connection failed".mysqli_connect_error());
					}
				if($conn->query("DELETE FROM events WHERE e_id='$id'")===true)
				{
					header("location events.php");
				}
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
				$result=$conn->query("SELECT * FROM events");
				?>
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
					<table class="table table-bordered">
					<?php
					if ($result->num_rows>0)
					{
					echo "<thead>";
					echo "<tr><th>ID</th><th>Event Name</th><th>Date</th><th>Location</th><th>Category</th><th>Action</th></tr>";
					echo "</thead>";
					echo "<tbody>";
					
						while ($row=$result->fetch_assoc())
						{
						echo "<tr><td>".$row["e_id"]."</td>";
						echo "<td>".$row["e_title"]."</td>";
						echo "<td>".$row["e_date"]."</td>";
						echo "<td>".$row["e_location"]."</td>";
						echo "<td>".$row["e_category"]."</td>";
						echo "<td><a href=?delete=".$row['e_id'].">Delete</a></td></tr>";
						}
					}
					else
					{
						echo "<thead>";
						echo "<tr><th>No records found</th></tr>";
						echo "</thead>";
						echo "<tbody>";
					}
					?>
					</tbody>
					</table>
					</div>
				</div>
			<?php require "footer.php"; ?>