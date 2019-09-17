<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require $_SERVER['DOCUMENT_ROOT'] . '/mail/Exception.php';
require $_SERVER['DOCUMENT_ROOT'] . '/mail/PHPMailer.php';
require $_SERVER['DOCUMENT_ROOT'] . '/mail/SMTP.php';

include "connection.php";

//sql to insert entry

$check = $link->query ("SELECT username FROM user WHERE username='".$_POST['username']."'");

if($check->num_rows==1)

{
	echo "<script> alert ('This username has been registered')</script>";
	
}


else

{
	$sql = "INSERT INTO user (username,name,no_tel,email,block,password,role,status) VALUES 

	('".$_POST['username']."',
	'".$_POST['name']."',
	'".$_POST['no_tel']."',
	'".$_POST['email']."',
	'".$_POST['block']."',
	'".$_POST['password']."', 'USER', '1')";


	if ($link->query($sql) == TRUE)


	{
	    $msg = "You has successfully register to Cempaka CRMS,  your Username is '".$_POST['username']."' and password is '".$_POST['password']."'";
	    
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
            $mail->addAddress(''.$_POST['email'].'', ''.$_POST['name'].''); // to email and name
            $mail->Subject = 'Registration To Cempaka CRMS';
            $mail->msgHTML($msg); //$mail->msgHTML(file_get_contents('contents.html'), __DIR__); //Read an HTML message body from an external file, convert referenced images to embedded,
            $mail->AltBody = $msg; // If html emails is not supported by the receiver, show this body
            // $mail->addAttachment('images/phpmailer_mini.png'); //Attach an image file
            /**/
            if(!$mail->send()){
                //echo "Mailer Error: " . $mail->ErrorInfo;
            }else{
                //echo "Message sent!";
            }


		echo"<script>alert('Register Successfully.')</script>";
        echo"<script>setTimeout(\"location.href='index.php';\",10);</script>";

	}


	else

	{
		echo "<script> alert ('Unsucssfully Register, Try Again!)</script>";
		 echo"<script>setTimeout(\"location.href='user_register.php';\",10);</script>";
	}
}


$link->close();

?>