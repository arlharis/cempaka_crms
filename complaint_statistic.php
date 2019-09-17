<?php
include "session-admin.php";
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
  <!-- Custom styles for this template-->
  <link href="includes/css/sb-admin.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="includes/css/morris.css">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
 <?php

include 'menu.php';

 ?>
       <div class="content-wrapper">
    <div class="container-fluid">
     
<br>
     
<?php include "header.php"; ?>
      <!-- Area Chart Example-->
      <div class="card mb-3">
      <div class="card-header">
        Monthly Complaint Statistic
      </div>
      <?php
      $monthly_statistic='';
      $monthly=$link->query("SELECT COUNT(complaint_id) AS count , MONTHNAME(dated) AS month FROM complaint WHERE YEAR(dated)=YEAR(now()) GROUP BY YEAR(complaint_id),MONTH(dated)");
      while($rmonthly=mysqli_fetch_array($monthly))
      {
        $monthly_statistic.="{month:'".$rmonthly["month"]."',count:'".$rmonthly["count"]."'},";
      }
      $monthly_statistic=substr($monthly_statistic, 0, -1);
      ?>
              <div class="card-body">
                <div class=" form-group row bg-transparent " style="width: 40%;">
                  <form class="form-inline">
                  <div class="form-group"><label class="col-auto col-form-label col-form-label-lg">Year</label>
                      <select id="selectyear" name="year" class="form-control">
                        <script>
                          var myDate = new Date();
                          var year = myDate.getFullYear();
                          document.write('<option value="'+year+'" selected>'+year+'</option>');
                          for(var i = 2018; i < year+1; i++)
                          {
                                document.write('<option value="'+i+'">'+i+'</option>');
                          }
                        </script>
                      </select></div>
                  </form>
                </div>
                <div id="grafarea" style="width:100%"></div>
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
    <!-- Custom scripts for all pages-->
    <script src="includes/js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="includes/js/raphael.js"></script>
    <script src="includes/js/morris.min.js"></script>
    <script>
    var graf=Morris.Bar({
    element : 'grafarea',
    data:[<?php echo $monthly_statistic;?>],
    xkey:'month',
    ykeys:['count'],
    labels:['Total Complaint'],
    hideHover:'auto',
    barColors:['#004C99'],
    stacked:true
    });
   $('#selectyear').on('change',function()
    {
      var selectyear=this.value;
      alert(selectyear);
      $.ajax
      ({
        url:"complaint_statistic_data.php",
        data:{"selectyear":selectyear},
        method:"GET",
        success:function(response){
          //alert(response);
          if (response!="") 
          {
            graf.setData(response);
          }
          else
          {
            //alert("no data!!!");
            $("#grafarea").html("<h1><center>--NO RECORD--</center></h1>");
            setTimeout(function(){ location.reload(); }, 1000);
          }
        }
      });
    });


    </script>
  </div>
</body>

</html>
