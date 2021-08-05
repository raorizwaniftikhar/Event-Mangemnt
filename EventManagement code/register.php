<?php
if (isset($_GET['reg']))
{
	
	$username=$_POST['username'];
	$password=$_POST['password'];
	$email=$_POST['email'];
	$address=$_POST['address'];
	$phoneno=$_POST['phoneno'];
	$conn=new mysqli("localhost","root","","events");
				if ($conn===false)
					{
						die("Connection failed".mysqli_connect_error());
					}
				if(!preg_match("/[\D]+/",$username))
				{
					$msg="Username should only contain alphabets";
				}
				elseif(empty($password))
				{
					$msg="Password should not be empty";
				}
				else
				{
					if($conn->query("INSERT INTO users(u_name,u_password,u_email,u_address,u_phoneno) VALUES('$username','$password','$email','$address','$phoneno')")===true)
					{
					
					$msg="User created successfully";
					
					}
					else
					{
						$msg="Username already exits";
					}
				}
}
include "header.php"
?>
				<?php if (isset($msg))
				{
						
								echo "<p class='bg-primary text-center'>".$msg."</p>";
							
				}
				?>
				<div class="row">
							<form action="?reg=yes" method="post" class="form-horizontal" role="form">
								<div class="form-group form-group-sm">
										<label for="username" class="col-sm-2 control-label">User Name</label>
												<div class="col-sm-4">
										<input type="text" class="form-control" name="username" placeholder="Username"  title="Username must be of 10 alphabets" required>
												</div>
								</div>
								<div class="form-group form-group-sm">
										<label for="password" class="col-sm-2 control-label">Password</label>
												<div class="col-sm-4">
										<input type="password" class="form-control" name="password" placeholder="Password" required>
												</div>
								</div>
								<div class="form-group form-group-sm">
										<label for="email" class="col-sm-2 control-label">Email</label>
												<div class="col-sm-4">
										<input type="email" class="form-control" name="email" placeholder="Email" required>
												</div>
								</div>
									<div class="form-group form-group-sm">
										<label for="address" class="col-sm-2 control-label">Address</label>
												<div class="col-sm-4">
										<input type="address" class="form-control" name="address" placeholder="address" required>
												</div>
								</div>
								
								<div class="form-group form-group-sm">
										<label for="phoneno" class="col-sm-2 control-label">Phone number</label>
												<div class="col-sm-4">
										<input type="phoneno" name="phoneno" class="form-control" value="" pattern=[0-9]{11} title="Phone number must be of 11 characters" required>
												</div>
								</div>
								
										<div class="form-group">
											<div class="col-sm-offset-2 col-sm-4">
												<button type="submit" class="btn btn-primary"> Register</button>
												<button type="reset" class="btn btn-primary"> Clear</button>
											</div>
											
											
											
										</div>
							</form>
				</div>
				<?php include "footer.php"?>