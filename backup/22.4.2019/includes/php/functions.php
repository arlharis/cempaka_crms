<?php


/*################################### */

//shorter version of escaping string
if (!function_exists('esc')) 
{
	function esc($conn, $str) 
	{
		return mysqli_escape_string($conn, $str);
	}
}
/*################################### */

// convert character to ascii number
//echo asc2hex("abc"); will be converted to 616263

if (!function_exists('asc2hex')) 
{
	function asc2hex ($temp) {
	$len = strlen($temp);
	for ($i=0; $i<$len; $i++) $data.=sprintf("%02x",ord(substr($temp,$i,1)));
	return $data;
	}
}

// convert ascci number to character
// echo hex2asc("7278")."<br>"; will be converted to rx
if (!function_exists('hex2asc')) 
{
	function hex2asc($temp) {
	$len = strlen($temp);
	for ($i=0;$i<$len;$i+=2) $data.=chr(hexdec(substr($temp,$i,2)));
	return $data;
	}	
}
/*################################### */
// the following define and two functions (application_start and application_end) is
// to simulate the variable Application() in asp/vb;
// 
if(!defined("APP_DATA_FILE"))
	define("APP_DATA_FILE", "includes/application.data");

if (!function_exists('application_start')) 
{
	function application_start ()
	{
		global $_APP;
	
		// if data file exists, load application
		//   variables
		if (file_exists(APP_DATA_FILE))
		{
			// read data file
			$file = fopen(APP_DATA_FILE, "r");
			if ($file)
			{
				$data = fread($file,
					filesize(APP_DATA_FILE));
				fclose($file);
			}
	
			// build application variables from
			//   data file
			$_APP = unserialize($data);
		}
	}
}

if (!function_exists('application_end')) 
{
	function application_end ()
	{
		global $_APP;
	
		// write application data to file
		$data = serialize($_APP);
		$file = fopen(APP_DATA_FILE, "w");
		if ($file)
		{
			fwrite($file, $data);
			fclose($file);
		}
	}
}
/*################################### */

//used together with setLinks in functions.js	
//to use the following function, just simple type format_datetime(time());
//eg. echo format_datetime(time());
if ( !isset($_SESSION['GMT_offset']) ) {
  $_SESSION['GMT_offset'] = 0;
  $_SESSION['GMT_offset_str'] = '+0:00';
}

if ( isset($_GET['offset']) ) {
  $_SESSION['offset'] = $_GET['offset'];
  set_timezone($_GET['offset']);
}

if (!function_exists('set_timezone')) 
{
	function set_timezone( $offset ) {
	  if ( $offset ) {
		$offset = -$offset;
		$_SESSION['GMT_offset'] = 60 * $offset;
		$GMT_offset_str = ( $offset > 0 ) ? '+' : '-';
		$GMT_offset_str .= floor($offset / 60) . ':';
		$GMT_offset_str .= (($offset % 60) < 10 ) ?
		  '0' . $offset % 60 : $offset % 60;
		$_SESSION['GMT_offset_str'] = $GMT_offset_str;
	  }
	}
}

if (!function_exists('format_datetime')) 
{
	function format_datetime( $date ) {
	  return ( date('d M Y g:ia', $date + $_SESSION['GMT_offset']) .
	  ' GMT ' . $_SESSION['GMT_offset_str']);
	}
}
/*################################### */

//write to log file
if (!function_exists('WriteToLog')) 
{	
	function WriteToLog($sMessage)
	{
		$sLogFolder = _RootFolder . "/log/";
		$sLogFileName = date("Ymd", time()).".txt";
		
		$file = fopen($sLogFolder.$sLogFileName, "a") or exit("Unable to create log file");
		fwrite($file, date("Y-m-d H:i:s", time()).", " . $_SERVER['SCRIPT_NAME'].", ".$sMessage."\r\n");
		fclose($file);
	}
}
/*################################### */

//shorstring limits the length of string to be displayed
//replace the last 3 characters with ...
if (!function_exists('ShortString')) 
{
	function ShortString($sTemp, $iTemp)
	{
		if(strlen($sTemp)>$iTemp)
			$sTemp = substr_replace(substr($sTemp, 0, $iTemp), "...", ($iTemp-3), 3);
				
		return($sTemp);
	}
}
/*################################### */

