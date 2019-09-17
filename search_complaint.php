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
<?php include 'menu.php';?>
<br>
<div class="content-wrapper">
    <div class="container-fluid">
     
<?php include "header.php";?>
    

      <!-- DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Search Complaint Section </div>
        <div class="card-body">
          <div class="table-responsive">
   <form id="form1" name="form1" method="post" action="">
  <div align="center">
    <table width="99%" border="1">
      <tr>
        <td width="33%" height="80"><center><a href = "search_complaint_by_date.php " style="color:blue;"><br><img src="includes/img/by_date3.png" width="100" height="120">
        <center><p> Search By Date</p></center>
        <div align="center"></div>
        </td>

      <td width="33%"><center><a href = "search_complaint_by_month.php" style="color:blue;" ><br><img src="includes/img/by_month.png" width="100" height="120">
      <center><p>Search By Month</p></center>
      <div align="center"></div>
      </td></td>

      <td width="33%"><center><a href = "search_complaint_by_year.php" style="color:blue;" ><br><img src="includes/img/by_year.png" width="100" height="120">
      <center><p>Search By Year</p></center>
      <div align="center"></div>
      </td></td>



      </tr>
      <tr>
        <td width="33%" height="80"><center><a href = "search_complaint_by_type.php " style="color:blue;"><br><img src="includes/img/type.png" width="100" height="120">
        <center><p> Search By Type</p></center>
        <div align="center"></div>
        </td>

      <td width="33%"><center><a href = "search_complaint_by_status.php" style="color:blue;" ><br><img src="includes/img/status2.png" width="100" height="120">
      <center><p>Search By Status</p></center>
      <div align="center"></div>
      </td></td>

      <td width="33%"><center><a href = "deleted_complaint.php" style="color:blue;" ><br><img src="includes/img/deleted.ico" width="100" height="120">
      <center><p>Deleted Complaint</p></center>
      <div align="center"></div>
      </td></td>



      </tr>
      
      </table>
  </div>
</form>





 
  

  </tr>



  </table>
 
 
          </div>
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
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.html">Logout</a>
          </div>
        </div>
      </div>
    </div>
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
