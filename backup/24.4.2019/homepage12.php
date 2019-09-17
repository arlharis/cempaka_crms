<?php


//echo 'Welcome '.$_SESSION['username'];
//echo '<br><a href="index.php?action=logout">Logout</a>';

?>



<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Cempaka CRMS</title>
<link rel="stylesheet" type="text/css" href="includes/css/menu_style.css">
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>

<body background="includes/img/bgroung.png">

<h1 style="text-align:center; margin:100px; height:1px"> Welcome To <span style="color:#990012 ; font-weight:bold">Cempaka CRMS</span>
</h1>
   
   <form class="box" method="post">
    <input type="button" value="logout" onClick="location.href='index.php?action=logout'" />
    </form>
    
    <div class="container">
    	<div class="box" onClick="location.href='complaint_main.php'">
        	<div class="icon"><i class="fa fa-book" aria-hidden="true"></i></div>
            <div class="content">
            <h3>Complaint Menu</h3>
            <p>- Complaint Record</p>
            <p>- Complaint Report</p>
            <p>- Reset Complaint</p>
            </div>
        </div>
        <div class="box" onClick="location.href='fellow_main.php'">
        	<div class="icon"><i class="fa fa-id-card-o" aria-hidden="true"></i></div>
            <div class="content">
            <h3>Fellow Menu</h3>
            <p>- Fellow Record</p>
            <p>- On-duty fellow</p>
            </div>
        </div>
        <div class="box" onClick="location.href='emergency_main.php'">
        	<div class="icon"><i class="fa fa-ambulance" aria-hidden="true"></i></div>
            <div class="content">
            <h3>Emergency Menu</h3>
            <p>- Emergency Record</p>
            <p>- Complaint Report</p>
            </div>
        </div>
    </div>
   
    
	  
   
       
      
     
    </span>
    </div>
</body>
</html>
