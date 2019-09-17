<?php

include "connection.php";

//sql to insert entry

$check = $link->query ("SELECT username FROM user WHERE username='".$_POST['username']."'");

if($check->num_rows==1)

{
	echo "<script> alert ('This username has been registered')</script>";
	
}


else

{
	$sql = "INSERT INTO user (username,name,no_tel,email,block,password,role,status) VALUES 

	('".$_POST['username']."',
	'".$_POST['name']."',
	'".$_POST['no_tel']."',
	'".$_POST['email']."',
	'".$_POST['block']."',
	'".$_POST['password']."', 'USER', '1')";


	if ($link->query($sql) == TRUE)


	{
		echo"<script>alert('Register Successfully.')</script>";
        echo"<script>setTimeout(\"location.href='index.php';\",10);</script>";

	}


	else

	{
		echo "<script> alert ('Unsucssfully Register, Try Again!)</script>";
		 echo"<script>setTimeout(\"location.href='user_register.php';\",10);</script>";
	}
}


$link->close();

?>