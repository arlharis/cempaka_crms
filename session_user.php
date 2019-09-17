<?php
session_start();
include "connection.php";
if (!isset($_SESSION['user'])) 
	{
		header("location:index.php");
		
 		
 	}
 	else
 	{
       $sql=$link->query("SELECT * FROM user WHERE username='".$_SESSION['user']."'");
 	   $row=mysqli_fetch_array($sql);
 	   
 	}
 	
//$sql="SELECT * FROM user WHERE user_id=".$_SESSION['user'];
//$result=mysqli_query($conn,$sql);
//$row=mysqli_fetch_array($result); 
?>