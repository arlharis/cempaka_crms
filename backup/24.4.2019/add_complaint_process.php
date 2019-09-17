<?php
	include "session-admin.php";
?>

<?php
	include "connection.php";
?>




<!DOCTYPE html>
<html>
<head>
<?php
// default

 	$sQuery = sprintf("SELECT MAX(complaint_id) AS complaint_id FROM complaint WHERE  status = %s ", 1);
  	$stInfo = mysqli_query($link, $sQuery);
  	$row=$stInfo->fetch_assoc();
  	if ($row["complaint_id"]>1) {
  			$complaint_id=$row["complaint_id"] + 1;

  	}else{

  		$complaint_id=1000;
  	}

	// sql to insert entry
	$sql2= "INSERT INTO complaint (complaint_id,complaint_type,username,name,dated,block,complaint_report,action,status)
	VALUES ('".$complaint_id."',
	'".$_POST['complaint_type']."',
	'".$_POST['username']."',
	'".$_POST['name']."',
	'".$_POST['dated']."',
	'".$_POST['block']."',
	'".$_POST['complaint_report']."','In Process',
	'1')";
	if ($link->query($sql2) == TRUE) 
	{
	
		echo "<script> alert ('aduan telah direkod!')</script>";
		 echo"<script>setTimeout(\"location.href='complaint.php';\",1000);</script>";
  }
	
	else {

    echo "<script> alert('aduan tidak berjaya direkod!')</script>";

	echo"<script>setTimeout(\"location.href='complaint.php';\",1000);</script>";
  }
	
	$link->close();	
?>

