<?php
	include "connection.php";

		$username=$_POST["username"];
		$password=$_POST["password"];

		//prevent dr hack(sql injection)
		$username=stripslashes($username);
		$password=stripslashes($password);
		$username=mysqli_real_escape_string($link,$username);
		$password=mysqli_real_escape_string($link,$password);
		

		$sql="SELECT * FROM user WHERE username='$username'";
		$result=mysqli_query($link,$sql);
		$row=mysqli_fetch_array($result);
		$count=mysqli_num_rows($result);

		if ($count==1) 
		{
			 
			
				if ($row['password']==$password) 
				{
					if ($row['role']=="USER") 
					{
						session_start();
						$_SESSION['user']=$row['username'];
						header("location:user_homepage.php");
					}
					else if ($row['role']=="ADMIN") 
					{
						session_start();
						$_SESSION['admin']=$row['username'];
						header("location:homepage.php");
					}
					
				}
				else
				{
					echo "<script>alert('Password is Incorrect! Please Input the CORRECT PASSWORD.')</script>";
			
					echo "<script>setTimeout(\"location.href='index.php';\",100);</script>";
				}
				
			
			
		}
		else
		{
			echo "<script>alert('Matric Number is not register yet. Please Register first.')</script>";
			
			echo "<script>setTimeout(\"location.href='user_register.php';\",100);</script>";
		}

		

		
?>