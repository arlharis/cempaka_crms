<?php 

if (!function_exists('checkprivilege')) 
{	
	function checkprivilege($userid, $module, $database_myConn, $myConn)
	{
		$str = "SELECT userid FROM privilegeadmin WHERE userid = '$userid' AND module = '$module'";
		$result = sqlQuery($str, $database_myConn, $myConn);		
	
		//echo "**: " . $result[0]["userid"] . " :**";
		//echo $userid."<br>";
		if(isset($result[0]["userid"]))
		{
			
			if (($result[0]["userid"]+0) == (trim($userid)+0))
			{
				//echo "ok<br>";
				return(1);
			}
			else
			{
				return(0);
			}
		}
		else
		{
			return(0);
		}
	}	
}

//login function
if (!function_exists('ims_login')) 
{
	function ims_login($username, $password, $myConn, $database_myConn)
	{
		$fUser = $username;
		$fPassword = $password;
		//if (isset($_POST['login'])) { $fUser = $_POST['login']; } else { $fUser = ""; }
		//if (isset($_POST['pwd'])) { $fPassword = $_POST['pwd']; } else { $fPassword = ""; }
		
		/*$sQuery = sprintf("SELECT username, password, salt, id, loc_code FROM infoadmin WHERE
				username = '%s' AND status = %s",
				esc($myConn, $fUser) , 1 
			);	
			*/
		$sQuery = sprintf("SELECT username, password, salt, id FROM infoadmin WHERE
				username = '%s' AND status = %s",
				esc($myConn, $fUser) , 1 
			);
			
			
		$aResult = sqlQuery($sQuery, $database_myConn, $myConn);
		//mysql_select_db($database_myConn, $myConn);
		//$oResult = mysql_query($sQuery, $myConn) or die('Query failed: ' . mysql_error());
		
		//echo "<pre>";
		//print_r($aResult);
		//echo "</pre>";
		//if(mysql_num_rows($oResult)==1)
		//echo count($aResult)."<br>";
	
	
		if(count($aResult)==1)
		{
			
			$sPasswordSalt = $aResult[0]["salt"];// mysql_result($oResult, 0, "passwordsalt");
			$sPasswordCheck = $aResult[0]["password"];//mysql_result($oResult, 0, "password");
				
			$fPassword = sha1($fPassword.$sPasswordSalt);
			
			
		/*$myfile = fopen("transactiondaily.txt", "w");
		fwrite($myfile, $gbg);
		fclose($myfile);
			*/
			if ($sPasswordCheck == $fUser)/// check if username have default password(password = username user)
				{
					
					/// redirect to create new password
					$surl = "index.php?c=19&u=".$fUser;
					
						header("Location: " .$surl);
						exit;
					
				}
			else
			{

				if($fPassword==$sPasswordCheck)
				{
				
									
					//if use session
					/********************************/
					//session_start();
					//$_SESSION['userid'] = mysql_result($oResult, 0, "id");
					//$_SESSION['login'] = "yes";
					//**********************************/
					
					
					//Calculate 60 days in the future
					//seconds * minutes * hours * days + current time
					$expireDate = 60 * 60 * 24 * 1 + time(); 
					
					//reset cookie
					
					/*setcookie('MSTORE', 0, time() - 3600, '/', "localhost");
					$_COOKIE['MSTORE'] = 0; //direct  */
					
					//setcookie('MPURCHASE', 0, time() - 3600, '/', "localhost");
					setcookie('MPURCHASE', 0, time() - 3600, '/', "");
					$_COOKIE['MPURCHASE'] = 0;
					
					$uuid = ims_getuid();
					
					$sQuery = sprintf("insert into infologin (uuid, userid, logintimestamp) VALUES ('%s', '%s', '%s')",
							$uuid , $aResult[0]["id"], date("Y-m-d H:i:s", time())
						);	
						
					$aResult = sqlQuery($sQuery, $database_myConn, $myConn);
					
					header ("Location:index.php?c=111");

/*					$expireDate = 60 * 60 * 24 * 1 + time(); 
					
					//reset cookie
					
					setcookie('IMSSESSION', 0, time() - 3600, '/', "localhost");
					$_COOKIE['IMSSESSION'] = 0; //direct
					$uuid = ims_getuid();
					
					$sQuery = sprintf("insert into infologin (uuid, userid, logintimestamp) VALUES ('%s', '%s', '%s')",
							$uuid , $aResult[0]["id"], date("Y-m-d H:i:s", time())
						);	
						
					$aResult = sqlQuery($sQuery, $database_myConn, $myConn);
					
*/


				
					
				}///if for $fPassword==$sPasswordCheck
				
				
				
			};///else fo $password==$fUser
		}				
	}
}

//logout function
//login function
if (!function_exists('ims_logout')) 
{
	function ims_logout($myConn, $database_myConn)
	{
		$uuid = ims_getuid();

		$sQuery = sprintf("delete from infologin where uuid = '%s'", $uuid);	
			
		$aResult = sqlQuery($sQuery, $database_myConn, $myConn);	
		
		///delete uuid from infologin common company db
		$hostname_myConn = "localhost";
		$username_myConn = "root";
		$password_myConn = "admin";
		$default_db = "company";	
		
		$myconn3 = mysqli_connect($hostname_myConn,$username_myConn,$password_myConn,$default_db);
			
		$sQuery = sprintf("DELETE FROM infologin WHERE uuid = '%s'" ,$uuid);
		sqlQuery($sQuery,$default_db,$myconn3);
		mysqli_close($myconn3);			
			
	}
}