//main title = first 66 characters (google, will display 66 characters)
//secondary = the rest of the characters. (yahoo will display 120 characters)
if (!function_exists('ShortTitle')) 
{
	function ShortTitle($sTemp)
	{
		if(strlen($sTemp)>120)
			$sTemp = substr($sTemp, 0, 120);
				
		return($sTemp);
	}
}
/*################################### */
	
//to do force redirect, but function is not used in this application
if (!function_exists('Redirect2URL')) 
{
	function Redirect2URL($url)
	{
		if (!headers_sent())
		{
			header('Location: '.$url);
			//if IIS, then send Refresh header too (as a safe)...
			if (stristr($_SERVER['SERVER_SIGNATURE'], 'IIS'))
				header('Refresh: 0;url='.$url);
		}
		else
		{
			echo '<p align="center">Please click this <a href="'.$url.'">link</a> to continue...</p>'."\n";
			echo '<META HTTP-EQUIV="refresh" CONTENT="0; URL='.$url.'">'."\n";
		}
	}
}
/*################################### */
//check / validate email address
if (!function_exists('check_email')) 
{
	function check_email( $data ) { 
		if ( preg_match( '/^[A-z0-9_-]+[@][A-z0-9_-]+([.][A-z0-9_-]+)+[A-z]{2,4}$/', $data ) ) { 
		$chunks = explode( '@', $data ); 
			if ( gethostbyname( trim( $chunks['1'] ) ) == trim( $chunks['1'] ) ) { 
				$valid = false;     
				} else { 
				$valid = true; 
			} 
		} else { 
		$valid = false; 
		} 
		return $valid; 
	} 
}
/*################################### */
// class to prevent double posting

if (!class_exists('Post_Block')) 
{
	class Post_Block 
	{
		function startPost() 
		{
			echo "<input type='hidden' name='postID' value='" . md5(uniqid(rand(), true)) . "'>";
		}
	
		function postBlock($postID) 
		{
			session_start();
			// Compare $postID with the session variable
			if(isset($_SESSION['postID'])) 
			{
				if ($postID == $_SESSION['postID']) 
				{
					// Already present, abort
					return false;
				} 
				else 
				{
					// Not yet posted, continue
					$_SESSION['postID'] = $postID;
					return true;
				}
			} 
			else 
			{
				$_SESSION['postID'] = $postID;
				return true;
			}
		}
	}
}
/*And then, somewhere on a page with a form you wish to prevent double-posts:
<?php $thisPost = new Post_Block; // Instantiates a Post object ?>

<form name="foo" action="somepage.php" method="post">
    <input type="text" name="generica" size="25">
     <?php $thisPost->startPost(); // Assigns hidden form value "postID" ?>
</form>

Finally, on the page that processes the form (somepage.php in this example):
<?php
$thisPost = new Post_Block; // Instantiates a Post_Block object

if($thisPost->postBlock($_REQUEST['postID'])) {
    // Not a double post, process the data
    echo "Not a double post."
} else {
    // Double-post, don't process the data (do an "exit()" or redirect...)
    echo "Oops!! Double Post!";
}

?>
*/

/*################################### */
//auto resize image, if image larger than max width or height.
//$im = image to be resized (image pointer)
//$width = $im width
//$height = $im height
//$max_w = maximum width
//$max_h = maximum height

