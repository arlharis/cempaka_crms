

<?php 
	require 'includes/connection/connection.php';
	//require "../includes/connection/connection.php";
	//require "../includes/php/functions.php";
	//require "../includes/php/processform.php";
?>

<LINK href="includes/css/interface2.css" rel="stylesheet" type="text/css"> 
	<style type="text/css">
		td, th {
			display:table-row-group;
			border-width:inherit;
			border-spacing: inherit;
			border-style:none ;
			border-collapse: collapse;
			background-color: white;
			table-layout:auto; 
		}
        
    </style>
    
    <style type="text/css">
		  div.line1 { border-top: 1px dashed #00000; width: 750px;}
		  div.line2 { border-bottom: 0px  #00000; width: 770px;} 
		  div.line4 { border-top: 1px dashed #00000; width: 750px;}
          div.line3 { border-top: 1px dotted #00000;}
		

    </style>


	<?php 
	
		$link = mysqli_connect($hostname_myConn,$username_myConn,$password_myConn,$database_myConn);
		$qry = "SELECT * FROM emergency WHERE status = 1 ORDER BY emergency_id ASC"; 
	
		/*
			$myfile = fopen("XXtransaction.txt","w");
			fwrite($myfile, $qry);
			fclose($myfile);*/
	
		$result = mysqli_query($link, $qry);
	
	
		
		
  ?>

   
    
	
	
    
  
    <page backtop="45.5mm" backbottom="20mm" backleft="0mm" backright="0mm" style="font-size: 9pt;">
    <page_header>
     
   
   <table border="0" id="print_header" style=" font-weight:bolder; font-size:15px; table-layout:fixed; 
       margin-top:20px; margin-left:30px; margin-right:0px; width:100%;" align="left">
      <tr>
         <td align="left" valign="bottom" style="width:15%; margin-left:200px font-weight:bolder; font-size:13px;;">
        	<p><strong>CEMPAKA CRMS</strong></p>
           	<p><strong>
			<?php 
			date_default_timezone_set("Asia/Kuala_Lumpur");
			echo date("H:i:s"); 
			?></strong></p>
        </td>
        <td align="center" style="width:59%; font-weight:bolder; font-size:13px;">
            <p><strong>EMERGENCY CONTACT LIST</strong></p>
            <!--<p><strong>As At <?php //echo strtoupper(date("F Y",time()));?></strong></p>  -->
        </td>
        <td align="right" valign="bottom" style="width:15%; margin-right:100px font-weight:bolder; font-size:13px;;">
            <br><p><strong>Page: [[page_cu]]</strong></p>
            <p><strong><?php echo strtoupper(date("d/m/Y",time()));?></strong></p>
        	
        </td>
      </tr>
    </table>
        
        <br>
        <br>
        <br>

        
 
           
           <table border="1"  style="font-size:12px; table-layout:fixed; width:100%; margin-left:90px;  border-collapse: collapse; text-align: left; " align="left">
            <tr> 
                <th  style="width:15%; border-top: 2px double #00000; border-bottom: 1px double #00000; padding:3px;" align="center">EMERGENCY ID</th>
                <th  style="width:40%; border-top: 2px double #00000; border-bottom: 1px double #00000; padding:3px;" align="center">EMERGENCY NAME</th>
                <th  style="width:20%; border-top: 2px double #00000; border-bottom: 1px double #00000; padding:3px;" align="center">CONTACT NUMBER</th>
             </tr>
		</table>
     
      </page_header>  
      
<?php
	//for ($i=0; $i < 3; $i++)
	while($nonstock_info=mysqli_fetch_array($result))
	//for ($i=0; $i < count($nonstock_info); $i++)
    {
?> 
     
     <table border="1"  style="font-size:12px; table-layout:fixed; width:100%; margin-left:90px;  border-collapse: collapse; text-align: left; " align="left">
     	
		<tr>
           <td style="width:15%; border-top: 1px double #00000; border-bottom: 1px double #00000; padding:3px;"align="center"><?php echo $nonstock_info["emergency_id"]?></td>
           <td style="width:40%; border-top: 1px double #00000; border-bottom: 1px double #00000; padding:3px;"align="center"><?php echo $nonstock_info["name"]?></td>  
           <td style="width:20%; border-top: 1px double #00000; border-bottom: 1px double #00000; padding:3px;"align="center"><?php echo $nonstock_info["contact_no"]?></td>
             
		 </tr>	
		 
		</table>
      	
        	
 
          
   <?php } ?>

    
     <page_footer>
         
         <p style="margin-top: -50px">Cempaka CRMS - Copyright © 2019</p>
          
        </page_footer>
    
 
</page>
