
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Ideal Events</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/bootstrap.css">
  <script src="../js/jquery.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
</head>
<body>
  <div class="container-fluid">
     <nav role="navigation" class="navbar navbar-default">
              <div class="navbar-header">
            <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand">Ideal Events</a>
        </div>
              <div id="navbarCollapse" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="index.php">Home</a></li>
                <li><a href="events.php">Events</a></li>
                <li><a href="category.php">Categories</a></li>
                <li><a href="location.php">Locations</a></li>
				       <li><a href="User.php">Users</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php if(isset($_SESSION['loginadmin']))
				{
					echo "<li><a>Welcome Dear ". $_SESSION['admin']."</a></li>";
					echo "<li><a href='logout.php'>Logout</a></li>";
				}
					else
					{
						echo "<li><a href='login.php'>Login</a></li>";
					}
				 ?>
			</ul>
        </div>
    </nav>