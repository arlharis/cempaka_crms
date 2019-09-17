<?php
session_start();
if(isset($_SESSION['username'])){
    require 'connection.php';
    $username = $_SESSION['username'];
    $result = mysqli_query($link, 'SELECT * from administrator where username = "'.$username.'"');
    if(mysqli_num_rows($result)==1){
        $_SESSION['username'] = $username;
        //header('Location: homepage.php'); 
    }

}else{

    echo "<script type='text/javascript'> document.location = 'index.php';</script>";
}

?>



<?php

include "connection.php";

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Cempaka CRMS</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="includes/css/sb-admin.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
<?php
include 'menu.php';
?>





<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="fellow.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Add Cempaka Fellow</li>
      </ol>
      
         

      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Add Fellow</div>
       <div class="container">
        <div class="col-md-15">
           <div class="form-area">  
              <form role="form" form name="complaint" action="add_fellow_process.php"  onsubmit="return validate_form();" method="post">
                 <br style="clear:both">
                    <h4 style="margin-bottom: 25px; text-align: center;">Fill In All The Form</h4>
          <div class="form-group">
          <label for="fellow_name">Fellow Name</label>
            <input type="text" class="form-control" id="fellow_name" name="fellow_name" placeholder="Full Name">
          </div>
          <div class="form-group">
          <label for="contact_no">Contact Number</label>
            <input type="text" class="form-control" id="contact_no" name="contact_no" placeholder="Contact Number">
          </div>

          <div class="form-group">
            <label for="block">Block</label>
              <select name="fellow_block">
                <option value="K8A">K8A</option>
                <option value="K8B">K8B</option>
                <option value="K9A">K9A</option>
                <option value="K9B">K9B</option>
                <option value="K10A">K10A</option>
                <option value="K10B">K10B</option>
              </select>
          </div>

            
       <button type="submit" id="submit" name="submit" class="btn btn-primary pull-right"><strong>SUBMIT</strong></button>
        </form><br>
    </div>
</div>
</div>
        </div>
  
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Cempaka CRMS - Copyright © 2019</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
  
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
  </div>
</body>

</html>
