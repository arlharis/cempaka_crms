<?php
	include "session_user.php";
?>

<?php
	include "connection.php";
?>




<!DOCTYPE html>
<html>
<head>
<?php
// default

	$id = $_SESSION["user"];

 	$sQuery = sprintf("SELECT MAX(complaint_id) AS complaint_id FROM complaint WHERE  status = %s ", 1);
  	$stInfo = mysqli_query($link, $sQuery);
  	$row2=$stInfo->fetch_assoc();
  	if ($row2["complaint_id"]>1) {
  			$complaint_id=$row2["complaint_id"] + 1;

  	}else{

  		$complaint_id=1000;
  	}

  	$sQuery1 = sprintf("SELECT * FROM user WHERE username=".$id." AND  status = %s ", 1);
  	$stInfo1 = mysqli_query($link, $sQuery1);
  
  	  
  	while($user_row2 = mysqli_fetch_array($stInfo1)){
	// sql to insert entry
	$sql2= "INSERT INTO complaint (complaint_id,complaint_type,username,name,dated,block,complaint_report,action,status)
	VALUES ('".$complaint_id."',
	'".$_POST['complaint_type']."',
	'".$id."',
	'".$user_row2["name"]."',
	'".$_POST['dated']."',
	'".$_POST["block"]."',
	'".$_POST['complaint_report']."','In Process',
	'1')";
	
      
     /* $myfile = fopen("check.txt","w");
      fwrite($myfile, $sql2);
      fclose($myfile);*/
      
	if ($link->query($sql2) == TRUE) 
	{
	
		echo "<script> alert ('Complaint Report Sent!')</script>";
		 echo"<script>setTimeout(\"location.href='user_complaint.php';\",1000);</script>";
  }
	
	else {

    echo "<script> alert('Unsuccessfully Lodge Complaint, Try Again!')</script>";

	echo"<script>setTimeout(\"location.href='user_complaint.php';\",1000);</script>";
  }
	
	$link->close();	
}
?>

