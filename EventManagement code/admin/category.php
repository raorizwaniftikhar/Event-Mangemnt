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
				if($conn->query("DELETE FROM category WHERE cat_id='$id'")===true)
				{
					header("location category.php");
				}
}
if(isset($_GET['add']))
{
	$catname=$_POST['category'];
	$conn=new mysqli("localhost","root","","events");
				if ($conn===false)
					{
						die("Connection failed".mysqli_connect_error());
					}
				if($conn->query("INSERT INTO category(cat_name) VALUES('$catname')")===true)
				{
					header("location category.php");
				}
}

require "header.php";
?>

<br />
				<div class="row">
					<div class="site-header"><h1 class="text-center">Add/Remove Categories</div>
					<div class="col-lg-8">
						<form action="?add=1" method="post" class="form-horizontal" role="form">
								<div class="form-group form-group-sm">
										<label for="category" class="col-sm-4 control-label">Category Name:</label>
												<div class="col-sm-4">
										<input type="text" class="form-control" name="category" placeholder="Category Name">
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
				$result=$conn->query("SELECT * FROM category");
				?>
				<div class="row">
					<div class="col-md-6 col-md-offset-4">
					<table class="table table-bordered">
					<?php
					if ($result->num_rows>0)
					{
					echo "<thead>";
					echo "<tr><th>ID</th><th>Category Name</th><th>Action</th></tr>";
					echo "</thead>";
					echo "<tbody>";
					
						while ($row=$result->fetch_assoc())
						{
						echo "<tr><td>".$row["cat_id"]."</td>";
						echo "<td>".$row["cat_name"]."</td>";
						echo "<td><a href=?delete=".$row['cat_id'].">Delete</a></td></tr>";
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