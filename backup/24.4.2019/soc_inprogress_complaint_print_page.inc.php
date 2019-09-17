

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
	

		/*$fieldids = array(array("worker",'text'));
		$fieldid = array();
		$fieldid = processformfield($fieldids, 'get');

		$fieldids2 = array(array("department",'text'));
		$fieldid2 = array();
		$fieldid2 = processformfield($fieldids2, 'get');

		$worker	 	= $fieldid["worker"];
		$department	= $fieldid2["department"];
		*/

		//$pn = $fieldid["pn"];

		//$externalConn = 1;

		//$trans = "UNLOAD";

		/*
		$qry = "SELECT loc_code FROM complocation
				WHERE module_code ='PU' AND status = 1 limit 1 ";
		$compInfo2 = sqlQuery($qry, $database_myConn, $myConn);
		$codeloc = $compInfo2 [0]["loc_code"];
		
		if($codeloc == "20")$qry_ext = "a.id DESC";  else $qry_ext = "c.description ASC";
		*/
		$link = mysqli_connect($hostname_myConn,$username_myConn,$password_myConn,$database_myConn);
		$qry = "SELECT * , DATE_FORMAT(dated,'%d-%m-%Y') AS dated FROM complaint WHERE complaint_type = 'Social' AND action = 'In Process' AND status = 1 ORDER BY  dated DESC "; 
	
		/*
			$myfile = fopen("XXtransaction.txt","w");
			fwrite($myfile, $qry);
			fclose($myfile);*/
	
		$result = mysqli_query($link, $qry);
		//$k = count($nonstock_info);
	
		
		/*
		//get frequency of printed document
		$sQuery = sprintf("SELECT loc_code,abbrev,sname FROM complocation WHERE id = %s AND status = %s ",1, 1);
		$locInfo3 = sqlQuery($sQuery, $database_myConn, $link);
		$loc_code = $locInfo3[0]["loc_code"];
		$abbrev = $locInfo3[0]["abbrev"];
		$loc_name = $locInfo3[0]["sname"];
		
	

	if($loc_name == "KRETAM HOLDINGS SDN BHD"){ $gst_no= '000052371456';  } 
	elseif($loc_name == "ABEDON SDN BHD"){ $gst_no = '001071693824'; }  
	elseif($loc_name == "ABEDON OIL MILL SDN BHD"){ $gst_no = '011331446272';  }
	elseif($loc_name == "ABEDON ENVIRO SDN BHD"){ $gst_no = '001266204672'; } 
	elseif($loc_name == "SYKT KRETAM MILL SDN BHD"){ $gst_no = '001131659264'; }
	elseif($loc_name == "KHB TELECOMMUNICATIONS SDN BHD"){ $gst_no = '001458741248'; }
	elseif($loc_name == "KHB REALTY SDN BHD"){ $gst_no = '000480550912'; }
	elseif($loc_name == "KHB TELECOMMUNICATIONS SDN BHD"){ $gst_no = '001458741248'; }
	elseif($loc_name == "PUPUK BORNEO SDN BHD"){ $gst_no = '002057641984'; }
	elseif($loc_name == "GREEN EDIBLE OIL SDN BHD"){ $gst_no = '002043904000'; }
	else $gst_no = '-';
	
	if (strpos($loc_name, 'SYKT KRETAM PLANTATIONS SDN BHD') !== false) {
    $gst_no = '000038813696';
	}*/
  ?>

   
    
	
	
    
  
    <page backtop="48.5mm" backbottom="20mm" backleft="0mm" backright="0mm" style="font-size: 9pt;">
    <page_header>
     
   
   <table border="0" id="print_header" style=" font-weight:bolder; font-size:15px; table-layout:fixed; 
       margin-top:20px; margin-left:70px; margin-right:0px; width:100%;" align="left">
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
            <p><strong>SOCIAL COMPLAINT REPORT</strong></p>
            <!-- --><p><strong>[IN PROCESS COMPLAINT]</strong></p> 
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

        
 
           
           <table border="1"  style="font-size:11px; table-layout:fixed; width:100%; margin-left:0px;  border-collapse: collapse; text-align: left; " align="left">
            <tr>
           		<th  style="width:8%; border-top: 2px double #00000; border-bottom: 1px double #00000; padding:3px;" align="center">COMPLAINT<br>ID</th> 
                <th  style="width:15%; border-top: 2px double #00000; border-bottom: 1px double #00000; padding:3px;" align="center">RESIDENT NAME</th>
                <th  style="width:5%; border-top: 2px double #00000; border-bottom: 1px double #00000; padding:3px;" align="center">MATRIC NO</th>
                <th  style="width:8%; border-top: 2px double #00000; border-bottom: 1px double #00000; padding:3px;" align="center">COMPLAINT<br>TYPE</th>
                <th  style="width:16%; border-top: 2px double #00000; border-bottom: 1px double #00000; padding:3px;" align="center">COMPLAINT REPORT</th>
                <th  style="width:8%; border-top: 2px double #00000; border-bottom: 1px double #00000; padding:3px;" align="center">BLOCK</th>
                <th  style="width:8%; border-top: 2px double #00000; border-bottom: 1px double #00000; padding:3px;" align="center">DATE</th>
                <th  style="width:15%; border-top: 2px double #00000; border-bottom: 1px double #00000; padding:3px;" align="center">REPORT FEEDBACK</th>
                <th  style="width:8%; border-top: 2px double #00000; border-bottom: 1px double #00000; padding:3px;" align="center">REPORT<br>FINISH</th>
                <th  style="width:7%; border-top: 2px double #00000; border-bottom: 1px double #00000; padding:3px;" align="center">ACTION</th>
             </tr>
		</table>
     
      </page_header>  
      
