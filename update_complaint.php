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
$getid=$_GET["id"];
?>



<br>
<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="all_complaint.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">My Dashboard</li>
      </ol>
      
 
      <!-- Example DataTables Card-->
    
<div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i>Complaint Feedback</div>
       <div class="container">

<br>
<form name="rekod" action="update_complaint_process.php?id=<?php echo $getid ?>" method="post">
<?php
$sql2="SELECT * FROM complaint WHERE complaint_id='$getid' ";
$result2=$link->query($sql2);
if ($result2->num_rows > 0)
{
 while($row = $result2->fetch_assoc())
 {
  echo "<table>
<table align=center width=100% width=120% cellspacing=4 cellpadding=4 border=3>
<td colspan=2 align=center><b>REKOD ADUAN PENGGUNA</b><br>


<table border=1 style=width:100% cellspacing=0 cellpadding=6>
<tr>
<td>Complaint ID</td><td>".$getid."</td>
</tr>


<tr>
<td>Matric Number</td><td><output name = 'username' >".$row["username"]."</output></td>
</tr>


<tr>
<td>Full Name</td><td>".$row["name"]."</td>
</tr>
       

<div style=background:#5A76F5>
<h4>COMPLAINT DETAILS</center></h4></div>


  <tr>
  <td>Block </td>
  <td>".$row["block"]."</td>      
  </tr>

  <tr>
  <td>Complaint Date</td>
  <td>".$row["dated"]."</td>      
  </tr>

  <tr>
  <td>Complaint Type</td>
  <td>".$row["complaint_type"]."</td>      
  </tr>

  <tr>
  <td>Complaint Report</td>
  <td>".$row["complaint_report"]."</td>      
  </tr>

  
 </table>";?>
       


<table border=3 width=100% width=120% cellspacing=0 cellpadding=4>
<div style=background:#5A76F5>
<h4>COMPLAINT UPDATE</center></h4></div>



<tr>
  <td>Status
  <td><select name="action">
  <option value="In Process">In Process</option>
  <option value="Done">Done</option>
  </select></td></tr>
  

  <tr>
    <td>Date</td>
    <td><input type="date" name="finish_dated" > </p> </td>
  </tr>
<tr>
  <td>Complaint Report</td>
  <td><textarea class="form-control" type="textarea"  id="feedback_report" name="feedback_report" maxlength="250" rows="5"><?php echo "".$row["feedback_report"]."" ?></textarea></td>    
</tr>
<tr hidden=true>
  <td><textarea type="text"  id="username" name="username"><?php echo "".$row["username"]."" ?></textarea></td>    
</tr>


  <tr>
      <td colspan=2>
      <p align=center>
      <input type='submit' value="SUBMIT" name="cari"></input>

  </tr>
 
</table>
</form>

  

<?php
 }
 echo "</table>";
}
?>



</div>
</div>
       
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © 2018</small>
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
