<?php
  include "session-admin.php";
?>

<?php
    include "connection.php";
    
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require $_SERVER['DOCUMENT_ROOT'] . '/mail/Exception.php';
    require $_SERVER['DOCUMENT_ROOT'] . '/mail/PHPMailer.php';
    require $_SERVER['DOCUMENT_ROOT'] . '/mail/SMTP.php';
?>


<?php


	// sql to insert entry
	$a=$_GET['id'];
		$action=$_POST["action"];
		$finish_dated=$_POST["finish_dated"];
		$feedback_report=$_POST["feedback_report"];
		$username=$_POST["username"];
		
		 $sQuery1 = "SELECT * FROM user WHERE username='$username' ";
  	     $stInfo1 = mysqli_query($link, $sQuery1);
  	     $user_row2 = mysqli_fetch_array($stInfo1);
  	     
  	     $email = $user_row2["email"];
  	     

		$sql3= "UPDATE complaint SET action='".$action."', finish_dated='".$finish_dated."', feedback_report='".$feedback_report."' WHERE complaint_id='$a'";
		
	if ($link->query($sql3)== TRUE) 
	{
	   
	        $msg = "The action already been taken. You can check your complaint feedback at Cempaka CRMS ";
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
            $mail->addAddress(''.$email.''); // to email and name
            $mail->Subject = 'Complaint Feedback';
            $mail->msgHTML($msg); //$mail->msgHTML(file_get_contents('contents.html'), __DIR__); //Read an HTML message body from an external file, convert referenced images to embedded,
            $mail->AltBody = $msg; // If html emails is not supported by the receiver, show this body
            // $mail->addAttachment('images/phpmailer_mini.png'); //Attach an image file
            /**/
            if(!$mail->send()){
                //echo "Mailer Error: " . $mail->ErrorInfo;
            }else{
                //echo "Message sent!";
            }
    	   
	
	        
            
			echo"<script>alert('Complaint Update Successfully.')</script>";
        	echo"<script>setTimeout(\"location.href='all_complaint.php';\",100);</script>";
		
	}
	else
	{
		echo"<script>alert('Complaint Update Unsuccessfully! Try Again.')</script>";
        echo"<script>setTimeout(\"location.href='update_complaint.php?id=".$a."';\",100);</script>";
	} 
	$link->close();	
?>
