<?php
  include "session-admin.php";
?>

<?php
  include "connection.php";
?>


<?php


	// sql to insert entry
		$a=$_GET['id'];
		$name=$_POST["name"];
		$contact_no=$_POST["contact_no"];
		

		$sql7= "UPDATE emergency SET name='".$name."', contact_no='".$contact_no."' WHERE emergency_id='".$a."'";
	if ($link->query($sql7)== TRUE) 
	{
			echo"<script>alert('Update Successfully.')</script>";
        	echo"<script>setTimeout(\"location.href='emergency_list.php';\",10);</script>";
		
	}
	else
	{
		echo"<script>alert('Update Unsuccessfully! Try Again.')</script>";
        echo"<script>setTimeout(\"location.href='update_emergency_contact.php?id=".$a."';\",10);</script>";
	} 
	$link->close();	
?>
