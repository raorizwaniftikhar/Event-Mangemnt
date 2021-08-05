<?php 
require "header.php";
?>

<br />
				<div class="row">
					<div class="col-lg-8">
						<form action="login-form.php" class="form-horizontal" role="form">
								<div class="form-group form-group-sm">
										
										<label for="location" class="col-sm-4 control-label">Location Name:</label>
												<div class="col-sm-4">
										<input type="text" class="form-control" name="location" placeholder="Location Name">
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
				<div class="row">
					<div class="col-md-6 col-md-offset-4">
					<table class="table table-bordered">
					<thead>
					<tr><th>ID</th><th>Location Name</th><th>Action</th></tr>
					</thead>
					<tbody>
					<tr><td>1</td><td>Multan Sports Ground</td><td><a href="#">Delete</a></td></tr>
					</tbody>
					</table>
					</div>
				</div>
			<?php require "footer.php"; ?>