if (!function_exists('autoResizeImage')) 
{
	function autoResizeImage($im, $width, $height, $max_w, $max_h)	
	{										
		if($width > $max_w && $height < $max_h)
		{
		
			$scale = $max_w / $width;
			
			$new_im_w = $width * $scale;
			$new_im_h = $height * $scale;
			
		}
		
		else if($width < $max_w && $height > $max_h)
		{
		
			$scale = $max_h / $height;
			
			$new_im_w = $width * $scale;
			$new_im_h = $height * $scale;
		
		}
		else if($width > $max_w && $height > $max_h)
		{
		
			$scale_1 = $max_w / $width;
			$scale_2 = $max_h / $height;
			if($scale_1 > $scale_2)
			{
				$scale = $scale_2;
			}
			else
			{
				$scale = $scale_1;
			}
				
			$new_im_w = $width * $scale;
			$new_im_h = $height * $scale;
	
		}
		
		else
		{
			$new_im_w = $width;
			$new_im_h = $height;
		}
		
		$new_image = imagecreatetruecolor($new_im_w, $new_im_h);
		imagecopyresized($new_image, $im, 0, 0, 0, 0, $new_im_w, $new_im_h, $width, $height);
	
		return $new_image;
		//$sCopy2FileName = substr($ImageName, strlen("uploaded_images/temp/"), strlen($ImageName));
		//copy($ImageName, $sDirDate."/images/".$sCopy2FileName);
	}
}
/*################################### */
//save image to folder/imagename based on image type, jpeg/jpg, gif, png
// $type, type of image,
// $image = image pointer
// $new_image = image name, image to be saved (string)
if (!function_exists('saveImage')) 
{
	function saveImage($type, $image, $new_image)
	{
		$bFlag = false;
		
		switch($type)
		{
			case 1: //gif
			{
				imagegif($image, $new_image) or die("Cant resize or copy");
				$bFlag = true;
				break;
			}	
			case 2: //jpeg/jpg
			{
				imagejpeg($image, $new_image, 100) or die("Cant resize or copy");
				$bFlag = true;
				break;
			}
			case 3: //png
			{
				imagepng($image, $new_image, 0) or die("Cant resize or copy");
				$bFlag = true;
				break;
			}
		}
		return $bFlag;
		
	}
}
/*################################### */
//create image pointer based on image type, jpeg/jpg, gif, png
// $type, type of image,
// $ImageName = image name (string)
if (!function_exists('createImage')) 
{
	function createImage($type, $ImageName)
	{
		switch($type)
		{
			case 1: //gif
			{
				$im = imagecreatefromgif($ImageName);
				break;
			}	
			case 2: //jpeg/jpg
			{
				$im = imagecreatefromjpeg($ImageName);
				break;
			}
			case 3: //png
			{
				$im = imagecreatefrompng($ImageName);
				break;
			}
			default:
			{
				$im = false;
				break;
			}
		}
		return $im;
	}
}

/*################################### */
//use in displaying ' " characters
if (!function_exists('insertSlashes')) 
{
	function insertSlashes($str)
	{
		//seldom use this function, because mysql_escape_string() is good enough
		$str = get_magic_quotes_gpc() ? addslashes($str) : $str;
		return $str;
	}
}

if (!function_exists('removeSlashes')) 
{
	function removeSlashes($str)
	{
		$str = get_magic_quotes_gpc() ? stripslashes($str) : $str;
		return $str;
	}
}
/*################################### */
//creating images from text

