<?php
session_start();
require "header.php";
	$conn=new mysqli("localhost","root","","events");
				if ($conn===false)
					{
						die("Connection failed".mysqli_connect_error());
					}
	$eventid=$_SESSION['user'];
	$result=$conn->query("SELECT * FROM events WHERE e_organizer='$eventid' ORDER BY e_date DESC");
						if ($result->num_rows>0)
						{
							while ($row=$result->fetch_assoc())
							{
								$id=$row['e_id'];
								$title=$row['e_title'];
								$category=$row['e_category'];
								$location=$row['e_location'];
								$organizer=$row['e_organizer'];
								$description=$row['e_description'];
								$edate=$row['e_date'];
								
							}
						}
						
						
						else
						{
							$msg="You have not posted any event";
							echo "<p class='bg-primary text-center'>".$msg."</p>";
							
						}

if(isset($_GET['updateevent']))
{
	$id=$_GET['updateevent'];
	$title=$_POST['title'];
	$category=$_POST['category'];
	$location=$_POST['location'];
	$edate=$_POST['edate'];
	$user=$_POST['organizer'];
	$description=$_POST['desc'];
	$conn=new mysqli("localhost","root","","events");
				if ($conn===false)
					{
						die("Connection failed".mysqli_connect_error());
					}
				
					if($conn->query("UPDATE Events SET e_title='$title',e_category='$category',e_location='$location',e_date='$edate',e_organizer='$user',e_description='$description' WHERE e_id='$id'")===true)
					{
						$msg="Event updated successfully";
						echo "<p class='bg-primary text-center'>$msg</p>";
					}
						
}	


				if(!isset($_GET['editevent']))
				{
				$conn=new mysqli("localhost","root","","events");
				if ($conn===false)
					{
						die("Connection failed".mysqli_connect_error());
					}
				if (isset($_SESSION['login']))
				{
						$user=$_SESSION['user'];
						$result=$conn->query("SELECT * FROM events WHERE e_organizer='$user' ORDER BY e_date DESC");
						if ($result->num_rows==0)
						{
							$msg="You have not posted any event";
						}
							else	{
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
						echo "<a class='btn btn-primary col-md-offset-2' href='edit-events.php?editevent=".$row['e_id'] ."'>Edit Event</a>";
						echo "</div>";
						echo "</div>";
						echo "</div>";
						}
					echo "</div>";
				
				}
					
				}
}				
			?>
			<div class="row">
						<?php
						if(isset($msg))
						{
							"<p class='bg-primary text-center'>".$msg ."</p>";
						}
						
						?>
			</div>
			<?php if(isset($_GET['editevent']))
			{
				
			?>
				
			<form action="?updateevent=<?php echo $id ; ?>" method="post" class="form-horizontal" role="form">
								<div class="form-group form-group-sm">
										<label for="title" class="col-sm-2 control-label">Event Title</label>
												<div class="col-sm-4">
										<input type="text" class="form-control" name="title" value="<?php echo $title ; ?>" placeholder="Event Title">
												</div>
								</div>
								<div class="form-group form-group-sm">
										<label for="category" class="col-sm-2 control-label">Category</label>
												<div class="col-sm-4">
										<select class="form-control" name="category">
											<option selected disabled>Select Category</option>
											<?php
				$conn=new mysqli("localhost","root","","events");
				if ($conn===false)
					{
						die("Connection failed".mysqli_connect_error());
					}
				$result=$conn->query("SELECT * FROM category");
				
					if($result->num_rows>0)
					{
							while($row=$result->fetch_assoc())
							{
								$value=$row['cat_name'];
								
								echo "<option value='$value'"; if($category==$value){echo "selected='selected'";}echo">$value</option>";
							}
					
					}
				?>
										</select>
												</div>
								</div>
								<div class="form-group form-group-sm">
										<label for="location" class="col-sm-2 control-label">Location</label>
												<div class="col-sm-4">
										<select class="form-control" name="location">
											<option selected disabled>Select Location</option>
											<?php
				$conn=new mysqli("localhost","root","","events");
				if ($conn===false)
					{
						die("Connection failed".mysqli_connect_error());
					}
				$result=$conn->query("SELECT * FROM location");
				
					if($result->num_rows>0)
					{
							while($row=$result->fetch_assoc())
							{
								$value=$row['loc_name'];
								
								echo "<option value='$value'"; if($location==$value){echo "selected='selected'";}echo">$value</option>";
							}
					
					}
				?>
										</select>
												</div>
								</div>
								
								<div class="form-group form-group-sm">
										<label for="edate" class="col-sm-2 control-label">Date</label>
												<div class="col-sm-4">
										<input type="date-local" class="form-control" name="edate" value="<?php echo $edate ; ?>" placeholder="Date in formate of yyyy/mm/dd">
												</div>
								</div>
					
										<!--<label for="edate" class="col-sm-2 control-label">Organizer Name</label>-->
												
										<input type="hidden" class="form-control" name="organizer" value="<?php echo $_SESSION['user'] ;?>" >
												
								
								<div class="form-group form-group-sm">
										<label for="desc" class="col-sm-2 control-label">Description</label>
												<div class="col-sm-4">
										<input type="text" class="form-control" name="desc" value="<?php echo $description ; ?>" placeholder="Event Description">
												</div>
								</div>
								<div class="form-group">
											<div class="col-sm-offset-2 col-sm-4">
												<input type="submit" class="btn btn-primary" value="Submit" />
												<input type="reset" class="btn btn-primary" value="Reset" />
											</div>
										</div>
							</form>
				</div>
				
<?php
			}
require "footer.php";
?>				