//check privilege function
if (!function_exists('ims_checkprivilege')) 
{
	function ims_checkprivilege($myConn, $database_myConn, $c)
	{
		$uuid = ims_getuid();
		
		$sQuery = sprintf("
		SELECT * FROM 
		(
			SELECT userid FROM infologin 
			where uuid = '%s'
		) as a 
		INNER JOIN privilegeadmin as b on a.userid = b.userid
		INNER JOIN privilegegroup as c on b.privilegegroupid = c.id
		
		", $uuid);	
		
		//echo $sQuery;

		$aResult = sqlQuery($sQuery, $database_myConn, $myConn);	
		if(count($aResult)>0)
		{
			if(strlen($aResult[0]["contents"])>0)
			{
				$arr = explode(",", $aResult[0]["contents"]);
				//echo in_array($c, $arr, true);
				return in_array($c, $arr, true);
					
			}
		}
		
		return false;
		//echo $aResult[0]["contents"];
		//print_r($aResult);
		//array_push($info, $aResult[0]["contents"]);
		//$info[]=$aResult[0]["contents"];		
	}
}

//get userid, name, 
if (!function_exists('ims_getinfo')) 
{
	function ims_getinfo($myConn, $database_myConn, &$info)
	{
		$uuid = ims_getuid();
		
		$sQuery = sprintf("SELECT userid, username FROM infologin as a
		inner join infoadmin as b on a.userid = b.id
		where uuid = '%s'", $uuid);	
		//echo $sQuery;
		$aResult = sqlQuery($sQuery, $database_myConn, $myConn);			
		
		if(count($aResult)==1)
		{
			$info[0] = $aResult[0]["userid"];
			$info[1] = $aResult[0]["username"];			
		}
		else
		{
			$info[0] = "undefined";
			$info[1] = "undefined";						
		}
	}

}
//is logged in?
if (!function_exists('ims_isloggedin')) 
{
	function ims_isloggedin($myConn, $database_myConn)
	{
		$uuid = ims_getuid();

		$sQuery = sprintf("SELECT uuid FROM infologin where uuid = '%s'", $uuid);	
		//echo $sQuery;
		$aResult = sqlQuery($sQuery, $database_myConn, $myConn);			
		
		if(count($aResult)==1)
			return 1;
		else
			return 0;
	}
}


//create uuid
if (!function_exists('ims_getuid')) 
{
	/*function ims_getuid()
	{
		$uid = 0;
		if(isset($_COOKIE['MSTORE']) && strlen($_COOKIE['MSTORE']) === 32)
		{
			$uid = $_COOKIE['MSTORE'];
		}
		else
		{
			$uid = openssl_random_pseudo_bytes(16);
			$uid = bin2hex($uid);
			setcookie('MSTORE', $uid, time()+(60*60*24*30), '/', "localhost");
		}
		
		return $uid;	
	}*/
	
	function ims_getuid()
	{
		$uid = 0;
		if(isset($_COOKIE['MPURCHASE']) && strlen($_COOKIE['MPURCHASE']) === 32)
		{
			$uid = $_COOKIE['MPURCHASE'];
		}
		else
		{
			$uid = openssl_random_pseudo_bytes(16);
			$uid = bin2hex($uid);
			setcookie('MPURCHASE', $uid, time()+(60*60*24*30), '/', "");
		}
		
		return $uid;	
	}
	
}





/// clearing uuid from all company db

if (!function_exists('ims_clearuid'))
{
	function ims_clearuid($coid, $cookies)
	{
		$uuid = ims_getuid();
		
		$hostname_myConn = "localhost";
		$username_myConn = "root";
		$password_myConn = "admin";
		$default_db = "company";		
		
		$myConn2 = mysqli_connect($hostname_myConn,$username_myConn,$password_myConn,$default_db);

		
		//$sQuery = sprintf("SELECT id FROM compmaster where id <> " . $coid);
		$sQuery = sprintf("SELECT id FROM compmaster where id = " . $coid);
		$compInfo = sqlQuery ($sQuery, $default_db, $myConn2);
		
		//print_r($compInfo);
		//echo $sQuery;
		//exit;
		
		for($i=0; $i < count($compInfo); $i++)
		{
			$compid = $compInfo[$i]["id"];
			
			if ($compid < 10)
			{
				$compid = "0".$compid;
			}
			
			$comp_db = "company_".$compid;
			
			$link = mysqli_connect($hostname_myConn,$username_myConn,$password_myConn);if (!$link) {die(' Not connected : ' );}
			
			$db_selected = mysqli_select_db($link,$comp_db);if (!$db_selected) {echo (' Database not exist. Please contact your administrator ');die();}
			
			$myconn3 = mysqli_connect($hostname_myConn,$username_myConn,$password_myConn,$comp_db);
			
			$sQuery = sprintf("DELETE FROM infologin WHERE uuid = '%s'" ,$uuid);
			sqlQuery($sQuery,$comp_db,$myconn3);
			mysqli_close($myconn3);				
		}
		
		mysqli_close($myconn2);				
		
	}
}





//create uuid
/*if (!function_exists('ims_getuid')) 
{
	function ims_getuid()
	{
		$uid = 0;
		if(isset($_COOKIE['IMSSESSION']) && strlen($_COOKIE['IMSSESSION']) === 32)
		{
			$uid = $_COOKIE['IMSSESSION'];
		}
		else
		{
			$uid = openssl_random_pseudo_bytes(16);
			$uid = bin2hex($uid);
			setcookie('IMSSESSION', $uid, time()+(60*60*24*30), '/', "localhost");
		}
		
		return $uid;	
	}
}
*/?>