<?php
	include "session_user.php";
?>

<?php
	include "connection.php";
	
	use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
    require $_SERVER['DOCUMENT_ROOT'] . '/mail/Exception.php';
    require $_SERVER['DOCUMENT_ROOT'] . '/mail/PHPMailer.php';
    require $_SERVER['DOCUMENT_ROOT'] . '/mail/SMTP.php';
?>




<!DOCTYPE html>
<html>
<head>
<?php
// default

	$id = $_SESSION["user"];

 	$sQuery = sprintf("SELECT MAX(complaint_id) AS complaint_id FROM complaint WHERE  status = %s ", 1);
  	$stInfo = mysqli_query($link, $sQuery);
  	$row2=$stInfo->fetch_assoc();
  	if ($row2["complaint_id"]>1) {
  			$complaint_id=$row2["complaint_id"] + 1;

  	}else{

  		$complaint_id=1000;
  	}

  	$sQuery1 = sprintf("SELECT * FROM user WHERE username=".$id." AND  status = %s ", 1);
  	$stInfo1 = mysqli_query($link, $sQuery1);
  
  	            /*
      $myfile = fopen("check.txt","w");
      fwrite($myfile, $sQuery1);
      fclose($myfile);*/
  	while($user_row2 = mysqli_fetch_array($stInfo1)){
	// sql to insert entry
	$sql2= "INSERT INTO complaint (complaint_id,complaint_type,username,name,dated,block,complaint_report,action,status)
	VALUES ('".$complaint_id."',
	'".$_POST['complaint_type']."',
	'".$id."',
	'".$user_row2["name"]."',
	'".$_POST['dated']."',
	'".$_POST["block"]."',
	'".$_POST['complaint_report']."','In Process',
	'1')";
	if ($link->query($sql2) == TRUE) 
	{
	    $msg = "You complaint has successfully delivered, the complaint feedback will send to your email if the staff already take any action. Here is your complaint id = '".$complaint_id."'";
	    
    	    $mail = new PHPMailer;
            $mail->isSMTP(); 
            $mail->SMTPDebug = 0; // 0 = off (for production use) - 1 = client messages - 2 = client and server messages
            $mail->Host = "smtp.gmail.com"; // use $mail->Host = gethostbyname('smtp.gmail.com'); // if your network does not support SMTP over IPv6
            $mail->Port = 587; // TLS only
            $mail->SMTPSecure = 'tls'; // ssl is deprecated
            $mail->SMTPAuth = true;
            $mail->Username = 'cempakacrms'; // email
            $mail->Password = 'garena126089'; // password
            $mail->setFrom('cempakacrms@gmail.com', 'CEMPAKA CRMS'); // From email and name
            $mail->addAddress(''.$user_row2['email'].'', ''.$user_row2['name'].''); // to email and name
            $mail->Subject = 'Complaint Delivered';
            $mail->msgHTML($msg); //$mail->msgHTML(file_get_contents('contents.html'), __DIR__); //Read an HTML message body from an external file, convert referenced images to embedded,
            $mail->AltBody = $msg; // If html emails is not supported by the receiver, show this body
            // $mail->addAttachment('images/phpmailer_mini.png'); //Attach an image file
            /**/
            if(!$mail->send()){
                //echo "Mailer Error: " . $mail->ErrorInfo;
            }else{
                //echo "Message sent!";
            }
	
		echo "<script> alert ('Complaint Report Sent!')</script>";
		echo"<script>setTimeout(\"location.href='user_complaint.php';\",1000);</script>";
  }
	
	else {

    echo "<script> alert('Unsuccessfully Lodge Complaint, Try Again!')</script>";

	echo"<script>setTimeout(\"location.href='user_complaint.php';\",1000);</script>";
  }
	
	$link->close();	
}
?>

