
<?php
	include "session-admin.php";
	include "connection.php";



	// sql to insert entry
	$a=$_GET['id'];

		$sql3= "UPDATE fellow SET status='0' WHERE fellow_id='$a'";
	if ($link->query($sql3)== TRUE) 
	{
			echo"<script>alert('Successfully Deleted.')</script>";
        	echo"<script>setTimeout(\"location.href='fellow_list.php';\",10);</script>";
		
	}
	else
	{
		echo"<script>alert('Unsuccessfully deleted.')</script>";
        echo"<script>setTimeout(\"location.href='fellow_list.php?';\",10);</script>";
	} 
	$link->close();	
?>
