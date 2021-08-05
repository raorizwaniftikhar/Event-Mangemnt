
<?php 
session_start();
if (!isset($_SESSION['loginadmin']))
{
	header("Location: login.php");
}

require "header.php";
?>


<?php
$cid = $_GET['u_id'];
$conn = mysql_connect("localhost", "root", "");
mysql_select_db("events", $conn);
$query = "SELECT * FROM users WHERE u_id=$cid";
$result = mysql_query($query);
$row = mysql_fetch_array($result);
?>

<div class="row">
							<form action="update.php" method="get" class="form-horizontal" role="form">
								<div class="form-group form-group-sm">
								<input type="hidden" name='fid' value=<?php echo $cid; ?> >
										<label for="username" class="col-sm-2 control-label">User Name</label>
												<div class="col-sm-4">
										<input type="text" class="form-control" name="u_name"  readonly="true" value=<?php echo $row["u_name"]; ?> >
												</div>
								</div>
								<div class="form-group form-group-sm">
										<label for="password" class="col-sm-2 control-label">Password</label>
												<div class="col-sm-4">
										<input type="password" class="form-control" name="u_password"  readonly="true" placeholder=<?php echo $row["u_password"]; ?>   >
												</div>
								</div>
								<div class="form-group form-group-sm">
										<label for="email" class="col-sm-2 control-label">Email</label>
												<div class="col-sm-4">
										<input type="email" class="form-control" name="u_email" value=<?php echo $row["u_email"]; ?> >
												</div>
								</div>
									<div class="form-group form-group-sm">
										<label for="address" class="col-sm-2 control-label">Address</label>
												<div class="col-sm-4">
										<input type="address" class="form-control" name="u_address" value=<?php echo $row["u_address"]; ?> >
												</div>
								</div>
								
								<div class="form-group form-group-sm">
										<label for="phoneno" class="col-sm-2 control-label">Phone number</label>
												<div class="col-sm-4">
										<input type="phoneno" name="u_phoneno"class="form-control"   value=<?php echo $row["u_phoneno"]; ?>>
												</div>
								</div>
								
								
								
								<div class="form-group form-group-sm">
										<label for="phoneno" class="col-sm-2 control-label">Status</label>
												<div class="col-sm-4">
										<input type="text" name="Status" class="form-control"  value=<?php echo $row["Status"]; ?>>
												</div>
								</div
										<div class="form-group">
											<div class="col-sm-offset-2 col-sm-4">
												<button type="submit" class="btn btn-primary"> Edit</button>
												<button type="reset" class="btn btn-primary"> Clear</button>
											</div>
											
											
											
										</div>
							</form>
				</div>
				<?php include "footer.php"?>








