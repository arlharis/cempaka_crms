
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

		$sql3= "UPDATE fellow SET status='0' WHERE fellow_id='$a'";
	if ($link->query($sql3)== TRUE) 
	{
			echo"<script>alert('Successfully Deleted.')</script>";
        	echo"<script>setTimeout(\"location.href='fellow_list.php';\",10);</script>";
		
	}
	else
	{
		echo"<script>alert('Unsuccessfully deleted.')</script>";
        echo"<script>setTimeout(\"location.href='fellow_list.php?';\",10);</script>";
	} 
	$link->close();	
?>
