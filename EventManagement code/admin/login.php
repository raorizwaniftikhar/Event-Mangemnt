
<?php
session_start();
if(isset($_SESSION['loginadmin']))
{
	header("Location: index.php");
}
if (isset($_GET['login']))
{
	$username=$_POST['username'];
	$password=$_POST['password'];
	if(empty($username) OR empty($password))
	{
		
		echo"<script>alert('Please fill all fields')</script>";
	}
	else
	{
		
	
	
	$conn=new mysqli("localhost","root","","events");
				if ($conn===false)
					{
						die("Connection failed".mysqli_connect_error());
					}
				$result=$conn->query("SELECT * FROM admin WHERE ad_username='$username' AND ad_password='$password'");
				if($result->num_rows==1)
				{
						session_start();
						$_SESSION['loginadmin']="login";
						$_SESSION['admin']="$username";
						header("Location: index.php");
				}
				else
				{
					echo"<script>alert('username or password is wrong')</script>";
				}
					
}
}

require "header.php";
?>
				<div class="row">
							<form action="?login" method="post" class="form-horizontal" role="form">
								<div class="form-group form-group-sm">
										<label for="username" class="col-sm-2 control-label">Login</label>
												<div class="col-sm-4">
										<input type="text" class="form-control" name="username" placeholder="User Name">
												</div>
								</div>
								<div class="form-group form-group-sm">
										<label for="password" class="col-sm-2 control-label">Password</label>
												<div class="col-sm-4">
										<input type="password" class="form-control" name="password" placeholder="Password">
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
require "footer.php";
?>				