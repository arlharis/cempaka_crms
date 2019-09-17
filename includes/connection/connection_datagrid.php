<?php

$hostname_myConn = "localhost";
//$database_myConn = "id8514774_cempaka_crms";
$username_myConn = "id8514774_cempakacrms";
$password_myConn = "garena126089";
//echo "you are at kretam\includes\connection\connections.php <br>";
$link = mysqli_connect($hostname_myConn,$username_myConn,$password_myConn,$database_myConn);

// Check connection
if (mysqli_connect_errno())
  {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  exit();
  }
//$myConn = @mysqli_connect($hostname_myConn, $username_myConn, $password_myConn) or trigger_error(mysql_error(),E_USER_ERROR); 


?>