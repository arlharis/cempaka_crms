
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
		$name=$_POST["name"];
		$contact_no=$_POST["contact_no"];
		

		$sql7= "UPDATE emergency SET name='".$name."', contact_no='".$contact_no."' WHERE emergency_id='".$a."'";
	if ($link->query($sql7)== TRUE) 
	{
			echo"<script>alert('Update Successfully.')</script>";
        	echo"<script>setTimeout(\"location.href='emergency_list.php';\",10);</script>";
		
	}
	else
	{
		echo"<script>alert('Update Unsuccessfully! Try Again.')</script>";
        echo"<script>setTimeout(\"location.href='update_emergency_contact.php?id=".$a."';\",10);</script>";
	} 
	$link->close();	
?>