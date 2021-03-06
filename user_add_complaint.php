<?php
  include "session_user.php";
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
include 'user_menu.php';
?>





<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="user_complaint.php">Back</a>
        </li>
        <li class="breadcrumb-item active">Create Complaint</li>
      </ol>
           
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Add Complaint</div>
       <div class="container">
        <div class="col-md-15">
           <div class="form-area">  
              <form role="form" form name="complaint" action="user_add_complaint_process.php?"  onsubmit="return validate_form();" method="post">
                 <br style="clear:both">
                    <h4 style="margin-bottom: 25px; text-align: center;">Fill In All The Complaint Form</h4>
          <div class="form-group">
          <label for="username">Complainer Matric Number</label>
            <output type="text" class="form-control" name="username">
              <?php  
                $sQuery1 = sprintf("SELECT * FROM user WHERE  username = ".$row["username"]." AND status = %s ", 1);
                $user = mysqli_query($link, $sQuery1); 
                while($user_row = mysqli_fetch_array($user))
                  { 
                    echo $user_row["username"]; 
                  } 
              ?>
           </output>
          </div>
          <div class="form-group">
          <label for="name">Complainer Name</label>
              <output type="text" class="form-control" name="name">
                <?php  
                  $sQuery2 = sprintf("SELECT * FROM user WHERE  username = ".$row["username"]." AND status = %s ", 1);
                  $user1 = mysqli_query($link, $sQuery2); 
                  while($user_row1 = mysqli_fetch_array($user1))
                    { 
                      echo $user_row1["name"]; 
                    } 
                ?>      
              </output>
          </div>
          <div class="form-group">
            <label for="block">Venue</label>
              <textarea type="textarea" class="form-control" name="block" rows="1" placeholder="Venue" required>
                <?php  
                  $sQuery3 = sprintf("SELECT * FROM user WHERE  username = ".$row["username"]." AND status = %s ", 1);
                  $user2 = mysqli_query($link, $sQuery3); 

                  /*
      $myfile = fopen("check.txt","w");
      fwrite($myfile, $sQuery3);
      fclose($myfile);*/
                  while($user_row2 = mysqli_fetch_array($user2))
                    { 
                      echo $user_row2["block"]; 
                    } 
                ?>      
              </textarea>
          </div>
          <div class="form-group">
               <div class="form-group">
              <label for="dated">Complaint Date</label>
            <input type="date" class="form-control" id="dated" name="dated" placeholder="Complaint Date" required>
          </div>

          <?php
                $sQuery = sprintf("SELECT * FROM complaint_code WHERE  status = %s ", 1);
                //$stInfo = sqlQuery($sQuery, $database_myConn, $link);
                $stInfo = mysqli_query($link, $sQuery);
          ?>
          <div class="form-group">
            <label for="complaint_type">Complaint Type</label>
              <select name="complaint_type" id="complaint_type" class="select-field" style="font-size: 13; font-style: oblique;">
                <?php
                   echo '<option value="">-SELECT-</option>';
                   while($row = mysqli_fetch_array($stInfo))
                   {
                     echo "<option value='".$row["complaint_type"]."'";
                     echo ">";
                     echo $row["complaint_type"];
                    }

                    //echo "</select>";
                    mysqli_close($link);
                ?>
              </select>
          </div>
          <div class="form-group">
            <label for="complaint_report">Complaint Report</label>
                <textarea class="form-control" type="textarea"  id="complaint_report" name="complaint_report" maxlength="250" rows="7"></textarea>                        
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
