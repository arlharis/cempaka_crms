
<?php
  include "session-admin.php";
?>

<?php
  include "connection.php";
?>

<?php


	// sql to insert entry
		$a=$_GET['id'];
		$fellow_name=$_POST["fellow_name"];
		$contact_no=$_POST["contact_no"];
		$fellow_block=$_POST["block"];
		$availability=$_POST["availability"];
		$on_duty=$_POST["on_duty"];

		$sql7= "UPDATE fellow SET fellow_name='".$fellow_name."', contact_no='".$contact_no."', fellow_block='".$fellow_block."', availability='".$availability."', on_duty='".$on_duty."' WHERE fellow_id='".$a."'";
	if ($link->query($sql7)== TRUE) 
	{
			echo"<script>alert('Update Successfully.')</script>";
        	echo"<script>setTimeout(\"location.href='fellow_list.php';\",10);</script>";
		
	}
	else
	{
		echo"<script>alert('Update Unsuccessfully! Try Again.')</script>";
        echo"<script>setTimeout(\"location.href='update_fellow.php?id=".$a."';\",10);</script>";
	} 
	$link->close();	
?>