/*
text to image converter
daftlogic 
www.daftlogic.com
*/
//Header("Content-type: image/png");
if (!class_exists('textPNG')) 
{
	class textPNG 
	{
		var $font = 'fonts/BAZOOKA.TTF'; //default font. directory relative to script directory.
		var $msg = "no text"; // default text to display.
		var $size = 12; // default font size.
		var $rot = 0; // rotation in degrees.
		var $pad = 0; // padding.
		var $transparent = 1; // transparency set to on.
		var $red = 0; // black text...
		var $grn = 0;
		var $blu = 0;
		var $bg_red = 255; // on white background.
		var $bg_grn = 255;
		var $bg_blu = 255;
		var $image_filename = 'letters.png';	//default output file name
		
		function draw() 
		{
			$width = 0;
			$height = 0;
			$offset_x = 0;
			$offset_y = 0;
			$bounds = array();
			$image = "";
		
			// get the font height.
			//$bounds = ImageTTFBBox($this->size, $this->rot, $this->font, "W");
			$bounds = imagettfbbox($this->size, $this->rot, $this->font, "W");
			if ($this->rot < 0) 
			{
				$font_height = abs($bounds[7]-$bounds[1]);		
			} 
			else if ($this->rot > 0) 
			{
			$font_height = abs($bounds[1]-$bounds[7]);
			} 
			else 
			{
				$font_height = abs($bounds[7]-$bounds[1]);
			}
			// determine bounding box.
			//$bounds = ImageTTFBBox($this->size, $this->rot, $this->font, $this->msg);
			$bounds = imagettfbbox($this->size, $this->rot, $this->font, $this->msg);
			if ($this->rot < 0) 
			{
				$width = abs($bounds[4]-$bounds[0]);
				$height = abs($bounds[3]-$bounds[7]);
				$offset_y = $font_height;
				$offset_x = 0;
			} 
			else if ($this->rot > 0) 
			{
				$width = abs($bounds[2]-$bounds[6]);
				$height = abs($bounds[1]-$bounds[5]);
				$offset_y = abs($bounds[7]-$bounds[5])+$font_height;
				$offset_x = abs($bounds[0]-$bounds[6]);
			} 
			else
			{
				$width = abs($bounds[4]-$bounds[6]);
				$height = abs($bounds[7]-$bounds[1]);
				$offset_y = $font_height;;
				$offset_x = 0;
			}
			
			$image = imagecreate($width+($this->pad*2)+1,$height+($this->pad*2)+1);
			//$background = ImageColorAllocate($image, $this->bg_red, $this->bg_grn, $this->bg_blu);
			$background = imagecolorallocate($image, $this->bg_red, $this->bg_grn, $this->bg_blu);		
			
			//$foreground = ImageColorAllocate($image, $this->red, $this->grn, $this->blu);
			$foreground = imagecolorallocate($image, $this->red, $this->grn, $this->blu);
					
			if ($this->transparent) ImageColorTransparent($image, $background);
			//ImageInterlace($image, false);
			imageinterlace($image, false);
		
			// render the image
			// image will be written in $image
			//ImageTTFText($image, $this->size, $this->rot, $offset_x+$this->pad, $offset_y+$this->pad, $foreground, $this->font, $this->msg);
			imagettftext($image, $this->size, $this->rot, $offset_x+$this->pad, $offset_y+$this->pad, $foreground, $this->font, $this->msg);
		
			// output PNG object.
			//imagePNG($image);
			imagepng($image, $this->image_filename);
		}
	}
	
		//usage
		/*$text = new textPNG;
	
		if (isset($msg)) $text->msg = $msg; // text to display
		if (isset($font)) $text->font = $font; // font to use (include directory if needed).
		if (isset($size)) $text->size = $size; // size in points
		if (isset($rot)) $text->rot = $rot; // rotation
		if (isset($pad)) $text->pad = $pad; // padding in pixels around text.
		if (isset($red)) $text->red = $red; // text color
		if (isset($grn)) $text->grn = $grn; // ..
		if (isset($blu)) $text->blu = $blu; // ..
		if (isset($bg_red)) $text->bg_red = $bg_red; // background color.
		if (isset($bg_grn)) $text->bg_grn = $bg_grn; // ..
		if (isset($bg_blu)) $text->bg_blu = $bg_blu; // ..
		if (isset($tr)) $text->transparent = $tr; // transparency flag (boolean).
	
		$text->draw(); // GO!!!!!
	*/
}

/*################################### */
//encoding and decoding string with key

if (!function_exists('encode')) 
{
	function encode($string,$key) {
		$key = sha1($key);
		$strLen = strlen($string);
		$keyLen = strlen($key);
		for ($i = 0; $i < $strLen; $i++) {
			$ordStr = ord(substr($string,$i,1));
			if ($j == $keyLen) { $j = 0; }
			$ordKey = ord(substr($key,$j,1));
			$j++;
			$hash .= strrev(base_convert(dechex($ordStr + $ordKey),16,36));
		}
		return $hash;
	}
}

if (!function_exists('decode')) 
{
	function decode($string,$key) {
		$key = sha1($key);
		$strLen = strlen($string);
		$keyLen = strlen($key);
		for ($i = 0; $i < $strLen; $i+=2) {
			$ordStr = hexdec(base_convert(strrev(substr($string,$i,2)),36,16));
			if ($j == $keyLen) { $j = 0; }
			$ordKey = ord(substr($key,$j,1));
			$j++;
			$hash .= chr($ordStr - $ordKey);
		}
		return $hash;
	}
}
//to encode.
//encode($string,$key);  

//to decode.
//decode($string,$key); 

/*################################### */

