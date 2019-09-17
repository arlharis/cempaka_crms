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
          <a href="fellow.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">My Dashboard</li>
      </ol>


      <!-- Example DataTables Card-->
     




<style>
  .button {
    background-color: #008CBA; /* blue */
    border: none;
    color: white;
    padding: 10px 30px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
}
</style>




<div style="margin-top:70px; padding:10px; background-color:#FCFCFC" class="formDisplay">    
    
    <div style="padding:25px; margin-top:50px;"> 
      <div class="menu_selection" style="height:100px;">
        <center></center>
          
        <div class="key_input">
          <br><br>
            Are You Sure You Want To Reset ?
          &nbsp;
            <input name="my_ikey" id="my_ikey" type="text" size="3" style="text-align:center;">
            
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             <strong>Y</strong>  - To confirm 
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             <strong>00</strong> - To cancel / back <br>   
             
             <div id="wait" style=" display:none; width: 250px; height: 250px; position:absolute; bottom:210px; left:480px;">
              <img src="closing_month/wait.gif" width="250" height="250" alt="Waiting..." />
            </div>
        </div>
          
            <!--<div id="wait" style="display: none; width: 100%; height: 100%; top: 100px; left: 0px; position: fixed; z-index: 10000; text-align: center;">
            <img src="closing_month/wait.gif" width="200" height="200" alt="Loading..." style="position: absolute; top: 50%; left: 50%;" /> 
      </div>
        
        <h3>Are You Sure You Want To Reset ? </h3>
            <br>
            <input name="my_ikey" id="my_ikey" type="text" size="3" style="text-align:center;">
            
           <a href="#" class="button">Link Button</a>  
            < input type="button" class="button" value="Input Button">
            -->
            <!--<<button class="button">Continue</button>
            <button class="button" onclick="location.href='index.php?c=120'">Cancel</button>
            button class="button"><a href="index.php?c=120" style="color:#FFF">Cancel</a></button> -->
          
    </div>         
    </div>
    
    <br><br><br><br><br><br>        
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
<script>

  $(document).ready(function()
  {
    document.getElementById('my_ikey').focus();
    
    $('#my_ikey').keyup(function(event)
    {
      var ikey = $('#my_ikey').val();
            
      if (ikey == "00")
      { 
        location.href="homepage.php";  
      }
      
      if (ikey == "y" || ikey == "Y")
      { 
          
        $.ajax({
          data: "",
          //type: "post",
          url: "reset_all_complaint.inc.php", //real url : closing_month/closing_transaction.inc.php
          beforeSend: function(){
            $('#wait').show();
          },
          complete: function(){
            $('#wait').hide();
          },
          success: function(data){
          alert("Complaint Report Reset Successfully ! ");
          location.href="homepage.php";
          } 
        });
         
      } // close if
                          
    });// my_ikey keyup event end

  }); 

</script>