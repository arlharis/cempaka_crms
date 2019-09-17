<?php
  include "session-admin.php";
?>

<?php
  include "connection.php";
?>

<?php

	// sql to insert entry
	$a=$_GET['id'];

		$sql3= "UPDATE fellow SET status='0' ";
	if ($link->query($sql3)== TRUE) 
	{
			echo"<script>alert('Successfully Reset.')</script>";
        	echo"<script>setTimeout(\"location.href='homepage.php';\",1000);</script>";
		
	}
	else
	{
		echo"<script>alert('Unsuccessfully Reset.')</script>";
        echo"<script>setTimeout(\"location.href='homepage.php?';\",1000);</script>";
	} 
	$link->close();	
?>
