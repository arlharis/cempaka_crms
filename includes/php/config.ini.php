<?php

	if(!defined('LIVE')) 
		define('LIVE', false);
	
	if(!defined('LIVE')) 
		define('LIVE', false);
	
	define('CONTACT_EMAIL', 'error_log@imsinter.com');
	
	define ('BASE_URI',''.$_SERVER['DOCUMENT_ROOT'].'');
	//define('BASE_URI', '../');
	
	define('BASE_URL', 'www.mysandakan.com/');
	
	session_start();


	#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#
	
	/*if(isset($_SESSION["mycompany"]))
	{
		//$mycookie =  $_SESSION["mycompany"];
	}
	else $mycookie = 0;
	*/
	/*if(isset($_COOKIE["mycompany"]))
	{
		$mycookie =  $_COOKIE["mycompany"];
	}
	else $mycookie = 0;*/
	$var_change = 0;
	
	/*$myfile = fopen("transactiondaily_SESS_2.txt", "w");
	fwrite($myfile, $mycookie);
	fclose($myfile);
	*/
	//define('MYSQL', BASE_URI.'module_store/includes/connection/connection.php');
	$MYSQL = BASE_URI."/cempaka_crms/connection.php";
	
	#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#



	function my_error_handler($e_number, $e_message, $e_file, $e_line, $e_vars)
	{
		$message = "An error occurred in script '$e_file' on line $e_line:\n$e_message\n";
		//$message .= "<pre>" . print_r(debug_backtrace(), 1) . "</pre>\n";
		
		if(!LIVE)
		{
			echo '<div class="alert alert-danger">'.nl2br($message).'</div>';
			/// write error message to text file
		}
		else
		{
			error_log($message, 1, CONTACT_EMAIL, 'From:error@imsinter.com');
			if($e_number != E_NOTICE)
			{
				echo '<div class="alert alert-danger">A system error occurred. We Apologzied for the inconvenience.</div>';
			}
		}// end of $live if-else
		
		return true;
		
	}
	
	set_error_handler('my_error_handler');
