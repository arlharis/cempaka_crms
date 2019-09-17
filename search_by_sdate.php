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


<style type="text/css">
        table, td, th {
    border: 1px solid black;
        }

.table {
    border-collapse: collapse;
    width: 90%;
    background-color: white;
    }
    .tbody {
    height: 100px;       /* Just for the demo          */
    overflow-y: auto;    /* Trigger vertical scroll    */
    overflow-x: hidden;  /* Hide the horizontal scroll */
}

th {
    height: 50px;
    text-align: center;
    background-color: #2ECC71;
    color: white;
    }
@td{
    text-align: center;
}

    </style>

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
          <a href="search_complaint_by_soc.php">Back</a>
        </li>
        <li class="breadcrumb-item active">My Dashboard</li>
      </ol>
      <!-- Icon Cards-->
      
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Search Complaint </div>
 <?php

$action=$_POST['action'];
$old=$_POST['date'];
$new=date("d-m-Y",strtotime($old));
$old2=$_POST['date2'];
$new2=date("d-m-Y",strtotime($old2));


?>


<h2><center>Based On Date <h6 style="color:black"><?php echo $new ?> To <?php echo $new2 ?></h6></center></h2>



<?php

if($action=='All'){
      $sql="SELECT * FROM complaint WHERE dated BETWEEN '".$_POST['date']."' AND '".$_POST['date2']."' AND complaint_type='Social' AND status=1 ORDER BY dated DESC";
      $result=$link->query($sql);
      if($result->num_rows>0)
      {
          echo "<div class=card mb-3>
              <div class=card-header>
                <i class=fa fa-table></i> Complaint List </div>
              <div class=card-body>
               
                  

                <div class=table-responsive>
                  <table class=table table-bordered id=dataTable width=100% cellspacing=0>

          <thead>
          <tr>
          <th>Complaint No.</th>
          <th>Resident Name</th>
          <th>Matric Number</th>
          <th>Block</th>
          <th>Complaint Type</th>
          <th>Complaint Report</>
          <th>Complaint Date</th>
          <th>Complaint Feedback</th>
          <th>Finished Date</th>
          <th>Complaint Status</th>
          <th>Action</th> 
          </tr></thead>


           ";


      while($row = $result->fetch_assoc())
      {

      echo"

          <tr>
          <td>".$row["complaint_id"]."</td>
          <td>".$row["name"]."</td>
          <td>".$row["username"]."</td>
          <td>".$row["block"]."</td>
          <td>".$row["complaint_type"]."</td>
          <td>".$row["complaint_report"]."</td>
          <td>".$row["dated"]."</td>
       
          <td>".$row["feedback_report"]."</td>
          <td>".$row["finish_dated"]."</td>
          <td>".$row["action"]."</td>
          <td>&nbsp
          <a href='update_complaint.php?id=".$row["complaint_id"]."'><img src=includes/img/edit.png width=25 height=25></a>&nbsp
          <a href='delete_complaint_process.php?id=".$row["complaint_id"]."'><img src=includes/img/deleted.ico width=25 height=25></a>
          </td>

          </tr>
      ";
      }


      echo"</table>";


      }

      else
      {

           echo "<script> alert('No records found!')</script>";
           echo"<script>setTimeout(\"location.href='search_complaint_by_soc.php';\",1);</script>";
      }


}else{

      $sql="SELECT * FROM complaint WHERE dated BETWEEN '".$_POST['date']."' AND '".$_POST['date2']."' AND action='".$_POST['action']."' AND complaint_type='Social' AND status=1 ORDER BY dated DESC";
      $result=$link->query($sql);
      if($result->num_rows>0)
      {
          echo "<div class=card mb-3>
              <div class=card-header>
                <i class=fa fa-table></i> Complaint List </div>
              <div class=card-body>
               
                  

                <div class=table-responsive>
                  <table class=table table-bordered id=dataTable width=100% cellspacing=0>

          <thead>
          <tr>
          <th>Complaint No.</th>
          <th>Resident Name</th>
          <th>Matric Number</th>
          <th>Block</th>
          <th>Complaint Type</th>
          <th>Complaint Report</>
          <th>Complaint Date</th>
          <th>Complaint Feedback</th>
          <th>Complaint Solved</th>
          <th>Complaint Status</th>
          <th>Action</th> 
          </tr></thead>


           ";


      while($row = $result->fetch_assoc())
      {

      echo"

          <tr>
          <td>".$row["complaint_id"]."</td>
          <td>".$row["name"]."</td>
          <td>".$row["username"]."</td>
          <td>".$row["block"]."</td>
          <td>".$row["complaint_type"]."</td>
          <td>".$row["complaint_report"]."</td>
          <td>".$row["dated"]."</td>
       
          <td>".$row["feedback_report"]."</td>
          <td>".$row["finish_dated"]."</td>
          <td>".$row["action"]."</td>
          <td>&nbsp
          <a href='update_complaint.php?id=".$row["complaint_id"]."'><img src=includes/img/edit.png width=25 height=25></a>&nbsp
          <a href='delete_complaint_process.php?id=".$row["complaint_id"]."'><img src=includes/img/deleted.ico width=25 height=25></a>
          </td>

          </tr>
      ";
      }


      echo"</table>";


      }

      else
      {

           echo "<script> alert('No records found!')</script>";
           echo"<script>setTimeout(\"location.href='search_complaint_by_soc.php';\",1);</script>";
      }
}

?>






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
