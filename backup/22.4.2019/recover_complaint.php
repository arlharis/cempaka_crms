
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

		$sql3= "UPDATE complaint SET status='1' WHERE complaint_id='$a'";
	if ($link->query($sql3)== TRUE) 
	{
			echo"<script>alert('Successfully Restore.')</script>";
        	echo"<script>setTimeout(\"location.href='deleted_complaint.php';\",10);</script>";
		
	}
	else
	{
		echo"<script>alert('Unsuccessfully Restore.')</script>";
        echo"<script>setTimeout(\"location.href='deleted_complaint.php?';\",10);</script>";
	} 
	$link->close();	
?>