<?php
	//for ($i=0; $i < 3; $i++)
	while($nonstock_info=mysqli_fetch_array($result))
	//for ($i=0; $i < count($nonstock_info); $i++)
    {
?> 
     
     <table border="1"  style="font-size:11px; table-layout:fixed; width:100%; margin-left:0px;  border-collapse: collapse; text-align: left; " align="left">
     	
		<tr>
			<td style="width:8%; border-top: 1px double #00000; border-bottom: 1px double #00000; padding:3px;"align="center"><?php echo $nonstock_info["complaint_id"]?></td>
           <td style="width:15%; border-top: 1px double #00000; border-bottom: 1px double #00000; padding:3px;"align="center"><?php echo $nonstock_info["name"]?></td>
           <td style="width:5%; border-top: 1px double #00000; border-bottom: 1px double #00000; padding:3px;"align="center"><?php echo $nonstock_info["username"]?></td>  
           <td style="width:8%; border-top: 1px double #00000; border-bottom: 1px double #00000; padding:3px;"align="center"><?php echo $nonstock_info["complaint_type"]?></td>
           <td style="width:16%;  border-top: 1px double #00000; border-bottom: 1px double #00000; padding:3px;"align="center"><?php echo $nonstock_info["complaint_report"]?></td>
           <td style="width:8%; border-top: 1px double #00000; border-bottom: 1px double #00000; padding:3px;"align="center"><?php echo $nonstock_info["block"]?></td>
           <td style="width:8%; border-top: 1px double #00000; border-bottom: 1px double #00000; padding:3px;"align="center"><?php echo $nonstock_info["dated"]?></td>
           <td style="width:15%; border-top: 1px double #00000; border-bottom: 1px double #00000; padding:3px;"align="center"><?php echo $nonstock_info["feedback_report"]?></td>
           <td style="width:8%; border-top: 1px double #00000; border-bottom: 1px double #00000; padding:3px;"align="center"><?php echo $nonstock_info["finish_dated"]?></td>  
           <td style="width:7%; border-top: 1px double #00000; border-bottom: 1px double #00000; padding:3px;"align="center"><?php echo $nonstock_info["action"]?></td>
             
		 </tr>	
		 
		</table>
      	
        	
 
          
   <?php } ?>

    
     <page_footer>
         
         <p style="margin-top: -50px">Cempaka CRMS - Copyright © 2019</p>
          
        </page_footer>
    
 
</page>