//file_exists - case insensitive
if (!function_exists('fileExists')) 
{
	function fileExists($fileName, $caseSensitive = true) {
	
		if(file_exists($fileName)) {
			return true;
		}
		if($caseSensitive) return false;
	
		// Handle case insensitive requests            
		$directoryName = dirname($fileName);
		$fileArray = glob($directoryName . '/*', GLOB_NOSORT);
		$fileNameLowerCase = strtolower($fileName);
		foreach($fileArray as $file) {
			if(strtolower($file) == $fileNameLowerCase) {
				return true;
			}
		}
		return false;
	}
}
/*################################### */
//list files in a directory
if (!function_exists('getDirectoryList')) 
{
	function getDirectoryList($directory)
	{
		//create and array to hold directory list
		$results = array();
		
		//create a handler for the directory
		$handler = opendir($directory);
		
		//open directory and walk through the filename
		while($file = readdir($handler))
		{
			//if file isn't this directory or its parent, add it to the results
			if($file != "." && $file != "..")
			{
				$results[] = $file;	
			}
		}
		
		//tidy up: close the handler
		closedir($handler);
		
		//done
		return $results;
	}
}

/*################################### */
//check OS type
if (!function_exists('serverOS')) 
{
	function serverOS()
	{
		$sys = strtoupper(PHP_OS);
	
		if(substr($sys,0,3) == "WIN")
		{
			$os = 1;
		}
		elseif($sys == "LINUX")
		{
			$os = 2;
		}
		else
		{
			$os = 3;
		}
	
		return $os;
	}
}
/*################################### */
//validate email if in Linux environment
if (!function_exists('check_email2')) 
{
	function check_email2($email, $recType = '')
	{
		switch(serverOS())
		{
			case 1: //win
				return myCheckWinDNSRR($email, $recType);
			
			case 2: //linux
				return myLinWinDNSRR($email);
		}
		
		return false;
	}
}

/*################################### */
//validate email if in Linux environment
if (!function_exists('myLinWinDNSRR')) 
{
	function myLinWinDNSRR($email) 
	{
		// take a given email address and split it into the  
		//username and domain. 
		
		list($userName, $mailDomain) = split("@", $email); 
		
		if (checkdnsrr($mailDomain, "MX")) { 
		
		  // this is a valid email domain! 
		  return true;
		
		} 
		
		else { 
		
		  // this email domain doesn't exist! bad dog! no biscuit! 
		  return false;
		
		} 
		
	}
}
/*################################### */
//validate email if in windows environment
if (!function_exists('myCheckWinDNSRR')) 
{
	function myCheckWinDNSRR($email, $recType = '') 
	{ 
		
		list($userName, $hostName) = split("@", $email); 
		
	  if(!empty($hostName)) { 
	
		if( $recType == '' ) $recType = "MX"; 
	
		exec("nslookup -type=$recType $hostName", $result); 
	
		// check each line to find the one that starts with the host 
	
		// name. If it exists then the function succeeded. 
	
		foreach ($result as $line) { 
	
		  if(eregi("^$hostName",$line)) { 
	
			return true; 
	
		  } 
	
		} 
	
		// otherwise there was no mail handler for the domain 
	
		return false; 
	
	  } 
	
	  return false; 
	
	}
}

/*################################### */
//mysqli replacing mysql_result
if (!function_exists('mysqli_result')) 
{
	function mysqli_result($oResult, $i, $j=0)
	{
	    $oResult->data_seek($i); 
		$datarow = $oResult->fetch_array(); 
		return $datarow[$j]; 

	}
}

