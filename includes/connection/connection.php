<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$hostname_myConn = "localhost";
$database_myConn = "id8514774_cempaka_crms";
$username_myConn = "id8514774_cempakacrms";
$password_myConn = "garena126089";
//echo "you are at kretam\includes\connection\connections.php <br>";
$link = mysqli_connect($hostname_myConn,$username_myConn,$password_myConn,$database_myConn);

//define('DB_SERVER', 'localhost');
//define('DB_USERNAME', 'root');
//define('DB_PASSWORD', 'admin');
//define('DB_NAME', 'id8514774_cempaka_crms');
 
/* Attempt to connect to MySQL database */
//$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>