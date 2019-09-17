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
$getid=$_REQUEST["id"];
?>



<br>
<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="fellow_list.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">My Dashboard</li>
      </ol>
      
 
      <!-- Example DataTables Card-->
    
<div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i>Manage Fellow Information</div>
       <div class="container">

<br>
<form name="rekod" action="update_fellow_process.php?id=<?php echo $getid ?>" method="post">
<?php
$sql2="SELECT * FROM fellow WHERE fellow_id='$getid' ";
$result2=$link->query($sql2);
if ($result2->num_rows > 0)
{
 while($row = $result2->fetch_assoc())
 {
  echo "<table>
<table align=center width=100% width=120% cellspacing=4 cellpadding=4 border=3>
<td colspan=2 align=center><b></b><br>


<table border=1 style=width:100% cellspacing=0 cellpadding=6>
<tr>
<td style=width:10% ><strong>Fellow ID</strong></td><td style=width:50% ><strong>".$getid."</strong></td>
</tr>
</table>";?>
      
<table border=3 width=100% width=120% cellspacing=0 cellpadding=4>
<div style=background:#5A76F5>
<h4><center>Manage Fellow Information</center></h4></div>


<tr>
  <td>Fellow Name</td>
  <td><textarea class="form-control" type="textarea"  id="fellow_name" name="fellow_name" maxlength="250" rows="1"><?php echo "".$row["fellow_name"]."" ?></textarea></td>    
</tr>
<tr>
  <td>Contact Number</td>
  <td><textarea class="form-control" type="textarea"  id="contact_no" name="contact_no" maxlength="250" rows="1"><?php echo "".$row["contact_no"]."" ?></textarea></td>    
</tr>
<tr>
  <td>Block</td>
  <td><select name="block">
                <option value="K8A">K8A</option>
                <option value="K8B">K8B</option>
                <option value="K9A">K9A</option>
                <option value="K9B">K9B</option>
                <option value="K10A">K10A</option>
                <option value="K10B">K10B</option>
              </select>
  </td>    
</tr>
<?php 

    if($row["availability"]==1){

        $availability = 'Available';
    }else{

        $availability = 'Not Available';
    }

    if($row["on_duty"]==1){

        $on_duty = 'On-Duty';
    }else{

        $on_duty = 'Off-Duty';
    }

?>
<tr>
  <td>Availability
  <td><select name="availability">
  <option value="1">Available</option>
  <option value="0">Not Available</option>
  </select></td>
</tr>
<tr>
  <td>On-Duty
  <td><select name="on_duty">
  <option value="1">On-Duty</option>
  <option value="0">Off-Duty</option>
  </select></td>
</tr>


  <tr>
      <td colspan=2>
      <p align=center>
      <input type='submit' value="SUBMIT" name="cari" style=background:#5A76F5></input>

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
