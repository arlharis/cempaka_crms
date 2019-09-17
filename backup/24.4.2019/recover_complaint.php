<?php
  include "session-admin.php";
?>

<?php
  include "connection.php";
?>
<?php

	// sql to insert entry
	$a=$_GET['id'];

		$sql3= "UPDATE complaint SET status='1' WHERE complaint_id='$a'";
	if ($link->query($sql3)== TRUE) 
	{
			echo"<script>alert('Successfully Restore.')</script>";
        	echo"<script>setTimeout(\"location.href='deleted_complaint.php';\",10);</script>";
		
	}
	else
	{
		echo"<script>alert('Unsuccessfully Restore.')</script>";
        echo"<script>setTimeout(\"location.href='deleted_complaint.php?';\",10);</script>";
	} 
	$link->close();	
?>
