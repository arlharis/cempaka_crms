<?php

class Paging 
{
	private $oConnection;
	private $sDatabase;
	private $iPageRange;
	private $iRecordPerPage;
	private $sLinkTo;
	//private $iCurrentpage;
	private $sPrefix;
	private $sQuery; //initial query to calculate paging only (faster / simple)	
	private $sQuery2; //actual query to query data/column (slower)
	//private $sOrderBy;
	//private $sOrder;
	
	/*************************************************************/
	public $aFooterLink;
	public $sFooterLink;
	public $sFirstPage;
	public $sLastPage;

	public $aRecordSet;
	public $iError;
	public $sError;

    // Add $num articles of $artnr to the cart
	public function __construct() {
        $argv = func_get_args();
        switch( func_num_args() ) {
            case 7:
				//function __construct1($oConnection, $sDatabase, $sQuery, $sQuery2="", $iPageRange=5, $iRecordPerPage=50, $sPrefix)
                self::__construct1( $argv[0], $argv[1], $argv[2], $argv[3], $argv[4], $argv[5], $argv[6] );
                break;
            case 3:
				//function __construct2($oConnection, $sDatabase, $sQuery)
                self::__construct2( $argv[0], $argv[1], $argv[2] );
				break;
         }
    }
	
	function __construct1($oConnection, $sDatabase, $sQuery, $sQuery2="", $iPageRange=5, $iRecordPerPage=50, $sPrefix)
	{
		if(is_null($oConnection) or $oConnection===false)
			throw new Exception("Connection error, please check you mysql connection");
			
		if(strlen($sDatabase)==0)
			throw new Exception("Database error, database not set");

		if(strlen($sPrefix)==0)
			throw new Exception("Prefix required");	

		if(strlen($sQuery2)==0)
			$this->sQuery2 = $sQuery;	
		else
			$this->sQuery2 = $sQuery2;	
			
		$this->oConnection = $oConnection;
		$this->sDatabase = $sDatabase;
		$this->iPageRange = $iPageRange;
		$this->iRecordPerPage = $iRecordPerPage;
		$this->sQuery = $sQuery;
		$this->sPrefix = $sPrefix;		
	}

	function __construct2($oConnection, $sDatabase, $sQuery)
	{
		if(is_null($oConnection) or $oConnection===false)
			throw new Exception("Connection error, please check you mysql connection");
			
		if(strlen($sDatabase)==0)
			throw new Exception("Database error, database not set");


		$this->sQuery2 = $sQuery;		
		$this->oConnection = $oConnection;
		$this->sDatabase = $sDatabase;
		$this->iPageRange = 5;
		$this->iRecordPerPage = 50;
		$this->sQuery = $sQuery;
		$this->sPrefix = "page_";
		
	}

	/*################################### */
	private function mysqli_result($oResult, $i, $j=0)
	{
		$oResult->data_seek($i); 
		$datarow = $oResult->fetch_array(); 
		return $datarow[$j]; 

	}
	
	/*################################### */
	private function sqlQuery($str, $database, $conn)
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
			return mysqli_affected_rows();				
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
    
