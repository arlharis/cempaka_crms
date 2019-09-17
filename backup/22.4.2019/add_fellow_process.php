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

 	$sQuery = sprintf("SELECT MAX(fellow_id) AS fellow_id FROM fellow WHERE  status = %s ", 1);
  	$stInfo = mysqli_query($link, $sQuery);
  	$row=$stInfo->fetch_assoc();
  	if ($row["fellow_id"]>1) {
  			$fellow_id=$row["fellow_id"] + 1;

  	}else{

  		$fellow_id=2500;
  	}
  	/*
				$myfile = fopen("XXtransaction.txt","w");
				fwrite($myfile, $fellow_id);
				fclose($myfile);*/

	// sql to insert entry
	$sql2= "INSERT INTO fellow (fellow_id,fellow_name,contact_no,fellow_block,availability,on_duty,status)
	VALUES ('".$fellow_id."',
	'".$_POST['fellow_name']."',
	'".$_POST['contact_no']."',
	'".$_POST['fellow_block']."',
	'1','0','1')";
	if ($link->query($sql2) == TRUE) 
	{
	
		echo "<script> alert ('New Fellow is successfully Added!')</script>";
		 echo"<script>setTimeout(\"location.href='fellow.php';\",10);</script>";
  }
	
	else {

    echo "<script> alert('Adding Fellow Process unseccessfully!')</script>";

	echo"<script>setTimeout(\"location.href='fellow.php';\",10);</script>";
  }
	
	$link->close();	
?>

