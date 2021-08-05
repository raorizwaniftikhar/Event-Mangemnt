<?php
session_start();
if (isset($_GET['event']))
{
if (isset($_SESSION['login']))
{
	$title=$_POST['title'];
	$category=$_POST['category'];
	$location=$_POST['location'];
	$edate=$_POST['edate'];
	$desc=$_POST['desc'];
	$organizer=$_POST['organizer'];
	$conn=new mysqli("localhost","root","","events");
				if ($conn===false)
					{
						die("Connection failed".mysqli_connect_error());
					}
				
				$result=$conn->query("SELECT * FROM events WHERE e_date='$edate' AND e_location='$location'");
				
					if ($result->num_rows>0)
					{
						$er="This location is not available on this date";
					}
					else
					{
				if($conn->query("INSERT INTO events(e_title,e_category,e_date,e_location,e_description,e_organizer) VALUES('$title','$category','$edate','$location','$desc','$organizer')")===true)
				{
					$info="Event Posted Successfully";
					header("location category.php");
				}
				}
	}
}



	


require "header.php";
?>
				<div class="row">
				<?php
						if(isset($info))
						{
								echo "<p class='bg-primary text-center'>Event Posted Successfully</p>";
						}
				if(isset($er))
				{
								echo "<p class='bg-danger text-center'>".$er."</p>";
				}
				if(!isset($_SESSION['login']))
				{
					echo "<p class='bg-danger text-center'>Please login or register to post events</p>";
				}
				else
				{			
			?>
<form action="?event=post" method="post" class="form-horizontal" role="form">
								<div class="form-group form-group-sm">
										<label for="title" class="col-sm-2 control-label">Event Title</label>
												<div class="col-sm-4">
										<input type="text" class="form-control" name="title" placeholder="Event Title" title="Event Title must must be of alphabets" required>
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
								echo "<option>".$row['cat_name']."</option>";
							}
					
					}
				?>
										</select>
												</div>
								</div>
								<div class="form-group form-group-sm">
										<label for="location" class="col-sm-2 control-label">Location</label>
												<div class="col-sm-4">
										<select class="form-control" name="location" required>
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
								echo "<option>".$row['loc_name']."</option>";
							}
					
					}
				?>
										</select>
												</div>
								</div>
								
								<div class="form-group form-group-sm">
										<label for="edate" class="col-sm-2 control-label">Date</label>
												<div class="col-sm-4
												
												
												
						<html lang="en">
<head>
  <meta charset="utf-8">
  <title>jQuery UI Datepicker - Default functionality</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script>
  $(function() {
    $( "#datepicker" ).datepicker();
  });
  </script>
</head>
<body>
 

 
 
					
						
										<input type="text" id="datepicker" class="form-control" name="edate" placeholder="Date in formate of yyyy/mm/dd" required>
										
										</body>
</html>	
										
										</div>
										</div>

										<input type="hidden" class="form-control" name="organizer" value="<?php echo $_SESSION['user'];?>">
								<div class="form-group form-group-sm">
										<label for="desc" class="col-sm-2 control-label">Description</label>
												<div class="col-sm-4">
										<input type="text" class="form-control" name="desc" placeholder="Event Description" required>
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