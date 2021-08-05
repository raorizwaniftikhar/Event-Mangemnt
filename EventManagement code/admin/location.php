<?php 
session_start();
if(!isset($_SESSION['loginadmin']))
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
				if($conn->query("DELETE FROM location WHERE loc_id='$id'")===true)
				{
					header("location location.php");
				}
}
if(isset($_GET['add']))
{
	$loc_name=$_POST['location_name'];
	$conn=new mysqli("localhost","root","","events");
				if ($conn===false)
					{
						die("Connection failed".mysqli_connect_error());
					}
				if($conn->query("INSERT INTO location(loc_name,loc_status) VALUES('$loc_name','Available')")===true)
				{
					header("location location.php");
				}
}
if(isset($_GET['changestatus']))
{
	$loc_id=$_GET['changestatus'];
	$loc_status=$_GET['status'];
	$conn=new mysqli("localhost","root","","events");
				if ($conn===false)
					{
						die("Connection failed".mysqli_connect_error());
					}
		if($loc_status=="Available")
		{
					
				if($conn->query("UPDATE location SET loc_status='NA' WHERE loc_status='Available' AND loc_id='$loc_id'")===true)
				{
					header("location location.php");
				}
		}
		elseif($loc_status=="NA")
		{
					
				if($conn->query("UPDATE location SET loc_status='Available' WHERE loc_status='NA' AND loc_id='$loc_id'")===true)
				{
					header("location location.php");
				}
		}
}

require "header.php";
?>

<br />
				<div class="row">
					<div class="site-header"><h1 class="text-center">Add/Remove Locations</div>
					<div class="col-lg-8">
						<form action="?add=1" method="post" class="form-horizontal" role="form">
								<div class="form-group form-group-sm">
										<label for="locaton_name" class="col-sm-4 control-label">Location Name:</label>
												<div class="col-sm-4">
										<input type="text" class="form-control" name="location_name" placeholder="Location Name">
												</div>
								</div>
								<div class="form-group">
											<div class="col-sm-offset-4 col-sm-4">
												<input type="submit" class="btn btn-primary" value="Add" />
												<input type="reset" class="btn btn-primary" value="Reset" />
											</div>
										</div>
							</form>
					</div>
				</div>
				<?php
				$conn=new mysqli("localhost","root","","events");
				if ($conn===false)
					{
						die("Connection failed".mysqli_connect_error());
					}
				$result=$conn->query("SELECT * FROM location");
				?>
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
					<table class="table table-bordered">
					<?php
					if ($result->num_rows>0)
					{
					echo "<thead>";
					echo "<tr><th>ID</th><th>Category Name</th><th>Status</th></tr>";
					echo "</thead>";
					echo "<tbody>";
					
						while ($row=$result->fetch_assoc())
						{
						echo "<tr><td>".$row["loc_id"]."</td>";
						echo "<td>".$row["loc_name"]."</td>";
						echo "<td><a href=?delete=".$row['loc_id'].">Delete</a></td></tr>";
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