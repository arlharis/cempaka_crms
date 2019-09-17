<?php
  include "session-admin.php";
?>

<?php
  include "connection.php";
?>


<?php


	// sql to insert entry
	$a=$_GET['id'];
		$action=$_POST["action"];
		$finish_dated=$_POST["finish_dated"];
		$feedback_report=$_POST["feedback_report"];

		$sql3= "UPDATE complaint SET action='".$action."', finish_dated='".$finish_dated."', feedback_report='".$feedback_report."' WHERE complaint_id='$a'";
	if ($link->query($sql3)== TRUE) 
	{
			echo"<script>alert('Complaint Update Successfully.')</script>";
        	echo"<script>setTimeout(\"location.href='all_complaint.php';\",100);</script>";
		
	}
	else
	{
		echo"<script>alert('Complaint Update Unsuccessfully! Try Again.')</script>";
        echo"<script>setTimeout(\"location.href='update_complaint.php?id=".$a."';\",100);</script>";
	} 
	$link->close();	
?>
