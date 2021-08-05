<?php 
session_start();
require "header.php";
?>
<div id="myCarousel" class="carousel slide" data-ride="carousel">
  
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="images/1.jpg" alt="Chania">
    </div>
    <div class="item">
      <img src="images/2.jpg" alt="Chania">
    </div>
    <div class="item">
      <img src="images/3.jpg" alt="Flower">
    </div>
    <div class="item">
      <img src="images/4.jpg" alt="Flower">
    </div>
	<div class="item">
      <img src="images/5.jpg" alt="Flower">
    </div>
  </div>
  
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<br />
				
			<?php
				$conn=new mysqli("localhost","root","","events");
				if ($conn===false)
					{
						die("Connection failed".mysqli_connect_error());
					}
				$result=$conn->query("SELECT * FROM events ORDER BY e_date ASC LIMIT 8");
				if ($result->num_rows>0)
				{
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
						echo "</div>";
						echo "</div>";
						echo "</div>";
						}
					echo "</div>";
				}
													
			?>
				
				
			<?php require "footer.php"; ?>