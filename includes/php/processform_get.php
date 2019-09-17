<?php

	//include "../functions.php";
	//require "../includes/php/encrypt-js-php.php";
	
	if (isset($_GET['processform_type'])) { $processform_type = $_GET['processform_type']; } else { $processform_type = "javascript"; }

	$fields = array();
	//echo $processform_type;
	//if javascript ajax and normal use this function
	if($processform_type === "javascript" || $processform_type === "normal")
	{
		
		$chunks = array();
		$fieldname = array();
		
		//if (isset($_GET['afields'])) { $afields = $_GET['afields']; } else { $afields = ""; }
		if (isset($_GET['afields'])) 
		{ 
			$afields = $_GET['afields']; 
			if($_GET['iencrypt']==1)
			{
				$afields = mcrypt_decrypt (MCRYPT_DES, "messages", hexToString ($afields), MCRYPT_MODE_ECB);
				//print_r($afields);
			}
		} 
		else 
		{ 
			$afields = ""; 
		}
		//echo $_GET['afields']." <br>";				

		if(strlen($afields)>0)
		{
			$chunks = explode( '|', $afields ); 
		}
		
		
		for($i=0;$i<count($chunks);$i++)
		{
			//$fields[$i] = array();
			$fieldname[$i] = explode( ',', $chunks[$i]); 
			$fieldname[$i][0] = rawurlencode(trim($fieldname[$i][0])); 
			$fieldname[$i][1] = rawurlencode(trim($fieldname[$i][1])); 	
		}
		
		//echo $fieldname[0][0];
		//if("my_isame" == $fieldname[3][0])
			//echo "same<br>";
			
		$fields = processformfield($fieldname, "get");
		
		//print_r($fieldname);
		$str = "";
		for($i=0; $i<count($fieldname); $i++)
		{
			$str .= "variable name: " . $fieldname[$i][0] . " value: " . rawurldecode($fields[$fieldname[$i][0]])."<br>";	
			//$str .= "variable name: " . $fieldname[$i][0] . " value: " . rawurldecode($fields[0])."<br>";	
		}
	
		//echo count($chunks);
		//echo count($fields);
		//echo "<br>".$str;
	
	}
	else
	{
		//if jquery use this function
		if (isset($_GET['parameters'])) { $parameters = $_GET['parameters']; } else { $parameters = ""; }
		$fieldname = array();
		$fields = array();
		//echo $parameters;	
		//include "../functions.php";

		for($i=0; $i<count($parameters); $i++)
		{
			if(strlen(rawurldecode(trim($parameters[$i][2])))==0)
			{
				switch($parameters[$i][1])
				{
					case "text":
					{
						$parameters[$i][2] = "";
						break;
					}
					
					case "number":
					{
						$parameters[$i][2] = 0;
						break;
					}
					
					case "date":
					{
						$parameters[$i][2] = date("Y-m-d", time());
						break;
					}
				}
			}
			//$str .= "variable name: " . $parameters[$i][0] . " value: " . rawurldecode($parameters[$i][2])."<br>";	
			//$str .= "variable name: " . $parameters[$i][0] . " value: " . rawurldecode($fields[$parameters[$i][0]])."<br>";	
			$fields[$parameters[$i][0]] = rawurldecode(trim($parameters[$i][2]));
			//echo $parameters[$i][0] . ":"  . $parameters[$i][1] . " - ";
			//$fieldname[$i][0] = $parameters[$i][0];	
			//$fieldname[$i][1] = $parameters[$i][1];	
		}
				
		//print_r($fieldname);
		//$fields = processformfield($fieldname);

		$str = "";
		for($i=0; $i<count($parameters); $i++)
		{
			//$str .= "variable name: " . $fieldname[$i][0] . " value: " . rawurldecode($fieldname[$i][0])."<br>";	
			//$str .= "variable name: " . $parameters[$i][0] . " value: " . rawurldecode($fields[$parameters[$i][0]])."<br>";	
			$str .= "variable name: " . $parameters[$i][0] . " value: " . rawurldecode($fields[$parameters[$i][0]])."<br>";	
		}
		
		//echo count($fields);
		//echo $str;
	}
?>