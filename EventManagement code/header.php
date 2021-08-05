
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Ideal Events</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/formvalid.js"></script>

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
                <li><a href="view-events.php">View Events</a></li>
                <li><a href="post-event.php">Post Event</a></li>
                <li><a href="search-events.php">Search Events</a></li>
				<?php if(isset($_SESSION['login']))
				{
					echo "<li><a href='edit-events.php'>Edit Events</a></li>";
				}
				 ?>
            </ul>
            <ul class="nav navbar-nav navbar-right">
				<?php if(isset($_SESSION['login']))
				{
					echo "<li><a>Welcome Dear ". $_SESSION['user']."</a></li>";
					echo "<li><a href='logout.php'>Logout</a></li>";
				}
					else
					{
						echo "<li><a href='login.php'>Login</a></li>";
						echo "<li><a href='register.php'>Register</a></li>";
					}
				 ?>
				
                		
				
            </ul>
        </div>
    </nav>