<?php 
session_start();
if (!isset($_SESSION['loginadmin']))
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
				$result=$conn->query("SELECT * FROM users");
				?>
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
					<table class="table table-bordered">
					<?php
					if ($result->num_rows>0)
					{
					echo "<thead>";
					echo "<tr><th>ID</th><th>Name</th><th>Address</th><th>Email</th><th>Phone No</th><th>Status</th><th>Action</th></tr>";
					echo "</thead>";
					echo "<tbody>";
					
						while ($row=$result->fetch_assoc())
						{
						echo "<tr><td>".$row["u_id"]."</td>";
						echo "<td>".$row["u_name"]."</td>";
						
						echo "<td>".$row["u_address"]."</td>";
						echo "<td>".$row["u_email"]."</td>";
                        echo "<td>".$row["u_phoneno"]."</td>";
						echo "<td>".$row["Status"]."</td>";
						
						echo "<td><a href='edit page.php?u_id=".$row["u_id"]."'>Edit</a></td></tr>";
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