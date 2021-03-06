<?php
  include "session-admin.php";
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

<br>
<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="search_complaint_by_type.php">Search Complaint</a>
        </li>
        <li class="breadcrumb-item active">By Facilities</li>
      </ol>
      <!-- Icon Cards-->
      
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Search Complaint </div>
  <body bgcolor="#FFFFFF">
<form name="carian" action="search_by_fdate.php" method="post">
<table align="center" width=80% width="100%" cellspacing="4" cellpadding="4" border="3">
    <tr>
        <td colspan="2" align="center"><b>SEARCH FOR FACILITIES COMPLAINT</b><br><br>
           <p align="left" valign="top" width="50%"><center>Choose status :&nbsp;&nbsp; 
            <select name="action">
            <option value="All">All</option>
            <option value="In Process">In Process</option>
            <option value="Done">Done</option>
            </select>&nbsp;&nbsp;&nbsp; 
            Choose a date :&nbsp;&nbsp; <input type="date" value="" name="date" size="20">&nbsp;&nbsp; TO &nbsp;&nbsp;  <input type="date" value="" name="date2" size="20"></center></p><br>
           <input type="submit" value="Search" name="search">
        </td>  
    </tr>
    
 
</table>
</form>
<br>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Cempaka CRMS Copyright © 2019</small>
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
    <script src="includes/js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="includes/js/sb-admin-datatables.min.js"></script>
  </div>
</body>

</html>
