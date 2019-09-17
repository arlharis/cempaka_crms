<?php
session_start();
include "connection.php";
if (!isset($_SESSION['admin'])) 
	{
 		header("location:index.php");
 	}
 	else
 	{
         $sql=$link->query("SELECT * FROM user WHERE username='".$_SESSION['admin']."'");
 	      $row=mysqli_fetch_array($sql);
 	      /*
 	      if (!$check1_res) {
    		printf("Error: %s\n", mysqli_error($link));
    			exit();
			}*/
 	} 
?>