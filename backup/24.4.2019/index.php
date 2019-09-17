<?php
include "connection.php"
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<meta charset="utf-8"  />
	<title>CRMS Login</title>
    <link rel="stylesheet" href="includes/css/login_style.css" />
</head>
<header>
      <div id="branding">
        <center><h1><span class="highlight">Welcome To Cempaka CRMS</span></h1></center>
      </div>
     
    </div>
</header>
<body>
	<form class="box" method="post" action="login_process.php">
    <h1>Login</h1>
    <input type="text" name="username" placeholder="Matric Number" />
    <input type="password" name="password" placeholder="Password" />
    <input type="submit" name="bttLogin" value="Login" />
    <center><h3><a href= user_register.php style="color: white;">REGISTER HERE!</a><br></h3>
    </form>
</body>
</html>