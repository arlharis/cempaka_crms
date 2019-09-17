<meta name="format-detection" content="telephone=no">
<?php
	include "connection.php";


	$sql="SELECT MAX(contact_no) AS contact_no FROM fellow WHERE on_duty='1' AND status='1'";
   			$res=$link->query($sql);
    		$row=$res->fetch_assoc();
			
			echo "<script>alert('Contacting On-Duty Fellow')</script>";
			echo "<script>setTimeout(\"location.href='tel:+6".$row["contact_no"]."';\",100);</script>";

?>