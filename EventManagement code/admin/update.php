

<?php
$cid = $_GET['fid'];
$conn = mysql_connect("localhost", "root", "");
mysql_select_db("events", $conn);
$u_name= $_GET['u_name'];

$u_email= $_GET['u_email'];
$u_address= $_GET['u_address'];
$u_phoneno= $_GET['u_phoneno'];
$Status= $_GET['Status'];


$query = mysql_query("update users SET u_name='$u_name',u_address='$u_address',u_email='$u_email',u_phoneno='$u_phoneno',Status='$Status' where u_id=$cid");

include("User.php");
/*
if(mysql_affected_rows() ) {
	echo"<b>";
print mysql_affected_rows()."th Row edit successfully";


}
*/
?>