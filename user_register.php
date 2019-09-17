<?php include "connection.php" ?>

<!DOCTYPE html>
<html>
<head>
    <title>Cempaka CRMS</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
  <style>
body {
    background-image: url("includes/img/bgroung.png");
    background-size: cover;
   
}
</style>
<header>
    <div class="head">
      <a class="logo" href="index.php"><img src="includes/img/cempaka.jpg"></a>&nbsp;
      <div id="branding">
       <h1 style="color: white; "><span class="highlight">Cempaka CRMS</span></h1>
     
</header>
<div class="banner" style="padding-top:200px;">
<div class="container" style="width:900px; margin-top:-190px; padding-top:10px; padding-bottom:30px; padding-left:5px; padding-right:45px;">
    <div class="heading">
      <h2></h2>
      <p style="padding-top:5px; padding-bottom:-10px;">Register Yourself Here</p>
    </div> 
<form method="post" action="user_add.php">

  <div class="agile-form" style="margin-top:-20px; margin-left:10px; margin-right:10px;">
  <ul class="field-list">
    <fieldset>
      <legend> <p style="font-size:15px;text-transform:uppercase;margin:10px;padding-top:0px;"><b>Maklumat Pengguna</b></p></legend>        
      <p>
     

        <div class="input-group">
        <li> 
          <label class="form-label">
          <b> Matric Card </b>
          <span class="form-required"> * </span>
          </label>
          <div class="form-input username">
            <input type="text" name="username" placeholder="Your Matric Card" required>
          
          </span>
          
          </div>
        </li>
        </div> 

        <div class="input-group">  
        <li> 
          <label class="form-label">
            <b>Full Name<b>
          <span class="form-required"> * </span>
          </label>
          <div class="form-input name">
            <input type="text" name="name" placeholder="Your Full Name" required >
          </div>
        </li>
        </div>  

           <div class="input-group">  
        <li> 
          <label class="form-label">
           <b>Phone Number<b>
          <span class="form-required"> * </span>
          </label>
          <div class="form-input">
            <input type="text" name="no_tel" placeholder="Start with +60" required >
          </div>
        </li>
        </div> 

          <div class="input-group">  
        <li> 
          <label class="form-label">
           <b>Email Address<b>
          <span class="form-required"> * </span>
          </label>
          <div class="form-input">
            <input type="email" name="email" placeholder="Enter Your Email" required >
          </div>
        </li>
        </div> 
         <div class="input-group">  
        <li> 
          <label class="form-label">
           <b>Your Block<b>
          <span class="form-required"> * </span>
          </label>
          <div class="form-input">
            <input type="text" name="block" placeholder="e.g: K9B/2/2C" required >
          </div>
        </li>
        </div> 
      </p>
    

    
      <p>          
        <div class="input-group">
        <li>
          <label class="form-label">
            <b>Password</b>
          <span class="form-required"> * </span>
          </label>
          <div class="form-input">
            <input type="password" name="password" placeholder="" required>
          </div>
        </li>
        </div>

        <div class="input-group">
          <li>
            <label class="form-label">
              <b>Confirm Password</b>
            <span class="form-required"> * </span> 
            </label>
            <div class="form-input">
              <input type="password" name="password_2" placeholder="" required>
            </div>
          </li>
        </div>
      </p>
    </fieldset>
    </ul>
    <div class="input-group">
      <button type="submit" class="btn" name="submit" style="margin-top:5px; margin-left:44%;">DAFTAR</button> &nbsp <a style="text-transform:uppercase;" href="index.php">Log In</a></p>
    </div>
    
      
    </div>
    </form> 
    </div>
    </div>
  <footer>
      <p>Cempaka CRMS &copy; 2019 </p>
  </footer>
</body>
</html>
