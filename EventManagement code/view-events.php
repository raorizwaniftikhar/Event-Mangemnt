<?php
session_start();
include "header.php"
?>
				<div class="row">
					<h3 class="text-center">Please Choose a category</h3>
					<div class="col-md-6 col-md-offset-4">
												<table class="table table-condensed">
						<thead>
								<tr><th>Category Name</th></tr>
						</thead>
						<tbody>
						
						<?php
				$conn=new mysqli("localhost","root","","events");
				if ($conn===false)
					{
						die("Connection failed".mysqli_connect_error());
					}
				$result=$conn->query("SELECT * FROM category");
				
				if ($result->num_rows>0)
				{
					
					while ($row=$result->fetch_assoc())
						{
						echo "<tr><td><a href='search-events.php?catid=".$row['cat_name']."'>".$row['cat_name']."</a></td></tr>";
						}
					
				}
													
			?>
						</tbody>
						<tfoot>
						</tfoot>
						</table>
						</div>
					
				</div>
				<div class="row">
					<h3 class="text-center">Please Choose a Location</h3>
					<div class="col-md-6 col-md-offset-4">
												<table class="table table-condensed">
						<thead>
								<tr><th>Location Name</th></tr>
						</thead>
						<tbody>
						
						<?php
				$conn=new mysqli("localhost","root","","events");
				if ($conn===false)
					{
						die("Connection failed".mysqli_connect_error());
					}
				$result=$conn->query("SELECT * FROM location");
				
				if ($result->num_rows>0)
				{
					
					while ($row=$result->fetch_assoc())
						{
						echo "<tr><td><a href='search-events.php?locid=".$row['loc_name']."'>".$row['loc_name']."</a></td></tr>";
						}
					
				}
													
			?>
						</tbody>
						<tfoot>
						</tfoot>
						</table>
						</div>
					
				</div>
<?php include "footer.php"?>