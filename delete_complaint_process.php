<?php
	include "session-admin.php";
	include "connection.php";


	// sql to insert entry
	$a=$_GET['id'];

		$sql3= "UPDATE complaint SET status='0' WHERE complaint_id='$a'";
	if ($link->query($sql3)== TRUE) 
	{
			echo"<script>alert('Successfully Deleted.')</script>";
        	echo"<script>setTimeout(\"location.href='all_complaint.php';\",10);</script>";
		
	}
	else
	{
		echo"<script>alert('Unsuccessfully deleted.')</script>";
        echo"<script>setTimeout(\"location.href='all_complaint.php?';\",10);</script>";
	} 
	$link->close();	
?>
