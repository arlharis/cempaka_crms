<?php

session_start();
if(isset($_SESSION['username'])){
    require 'connection.php';
    $username = $_SESSION['username'];
    $result = mysqli_query($link, 'SELECT * from administrator where username = "'.$username.'"');
    if(mysqli_num_rows($result)==1){
        $_SESSION['username'] = $username;
        //header('Location: homepage.php'); 
    }

}else{

    echo "<script type='text/javascript'> document.location = 'index.php';</script>";
}

?>



<!DOCTYPE html>
<html>
<head>
<?php
// default

 	$sQuery = sprintf("SELECT MAX(emergency_id) AS emergency_id FROM emergency WHERE  status = %s ", 1);
  	$stInfo = mysqli_query($link, $sQuery);
  	$row=$stInfo->fetch_assoc();
  	if ($row["emergency_id"]>1) {
  			$emergency_id=$row["emergency_id"] + 1;

  	}else{

  		$emergency_id=100;
  	}
  	/*
				$myfile = fopen("XXtransaction.txt","w");
				fwrite($myfile, $fellow_id);
				fclose($myfile);*/

	// sql to insert entry
	$sql2= "INSERT INTO emergency (emergency_id,name,contact_no,status)
	VALUES ('".$emergency_id."',
	'".$_POST['name']."',
	'".$_POST['contact_no']."','1')";
	if ($link->query($sql2) == TRUE) 
	{
	
		echo "<script> alert ('Emergency Contact is successfully Added!')</script>";
		 echo"<script>setTimeout(\"location.href='emergency_list.php';\",10);</script>";
  }
	
	else {

    echo "<script> alert('Adding Emergency Contact unseccessfully!')</script>";

	echo"<script>setTimeout(\"location.href='add_emergency_contact.php';\",10);</script>";
  }
	
	$link->close();	
?>

