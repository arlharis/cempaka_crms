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
  <meta name="format-detection" content="telephone=no">
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
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">My Dashboard</li>
      </ol>
 
     
  <center><h1 style="">REGISTERED USER LIST</h1></center>

<?php
  $sql="SELECT * FROM user WHERE role='USER' AND status='1'";
  $res=$link->query($sql);
  if ($res->num_rows>0) 
  {
      echo "
        <div class=card mb-3>
        <div class=card-header>
        <i class=fa fa-table></i><strong> Complaint List </strong></div>
        <div class=card-body>
        <div class=table-responsive>

      <table class=table table-bordered id=dataTable width=100% cellspacing=0>
        <thead>
                        <tr>
                            <th>Matric No.</th>
                            <th>Resident Name</th>
                            <th>Email</th>
                            <th>Contact Number</th>
                            <th>Block</> 
                            <th>Action</th>
                        </tr>
                        </thead>
                    
<tbody>
                        ";
                        while ($row=$res->fetch_assoc()) 
                        {
                          //$old=$row["dated"];
                          //$new=strtotime($old);
                          //$old1=$row["tarikh_aduan_siap"];
                          //$new1=strtotime($old1);
                          //$datediff=$new1-$new;
                           echo"
                          <tr>
  <td><center>".$row["username"]."</center></a></td>
    <td><center>".$row["name"]."</center></td>
  <td><center>".$row["email"]."</center></td>
  <td><center><a href='tel:".$row["no_tel"]."'>".$row["no_tel"]."</a></center></td>
  <td><center>".$row["block"]."</center></td>
  <td><center><a href='update_user.php?id=".$row["username"]."'><img src=includes/img/edit.png width=25 height=25></a>&nbsp
      <a href='delete_user.php?id=".$row["username"]."'><img src=includes/img/deleted.ico width=25 height=25></center></a>
  </td>
                      
                           </tr>
                  
                           ";
                        }

                        echo " <?php }?>
              </tbody>
            </table>";
                    }
                    else
                    {
                        echo"<center><table>
                        <thead>
                        <tr>
                            <th>Matric No.</th>
                            <th>Resident Name</th>
                            <th>Email</th>
                            <th>Contact Number</th>
                            <th>Block</> 
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><center>No Record</center></td>
                            <td><center>No Record</center></td>
                            <td><center>No Record</center></td>
                            <td><center>No Record</center></td>
                            <td><center>No Record</center></td>
                            <td></td>
                        </tr>
              
                        ";
                        echo " <?php }?>
              </tbody>
            </table></center> ";
                   }
                    $link->close();
?>


<br>
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
    <script src="includes/js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="includes/js/sb-admin-datatables.min.js"></script>
  </div>
</body>

</html>
