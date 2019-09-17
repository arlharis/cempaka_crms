<?php
session_start();
if(isset($_POST['bttLogin'])){
	require 'connection.php';
	$username = $_POST['username'];
	$password = $_POST['password'];
	$result = mysqli_query($link, 'SELECT * from administrator where username = "'.$username.'" and password = "'.$password.'"');
	if(mysqli_num_rows($result)==1){
		$_SESSION['username'] = $username;
		header('Location: homepage.php?'); 
	}else
		echo "Account is invalid";
}

if(isset($_POST['logout'])){
	session_unregister('username');
    session_destroy();

}
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<meta charset="utf-8"  />
	<title>CRMS Login</title>
    <link rel="stylesheet" href="includes/css/login_style.css" />
</head>

<body>
	<form class="box" method="post" >
    <h1>Login</h1>
    <input type="text" name="username" placeholder="Username" />
    <input type="password" name="password" placeholder="Password" />
    <input type="submit" name="bttLogin" value="Login" />
    </form>
</body>
</html>