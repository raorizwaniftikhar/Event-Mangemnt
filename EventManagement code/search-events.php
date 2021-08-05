<?php
session_start();
if(isset($_GET['catid']))
{
	$category=$_GET['catid'];
}
if(isset($_GET['keyword']))
{
	$key=$_POST['keyword'];
}
if(isset($_GET['locid']))
{
	$locid=$_GET['locid'];
}
require "header.php";
?>
				<div class="row">
							<form method="post" action="?keyword" class="navbar-form navbar-left" role="search">
								<div class="form-group control-group">
									<div class="col-md-4">
									<input type="text" class="form-control" name="keyword" placeholder="Search by Keywords" required>
									</div>
								</div>
										<input type="submit" class="btn btn-primary" value="Search" />
							</form>
				</div>
				<?php
				$conn=new mysqli("localhost","root","","events");
				if ($conn===false)
					{
						die("Connection failed".mysqli_connect_error());
					}
				if (isset($category))
				{
						$result=$conn->query("SELECT * FROM events WHERE e_category='$category' ORDER BY e_date DESC");
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
				}
				elseif (isset($key))
				{
						$result=$conn->query("SELECT * FROM events WHERE e_title LIKE '%$key%' ORDER BY e_date DESC");
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
				}
				elseif (isset($locid))
				{
						$result=$conn->query("SELECT * FROM events WHERE e_location='$locid' ORDER BY e_date DESC");
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
				}
				
				
													
			?>
				
<?php
require "footer.php";
?>				