/*################################### */
//return result from mysql_query(), if it's a record set, then convert it to array. Please read the comments
if (!function_exists('sqlQuery')) 
{
	function sqlQuery($str, $database, $conn)
	{
		/*
		###################################################################################################################################################
		notes: from php - mysql_query()
		
		For SELECT, SHOW, DESCRIBE, EXPLAIN and other statements returning resultset, mysql_query() returns a resource on success, or FALSE on error.
		
		For other type of SQL statements, INSERT, UPDATE, DELETE, DROP, etc, mysql_query() returns TRUE on success or FALSE on error.
		
		The returned result resource should be passed to mysql_fetch_array(), and other functions for dealing with result tables, to access the returned data.
		
		Use mysql_num_rows() to find out how many rows were returned for a SELECT statement or 
		mysql_affected_rows() to find out how many rows were affected by a DELETE, INSERT, REPLACE, or UPDATE statement.
		
		mysql_query() will also fail and return FALSE if the user does not have permission to access the table(s) referenced by the query. 		
		###################################################################################################################################################		
		*/
					
		//need to know the query will return
		/*
			1. if SELECT, SHOW, DESCRIBE, EXPLAIN
				return record set or false
								
			2. if INSERT, UPDATE, DELETE, REPLACE
				use mysql_affected rows() to return number of rows affected
				return number of affected rows or false
				
			3. DROP 
				return true or false
		
		*/
		//if failed
		//if(!$oResult)
			//return false;
		
		//find if the query has the following words
		$array = array("INSERT", "UPDATE", "DELETE", "REPLACE");
		
		//remove spaces
		//$words = preg_split('/\s+/',$s,-1,PREG_SPLIT_NO_EMPTY);	
		//if yes, mysql_result will return affected rows 
		if(0 < count(array_intersect(array_map('strtoupper', preg_split('/\s+/',$str,-1,PREG_SPLIT_NO_EMPTY)), $array)))
		{
			mysqli_select_db($conn, $database);
			$oResult = mysqli_query($conn, $str) or die('Query failed: ' . mysqli_error($conn));
			return mysqli_affected_rows($conn);
		}
	
		//find if the query has the following words
		$array = array("SELECT", "SHOW", "DESCRIBE", "EXPLAIN");		
		if(0 < count(array_intersect(array_map('strtoupper', preg_split('/\s+/',$str,-1,PREG_SPLIT_NO_EMPTY)), $array)))
		{
	
			mysqli_select_db($conn, $database);
			$oResult = mysqli_query($conn, $str) or die('Query failed: ' . mysqli_error($conn));
	
			//if SELECT, SHOW, DESCRIBE OR EXPLAIN			
			//get record set (rs) and return array
			$iResult = mysqli_num_rows($oResult);
		
			/* get column metadata */
			$colHeader = array();
			
			for($i=0;$i<mysqli_num_fields($oResult);$i++)
			{
				$meta = mysqli_fetch_field($oResult);
				$colHeader[$i] = $meta->name;	
			}
			
			/* get record set */
			$rs = array();
			for($i=0;$i<$iResult;$i++)
			{
				$rs[$i] = array();
				for($j=0;$j<count($colHeader);$j++)
				{
						$rs[$i][$colHeader[$j]] = mysqli_result($oResult, $i, $j);
						$rs[$i][$j] = mysqli_result($oResult, $i, $j);
				}
				
			}	
			
			return $rs;			
			
		}
	
		//find if the query has the following words
		$array = array("DROP");
		if(0 < count(array_intersect(array_map('strtoupper', preg_split('/\s+/',$str,-1,PREG_SPLIT_NO_EMPTY)), $array)))
		{
			mysqli_select_db($conn, $database);
			$oResult = mysqli_query($conn, $str) or die('Query failed: ' . mysqli_error($conn));
			
			return true;
			
		}
	
		return false;
	}
}
/*################################### */
if (!function_exists('days_in_month')) 
{
	//days in a month
	function days_in_month($month, $year)
	{
		// calculate number of days in a month
		return $month == 2 ? ($year % 4 ? 28 : ($year % 100 ? 29 : ($year % 400 ? 28 : 29))) : (($month - 1) % 7 % 2 ? 30 : 31);
	} 
}
/*################################### */
if (!function_exists('validip')) 
{
	//get client ip, use with getip() function
	function validip($ip) 
	{
	 
		if (!empty($ip) && ip2long($ip)!=-1) 
		{
			$reserved_ips = array ( 
					array('0.0.0.0','2.255.255.255'),
					array('10.0.0.0','10.255.255.255'),
					array('127.0.0.0','127.255.255.255'),
					array('169.254.0.0','169.254.255.255'),
					array('172.16.0.0','172.31.255.255'),
					array('192.0.2.0','192.0.2.255'),
					array('192.168.0.0','192.168.255.255'),
					array('255.255.255.0','255.255.255.255'));
	 
			foreach ($reserved_ips as $r) 
			{
				$min = ip2long($r[0]);
				$max = ip2long($r[1]);
				
				if ((ip2long($ip) >= $min) && (ip2long($ip) <= $max)) return false;
			}
		 
			return true;
	 
		} 
		else 
		{
			return false;
	 
		}
	}
}
 //get client ip
 /*################################### */
