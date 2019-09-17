
<?php
session_start();
//echo 'Welcome '.$_SESSION['username'];
//echo '<br><a href="index.php?action=logout">Logout</a>';
if(isset($_SESSION['username'])){
    require 'connection.php';
    $username = $_SESSION['username'];
    $result = mysqli_query($link, 'SELECT * from administrator where username = "'.$username.'"');
    if(mysqli_num_rows($result)==1){
        $_SESSION['username'] = $username;
        //header('Location: homepage.php'); 
    }

}else{

    echo "<script type='text/javascript'> document.location = 'index.php';</script>";
}

	// sql to insert entry
	$a=$_GET['id'];
		$action=$_POST["action"];
		$finish_dated=$_POST["finish_dated"];
		$feedback_report=$_POST["feedback_report"];

		$sql3= "UPDATE complaint SET action='".$action."', finish_dated='".$finish_dated."', feedback_report='".$feedback_report."' WHERE complaint_id='$a'";
	if ($link->query($sql3)== TRUE) 
	{
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