	//public function processPage($iCurrentPage=0, $sOrderBy=" ", $sOrder=" ") 
	public function processPage() 
	{
		
		$p = $this->sPrefix."p";
		//$ob = $this->sPrefix."orderby";
		//$o = $this->sPrefix."order";
		
		if(isset($_GET[$p])) { $iCurrentPage = $_GET[$p]; } else { $iCurrentPage = 0; }								
		//if(isset($_GET[$ob])) { $sOrderBy = $_GET[$ob]; } else { $sOrderBy = ""; }
		//if(isset($_GET[$o])) { $sOrder = $_GET[$o]; } else { $sOrder = ""; }


		/************************************************************************************************/
		$mystring = strrev($_SERVER["REQUEST_URI"]);
		$findme = "/";
		$pos1 = strpos($mystring, $findme);

		$findme = "?";
		$pos2 = strpos($mystring, $findme);
		
		$newstring = strrev(substr($mystring, 0, $pos1));
		
		//$sBeginning = strrev(substr($mystring, $pos1, $pos2));
		$sBeginning = str_replace((dirname($_SERVER['PHP_SELF'])."/"), "", $_SERVER['PHP_SELF']);	
		if(substr($sBeginning,0,1)=="/")
		{
			$sBeginning = substr($sBeginning,1,strlen($sBeginning));
		}

		//$sBeginning = str_replace((dirname($_SERVER['PHP_SELF'])."/"), "", $_SERVER['PHP_SELF']);
		//echo $sBeginning;
		//echo "<br>";
		
		////////////**************************************************
		//$aParameters = preg_split('/\?|&/',$newstring,-1,PREG_SPLIT_NO_EMPTY);
		$aParameters = preg_split('/\?|&/',$newstring,-1,PREG_SPLIT_NO_EMPTY);
		//$aParameters = split("\?|&", $newstring);
		//echo print_r($aParameters)."<br>";
		//echo count($aParameters);
		$this->sLinkTo = "";

		$aParameters2=array();
		$iParameters2=0;
		
		for($i=0;$i<count($aParameters);$i++)
		{
			if(strlen(trim($aParameters[$i]))>0)
			{
				$iFound = 0;
				if(strpos($aParameters[$i], $sBeginning)===false)
				{
				}
				else
				{
					$iFound = 1;
				}

				if(strpos($aParameters[$i], $p)===false)
				{
				}
				else
				{
					$iFound = 1;
				}
		
				if($iFound==0)
				{
					$aParameters2[$iParameters2]=$aParameters[$i];
					$iParameters2++;	
				}

				//echo $aParameters[$i];
				//echo "<br>";		
			}
		}
		
		for($i=0;$i<count($aParameters2);$i++)
		{
			if(strpos($this->sLinkTo, "?")===false)
			{
				$this->sLinkTo .= "?" . $aParameters2[$i];					
			}
			else
			{
				$this->sLinkTo .= "&" . $aParameters2[$i];					
			}
		
		}			
		
		//echo $this->sLinkTo."<br>";
		/************************************************************************************************/
			
		//$strOrderBy="";
		//$strOrderBy= " ORDER BY " . $sOrderBy . " " . $sOrder;
		/*switch($sOrderBy)
		{
			default:
				$strOrderBy = " ";
		}*/
		
		//$strOrderLink = $ob."=".$sOrderBy."&".$o."=".$sOrder;
			
		/*************************************************************************************************/
	
		//$this->sQuery .= $strOrderBy;

		$msc=microtime(true);

		$aResult = sqlQuery($this->sQuery, $this->sDatabase, $this->oConnection);
		$iResult = count($aResult);

		$msc=microtime(true)-$msc;
		//echo "first query: ".number_format($msc,5).' seconds<br>'; // in seconds		

		$msc=microtime(true);

		if($iCurrentPage == 0) 
			$iCurrentPage = 1;
		
		if($iResult > 0)
		{
			//link to what page?
			//$this->sLinkTo = $this->sLinkTo; //'** itself
			
			//note: we use ===, simple use == will not work.
			// because if the first position is found, 0 will be returned. The statement (0 == false) evaluates 
			// to true.		

			/*if(strpos($this->sLinkTo, "?")===false)
			{
				$this->sLinkTo .= "?";					
			}
			else
			{
				$this->sLinkTo .= "&";					
			}*/
			
			//$this->sLinkTo .= "&rpp=" . $this->iRecordPerPage;
					
			$sLinkStr = "";
			$iNumRows = $iResult - 1;
						
			if($iCurrentPage - $this->iPageRange > 0)
			{
				if(strpos($this->sLinkTo, "?")===false)
				{
					$sLinkStr = $this->sLinkTo . "?".$p."=1";		
				}
				else
				{
					$sLinkStr = $this->sLinkTo . "&".$p."=1";			
				}

				//$sLinkStr = $this->sLinkTo . "&".$p."=1";
				
			}
	
			$iPageCounter=0;	
			$iPageCounter2=0;
			$sPaging = "";			
			$sPaging2 = array();
			
			do
			{ 
				$iPageCounter = ($iPageCounter + 1);
				
				//current page 
				if($iCurrentPage == $iPageCounter)
				{
					$sTempCSS = $this->sPrefix."CurrentCSS";
					$sPaging = $sPaging .  "<span class='".$sTempCSS."'>" . $iPageCounter . "</span>";
					
					$sPaging2[$iPageCounter2] = "<span class='".$sTempCSS."'>" . $iPageCounter . "</span>";
					$iPageCounter2++;
				}
				else
				{
					if($iPageCounter == ($iCurrentPage - $this->iPageRange))
					{					
						$sTempCSS = $this->sPrefix."PreviousCSS";
						
						//$sLinkStr = $this->sLinkTo . "&".$p."=" . ($iCurrentPage - $this->iPageRange);

						if(strpos($this->sLinkTo, "?")===false)
						{
							$sLinkStr = $this->sLinkTo . "?".$p."=" . ($iCurrentPage - $this->iPageRange);
						}
						else
						{
							$sLinkStr = $this->sLinkTo . "&".$p."=" . ($iCurrentPage - $this->iPageRange);
						}
						
						$sPaging = $sPaging .  "<span class='".$sTempCSS."'><a href=\"" . $sLinkStr . "\" title=\"Previous Page\">" . " << </a></span>&nbsp;";					
						
						$sPaging2[$iPageCounter2] = "<span class='".$sTempCSS."'><a href=\"" . $sLinkStr . "\" title=\"Previous Page\">" . " << </a></span>";
						$iPageCounter2++;
						
					}//End If
					
					if($this->iPageRange > $iCurrentPage)
						$iTemp = ($iCurrentPage - $this->iPageRange);
					else
						$iTemp = 0;
					
					if($iPageCounter > ($iCurrentPage - $this->iPageRange) and ($iPageCounter + $iTemp) < ($iCurrentPage + $this->iPageRange))
					{
						$sTempCSS = $this->sPrefix."PagesCSS";
						//$sLinkStr = $this->sLinkTo . "&".$p."=" . $iPageCounter;
						if(strpos($this->sLinkTo, "?")===false)
						{
							$sLinkStr = $this->sLinkTo . "?".$p."=" . $iPageCounter;
						}
						else
						{
							$sLinkStr = $this->sLinkTo . "&".$p."=" . $iPageCounter;
						}

						$sPaging = $sPaging .  " <span class='".$sTempCSS."'><a href=\"" . $sLinkStr . "\">" . $iPageCounter . "</a></span> ";
						
						$sPaging2[$iPageCounter2] = "<span class='".$sTempCSS."'><a href=\"" . $sLinkStr . "\">" . $iPageCounter . "</a></span>";
						$iPageCounter2++;					
					}
	
					if(($iPageCounter + $iTemp) == ($iCurrentPage + $this->iPageRange))
					{					
						$sTempCSS = $this->sPrefix."NextCSS";
						
						//$sLinkStr = $this->sLinkTo . "&".$p."=" . ($iCurrentPage + $this->iPageRange);
						
						if(strpos($this->sLinkTo, "?")===false)
						{
							$sLinkStr = $this->sLinkTo . "?".$p."=" . ($iCurrentPage + $this->iPageRange);
						}
						else
						{
							$sLinkStr = $this->sLinkTo . "&".$p."=" . ($iCurrentPage + $this->iPageRange);
						}

						$sPaging = $sPaging .  "<span class='". $sTempCSS ."'><a href=\"" . $sLinkStr . "\" title=\"Next Page\">" . " >> </a></span>&nbsp;";
						
						$sPaging2[$iPageCounter2] = "<span class='". $sTempCSS ."'><a href=\"" . $sLinkStr . "\" title=\"Next Page\">" . " >> </a></span>";
						$iPageCounter2++;						
					}//End If
	
				}
	
				$iNumRows = ($iNumRows - $this->iRecordPerPage);
			}while($iNumRows >= 0); 
				
			//$this->sFirstPage = $this->sLinkTo."&".$p."=1";
			if(strpos($this->sLinkTo, "?")===false)
			{
				$this->sFirstPage = $this->sLinkTo."?".$p."=1";
			}
			else
			{
				$this->sFirstPage = $this->sLinkTo."&".$p."=1";
			}
			
			//$PGsLastPage = $PGsLinkTo."&p=".ceil(($PGiResult - 1)/$PGiRecordPerPage);
			//$this->sLastPage = $this->sLinkTo."&".$p."=". $iPageCounter;

			if(strpos($this->sLinkTo, "?")===false)
			{
				$this->sLastPage = $this->sLinkTo."?".$p."=". $iPageCounter;
			}
			else
			{
				$this->sLastPage = $this->sLinkTo."&".$p."=". $iPageCounter;
			}
	
			$sTempCSS = $this->sPrefix."FirstCSS";
			$this->sFirstPage = " <span class='".$sTempCSS."'><a href=\"" . $this->sFirstPage . "\" title=\"First Page\">First</a></span> ";
			
			$sTempCSS = $this->sPrefix."LastCSS";
			$this->sLastPage = " <span class='".$sTempCSS."'><a href=\"" . $this->sLastPage . "\" title=\"Last Page\">Last</a></span> ";	
						
			if(($iCurrentPage + $iPageCounter - 1) < $iPageCounter)
			{
				//$sLinkStr = $this->sLinkTo . "&".$p."=" . $iPageCounter;
				if(strpos($this->sLinkTo, "?")===false)
				{
					$sLinkStr = $this->sLinkTo . "?".$p."=" . $iPageCounter;
				}
				else
				{
					$sLinkStr = $this->sLinkTo . "&".$p."=" . $iPageCounter;
				}

			}
	
			$iNumRows = ($iResult - 1);
			$iStartAt = ($iCurrentPage - 1) * $this->iRecordPerPage;
			$iEndAt = $iStartAt + $this->iRecordPerPage - 1;
			if($iEndAt > $iNumRows)
				$iEndAt = $iNumRows;
	
		}	

		if(isset($sPaging) and isset($sPaging2))
		{
			$this->sFooterLink = $sPaging;
			$this->aFooterLink = $sPaging2;
		}
		/*************************************************************************************************/
		//show content with the same query, accept for the last bit -> limit %s, %s
		$msc=microtime(true)-$msc;
		//echo "paging: ".number_format($msc,5).' seconds<br>'; // in seconds		


		$this->sQuery2 = $this->sQuery2 . " limit " . ($this->iRecordPerPage*($iCurrentPage-1)).", ".($this->iRecordPerPage).";";
	
		$msc=microtime(true);

		$this->aRecordSet = sqlQuery($this->sQuery2, $this->sDatabase, $this->oConnection);		

		$msc=microtime(true)-$msc;
		//echo "second query: ".number_format($msc,5).' seconds<br>'; // in seconds


		/*************************************************************************************************/
		//....... show content on page........
	
		/*for($i=0;$i<count($oPaging->aRecordSet);$i++)
		{
			echo $object->aRecordSet[$i]["username"];
			echo ", ";
			echo $object->aRecordSet[$i]["email"];
			echo ", ";		
			echo $object->aRecordSet[$i]["lastlogin"];
			echo "<br>";
		}*/
		
		/*************************************************************************************************/
		
		
		//....... show navigation at end of page........
		//print navigation
		
		//for default, use this
		//echo "<font size=\"2\">" .$object->sFirstPage." ".$object->sPaging." ".$object->sLastPage."</font>";
		
		
		//for flexibility, use the following
		/*
		echo $object->sFirstPage;
		for($i=0;$i<count($object->sPaging2);$i++)
		{
			echo "<br>";	
			echo $object->sPaging2[$i];
		}		
		echo "<br>";	
		echo $object->sLastPage;	
		*/
		

	
	//**************************************************************************************************************		

    }
	
}