if (!function_exists('getip')) 
{
	function getip() 
	{ 
		if (validip($_SERVER["HTTP_CLIENT_IP"])) 
		{
			return $_SERVER["HTTP_CLIENT_IP"];
		}
		
		foreach (explode(",",$_SERVER["HTTP_X_FORWARDED_FOR"]) as $ip) 
		{
			if (validip(trim($ip))) 
			{
				return $ip;
			}
		}
	 
		if (validip($_SERVER["HTTP_X_FORWARDED"])) 
		{
			return $_SERVER["HTTP_X_FORWARDED"];
		} 
		elseif (validip($_SERVER["HTTP_FORWARDED_FOR"])) 
		{
			return $_SERVER["HTTP_FORWARDED_FOR"];
		} 
		elseif (validip($_SERVER["HTTP_FORWARDED"])) 
		{
			return $_SERVER["HTTP_FORWARDED"];
		} 
		elseif (validip($_SERVER["HTTP_X_FORWARDED"])) 
		{
			return $_SERVER["HTTP_X_FORWARDED"];
		} 
		else 
		{
			return $_SERVER["REMOTE_ADDR"];
		}
	}
}
/*################################### */
//get client ip sample

/*
 $Users_IP_address = getip();

echo "<br> your ip is " . $Users_IP_address . "<br>";
*/

/*################################### */

 //initialize varibles with values from submitted form
 /*################################### */
if (!function_exists('processformfield')) 
{
	function processformfield($fields, $stype = "post") 
	{ 
		$fields2 = array();
		
		for($i=0; $i<count($fields); $i++)
		{
			switch($fields[$i][1])
			{
				case "text":
					$initialvalue = "";
					break;
				case "number":
					$initialvalue = 0;
					break;
				case "date":
					$initialvalue = date("Y-m-d", time());
					break;
			}
			
			if($stype == "get")
			{
				if (isset($_GET[$fields[$i][0]])) { $fields2[$fields[$i][0]] = $_GET[$fields[$i][0]]; } else { $fields2[$fields[$i][0]] = $initialvalue; }
			}
			else
			{
				if (isset($_POST[$fields[$i][0]])) { $fields2[$fields[$i][0]] = $_POST[$fields[$i][0]]; } else { $fields2[$fields[$i][0]] = $initialvalue; }
			}

		}	

		return $fields2;
	}
}
/* sample usage */
/*
	$fieldname  = array(
	array("text1", 'text'), 
	array("irwan", 'text'), 
	array("george", 'text'), 
	array("johnson", 'text'), 
	array("ciara", 'text'), 
	array("radio1", 'number')
	);
	
	$fields = array();
	
	if (isset($_POST['fAction'])) { $action = $_POST['fAction']; } else { $action = "no saved"; }
	
	if($action=="test")
	{
		$fields = processformfield($fieldname);
		
		for($i=0; $i<count($fields); $i++)
		{
			echo "variable name: " . $fieldname[$i][0] . " value: " . $fields[$fieldname[$i][0]]."<br>";	
		}
		
	}
?>
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
<input type="text" name="text1" /><br />

<input type="text" name="irwan" /><br />

<input type="text" name="george" /><br />

<input type="text" name="johnson" /><br />

<input type="text" name="ciara" /><br />

<input type="radio" name="radio1" value="test" /> test<br />
<input type="radio" name="radio1" value="tost" /> tost<br />

<input type="submit" value="submit" />
<input type="hidden" name="fAction" value="test" />
</form>
*/

 //used with processformfield function
 //convert array to string to be used in <input type='hidden' value=''/>
 /*################################### */
if (!function_exists('pffarr2str')) 
{
	function pffarr2str($afieldname) 
	{ 
		$str = "";
		foreach($afieldname as $field)
		{		
			$temp = implode(",", $field);
			$str .= $temp . "|";
		}
		
		//return str
		return $str;
	
	}
}

 //used with processformfield function
 //convert string to array to be used in <input type='hidden' value=''/>
 /*################################### */
if (!function_exists('pffstr2arr')) 
{
	function pffstr2arr($str) 
	{ 
		$afirst = explode("|", $str);
		$oriarray = array(array());
		$count = 0;
	
		foreach($afirst as $str)
		{
			if(strlen(trim($str))>0)
			{
				$oriarray[$count] = explode(",",$str);
				$count++;
			}
		}
		
		//return array
		return $oriarray;
	}
}

 //use to generate unique id
 /*################################### */
if (!class_exists('UUID')) 
{

class UUID {
  public static function v3($namespace, $name) {
    if(!self::is_valid($namespace)) return false;

    // Get hexadecimal components of namespace
    $nhex = str_replace(array('-','{','}'), '', $namespace);

    // Binary Value
    $nstr = '';

    // Convert Namespace UUID to bits
    for($i = 0; $i < strlen($nhex); $i+=2) {
      $nstr .= chr(hexdec($nhex[$i].$nhex[$i+1]));
    }

    // Calculate hash value
    $hash = md5($nstr . $name);

    return sprintf('%08s-%04s-%04x-%04x-%12s',

      // 32 bits for "time_low"
      substr($hash, 0, 8),

      // 16 bits for "time_mid"
      substr($hash, 8, 4),

      // 16 bits for "time_hi_and_version",
      // four most significant bits holds version number 3
      (hexdec(substr($hash, 12, 4)) & 0x0fff) | 0x3000,

      // 16 bits, 8 bits for "clk_seq_hi_res",
      // 8 bits for "clk_seq_low",
      // two most significant bits holds zero and one for variant DCE1.1
      (hexdec(substr($hash, 16, 4)) & 0x3fff) | 0x8000,

      // 48 bits for "node"
      substr($hash, 20, 12)
    );
  }

  public static function v4() {
    return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',

      // 32 bits for "time_low"
      mt_rand(0, 0xffff), mt_rand(0, 0xffff),

      // 16 bits for "time_mid"
      mt_rand(0, 0xffff),

      // 16 bits for "time_hi_and_version",
      // four most significant bits holds version number 4
      mt_rand(0, 0x0fff) | 0x4000,

      // 16 bits, 8 bits for "clk_seq_hi_res",
      // 8 bits for "clk_seq_low",
      // two most significant bits holds zero and one for variant DCE1.1
      mt_rand(0, 0x3fff) | 0x8000,

      // 48 bits for "node"
      mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
    );
  }

  public static function v5($namespace, $name) {
    if(!self::is_valid($namespace)) return false;

    // Get hexadecimal components of namespace
    $nhex = str_replace(array('-','{','}'), '', $namespace);

    // Binary Value
    $nstr = '';

    // Convert Namespace UUID to bits
    for($i = 0; $i < strlen($nhex); $i+=2) {
      $nstr .= chr(hexdec($nhex[$i].$nhex[$i+1]));
    }

    // Calculate hash value
    $hash = sha1($nstr . $name);

    return sprintf('%08s-%04s-%04x-%04x-%12s',

      // 32 bits for "time_low"
      substr($hash, 0, 8),

      // 16 bits for "time_mid"
      substr($hash, 8, 4),

      // 16 bits for "time_hi_and_version",
      // four most significant bits holds version number 5
      (hexdec(substr($hash, 12, 4)) & 0x0fff) | 0x5000,

      // 16 bits, 8 bits for "clk_seq_hi_res",
      // 8 bits for "clk_seq_low",
      // two most significant bits holds zero and one for variant DCE1.1
      (hexdec(substr($hash, 16, 4)) & 0x3fff) | 0x8000,

      // 48 bits for "node"
      substr($hash, 20, 12)
    );
  }

  public static function is_valid($uuid) {
    return preg_match('/^\{?[0-9a-f]{8}\-?[0-9a-f]{4}\-?[0-9a-f]{4}\-?'.
                      '[0-9a-f]{4}\-?[0-9a-f]{12}\}?$/i', $uuid) === 1;
  }
}

// Usage
// Named-based UUID.
//$v3uuid = UUID::v3('1546058f-5a25-4334-85ae-e68f2a44bbaf', 'SomeRandomString');
//$v5uuid = UUID::v5('1546058f-5a25-4334-85ae-e68f2a44bbaf', 'SomeRandomString');

// Pseudo-random UUID
//$v4uuid = UUID::v4();
}

 /*################################### */
if (!function_exists('cdatetime')) 
{
	function cdatetime($datestring, $dateformat = 'Y-m-d') 
	{
		try 
		{
			$date = new DateTime($datestring);
		} 
		catch (Exception $e) 
		{
			//echo $e->getMessage();
			//exit(1);
			return 0;
		}
		
		return $date->format($dateformat);
	}
}

?>
