//this function is used wt php functions written in function.php
//the following function adds ?offset=(xxxx) where xxxx is time offset
//to all links on the first page, and set session. (please view 
function setLinks() 
{
	now = new Date();
	offset = now.getTimezoneOffset();
	
	for ( iSetLinksLoop = 0; iSetLinksLoop < document.links.length; iSetLinksLoop++ ) 
	{
		with ( document.links[iSetLinksLoop] ) 
		{
			//document.write(document.links[i]+"<br>");  	
		
			if ( href.indexOf('http://checknumbers.pit89.com') == 0 ) 
			{
				if ( href.indexOf('?') == -1 ) 
				{
					href += '?offset=' + offset;
				} 
				else 
				{
					href += '&offset=' + offset;
				}
			}
		}
	}
}

function LTrim(str)
/***
	 PURPOSE: Remove leading blanks from our string.
	 IN: str - the string we want to LTrim

	 RETVAL: An LTrimmed string!
***/
{
	 var whitespace = new String(" \t\n\r");

	 var s = new String(str);

	 if (whitespace.indexOf(s.charAt(0)) != -1) {
		// We have a string with leading blank(s)...

		var j=0, i = s.length;

		// Iterate from the far left of string until we
		// don't have any more whitespace...
		while (j < i && whitespace.indexOf(s.charAt(j)) != -1)
		    j++;


		// Get the substring from the first non-whitespace
		// character to the end of the string...
		s = s.substring(j, i);
	 }

	 return s;
}

function RTrim(str)
/***
	 PURPOSE: Remove trailing blanks from our string.
	 IN: str - the string we want to RTrim

	 RETVAL: An RTrimmed string!
***/
{
	 // We don't want to trip JUST spaces, but also tabs,
	 // line feeds, etc.  Add anything else you want to
	 // "trim" here in Whitespace
	 var whitespace = new String(" \t\n\r");

	 var s = new String(str);

	 if (whitespace.indexOf(s.charAt(s.length-1)) != -1) {
		// We have a string with trailing blank(s)...

		var i = s.length - 1;       // Get length of string

		// Iterate from the far right of string until we
		// don't have any more whitespace...
		while (i >= 0 && whitespace.indexOf(s.charAt(i)) != -1)
		    i--;


		// Get the substring from the front of the string to
		// where the last non-whitespace character is...
		s = s.substring(0, i+1);
	 }

	 return s;
}

function Trim(str)
/***
	 PURPOSE: Remove trailing and leading blanks from our string.
	 IN: str - the string we want to Trim

	 RETVAL: A Trimmed string!
***/
{
	 return RTrim(LTrim(str));
}

function Len(str)
/***
	 IN: str - the string whose length we are interested in

	 RETVAL: The number of characters in the string
***/
{  return String(str).length;  }

function Left(str, n)
/***
	 IN: str - the string we are LEFTing
		n - the number of characters we want to return

	 RETVAL: n characters from the left side of the string
***/
{
	 if (n <= 0)     // Invalid bound, return blank string
		    return "";
	 else if (n > String(str).length)   // Invalid bound, return
		    return str;                // entire string
	 else // Valid bound, return appropriate substring
		    return String(str).substring(0,n);
}

function Right(str, n)
/***
	 IN: str - the string we are RIGHTing
		n - the number of characters we want to return

	 RETVAL: n characters from the right side of the string
***/
{
	 if (n <= 0)     // Invalid bound, return blank string
	    return "";
	 else if (n > String(str).length)   // Invalid bound, return
	    return str;                     // entire string
	 else { // Valid bound, return appropriate substring
	    var iLen = String(str).length;
	    return String(str).substring(iLen, iLen - n);
	 }
}

function Mid(str, start, len)
/***
	 IN: str - the string we are LEFTing
		start - our string's starting position (0 based!!)
		len - how many characters from start we want to get

	 RETVAL: The substring from start to start+len
***/
{
	 // Make sure start and len are within proper bounds
	 if (start < 0 || len < 0) return "";

	 var iEnd, iLen = String(str).length;
	 if (start + len > iLen)
		    iEnd = iLen;
	 else
		    iEnd = start + len;

	 return String(str).substring(start,iEnd);
}


// Keep in mind that strings in JavaScript are zero-based, so if you ask
// for Mid("Hello",1,1), you will get "e", not "H".  To get "H", you would
// simply type in Mid("Hello",0,1)

// You can alter the above function so that the string is one-based.  Just
// check to make sure start is not <= 0, alter the iEnd = start + len to
// iEnd = (start - 1) + len, and in your final return statement, just
// return ...substring(start-1,iEnd)
// InStr function written by: Steve Bamelis - steve.bamelis@pandora.be

function InStr(strSearch, charSearchFor)
/*
InStr(strSearch, charSearchFor) : Returns the first location a substring (SearchForStr)
                           was found in the string str.  (If the character is not
                           found, -1 is returned.)
                           
Requires use of:
	Mid function
	Len function
*/
{
	for (iInStrLoop=0; iInStrLoop < Len(strSearch); iInStrLoop++)
	{
	    if (charSearchFor == Mid(strSearch, iInStrLoop, 1))
	    {
			return iInStrLoop;
	    }
	}
	return -1;
}


/***********************************************************************/
function IsNumeric(strString)
   //  check for valid numeric strings	
   {
   var strValidChars = "0123456789.-";
   var strChar;
   var blnResult = true;

   if (strString.length == 0) return false;

   //  test strString consists of valid characters listed above
   for (i = 0; i < strString.length && blnResult == true; i++)
      {
      strChar = strString.charAt(i);
      if (strValidChars.indexOf(strChar) == -1)
         {
         blnResult = false;
         }
      }
   return blnResult;
   }


function IsTime(strString)
//check time with 00:00 format
{
   var strValidChars = "0123456789";
   var strChar;
   
	if(strString.length!=5) return false;
	
   	strChar = strString.charAt(0);
   	if (strValidChars.indexOf(strChar) == -1) return false;

   	strChar = strString.charAt(1);
   	if (strValidChars.indexOf(strChar) == -1) return false;

   	strChar = strString.charAt(3);
   	if (strValidChars.indexOf(strChar) == -1) return false;

   	strChar = strString.charAt(4);
   	if (strValidChars.indexOf(strChar) == -1) return false;

	//test strSTring consist of valid time
	strChar = Mid(strString, 0, 2);
	if(strChar<0 || strChar >24) return false;
	
	strChar = strString.charAt(2);
	if(strChar!=":") return false;

	strChar = Mid(strString, 3, 2);
	if(strChar<0 || strChar >59) return false;

	return true;
	
}

function parseDec(val,places,sep) {

	// This function takes two arguments:
	//   (string || number)  val
	//            (integer)  places
	//             (string)  sep
	// val is the numeric string or number to parse
	// places represents the number of decimal
	// places to return at the end of the parse.
	// sep is an optional string to be used to separate
	// the whole units from the decimal units (default: '.')

	val = '' + val;
		// Implicitly cast val to (string)
	
	if (!sep) {
		sep = '.';
		// If separator isn't specified, then use a decimal point '.'
	}
	
	if (!places) { places = 0; }
	
	places = parseInt(places);
		// Make sure places is an integer
	
	if (!parseFloat(val)) {
		// If val is null, zero, NaN, or not specified, then
		// assume val to be zero.  Add 'places' number of zeros after
		// the separator 'sep', and then return the value.  We're done here.
		val = '0';
		if (places > 0) {
			val += sep;
			while (val.substring((val.indexOf(sep))).length <= places) {
				val += '0';
			}
		}
		return val;
	}



	if ((val.indexOf('.') > -1) && (sep != '.')) {
		val = val.substring(0,val.indexOf('.')) + sep + val.substring(val.indexOf('.')+1);
			// If we're using a separator other than '.' then convert now.
	}
		
	if (val.indexOf(sep) > -1) {
		// If our val has a separator, then cut our value
		// into pre and post 'decimal' based upon the separator.
		pre = val.substring(0,val.indexOf(sep));
		post = val.substring(val.indexOf(sep)+1);
	} else {
		// Otherwise pre gets everything and post gets nothing.
		pre = val;
		post = '';
	}
	
	//alert(post);
	
	if (places > 0) {
		// If we're dealing with a decimal then...		
		
		var k = 0;
		var j = 0;
		pre1post = '';
		
		//alert(post);
		for(k=0;k<6;k++)
		{
			
			if(parseInt(Mid(post,k,1))>0)
				break;
			else
				pre1post = pre1post + "0";
			
		}
		
		k=k-1;
			
		//alert(pre1post);
		post = Right(post, (post.length-pre1post.length));
		
		post = post.substring(0,(places+1-k));
			// We care most about the digit after 'places'

		if (post.length > places) {
			// If we have trailing decimal places then...
			
			//alert (parseInt(post.substring(post.length - 1)));

			if ( parseInt(post.substring(post.length - 1)) > 4 ) {
				post = '' + Math.round(parseInt(post) / 10);
				//post = '' + post.substring(0,post.length - 2) + (1/Math.pow(10,places));
				//post = ('' + post.substring(0,post.length - 2)) + (parseInt(post.substring(post.length - 1)) + 1);
			} else {
				post = '' + Math.round(parseInt(post));
			}
		}
		
		if (post.length > places) {
			post = '' + Math.round(parseInt(post.substring(0,places)));
		} else if (post.length < places) {
			while (post.length < places) {
				post += '0';
			}
		}
	
	} else {

		if (parseInt((post.substring(0,1))) > 4) {
			pre = '' + (parseInt(pre) + 1);
		} else {
			pre = '' + (parseInt(pre));	
		}
		post = '';
	}
	
	sep = (post.length > 0) ? sep : '';
		// Should we use a separator?

	val = pre + sep + pre1post + Left(post,(post.length - pre1post.length));
		// Rebuild val
	
	val = Left(val, (parseInt(InStr(val, sep)) + parseInt(places)+1));
	//val = Left(val, (parseInt(val.substring(sep)) + parseInt(places)) );

	return val;
}

function parseMoney(val,sep) {

	// Specialized version of parseDec useful for
	// parsing money-related data.  Arguments:
	//   (string || number)  val
	//             (string)  sep
	// val is the monetary value to be parsed,
	// sep is an optional decimal separator (default: '.')
	
	return parseDec(val,2,sep);
}

function sepToDec(val,sep) {

	val = '' + val;

	if ((val.indexOf(sep) > -1) && (sep != '.')) {
		val = val.substring(0,val.indexOf(sep)) + '.' + val.substring(val.indexOf(sep)+1);
	}
	
	return val;
}

function decToSep(val,sep) {

	val = '' + val;
	sep = '' + sep;

	if ((val.indexOf('.') > -1) && (sep.length > 0)) {
		val = val.substring(0,val.indexOf('.')) + sep + val.substring(val.indexOf('.')+1);
	}

	return val;
}

//hide/show block/div
//parse div id
function showHideBlock(str)
{
	var oObject = document.getElementById(str);
	
	if(oObject.style.display == "none")
	{
		oObject.style.display = "block";
	}
	else
	{
		oObject.style.display = "none";		
	}

}

//new line function
function nl2br (str, is_xhtml) {   
var breakTag = (is_xhtml || typeof is_xhtml === 'undefined') ? '<br />' : '<br>';    
return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1'+ breakTag +'$2');
}

//decode php's rawurlencode
function rawurlencode (str) {
    str = (str+'').toString();        
    return encodeURIComponent(str).replace(/!/g, '%21').replace(/'/g, '%27').replace(/\(/g, '%28').replace(/\)/g, '%29').replace(/\*/g, '%2A');
	//return encodeURIComponent(str).replace(/!/g, '%21').replace(/'/g, '%27').replace(/\(/g, '%28').replace(/\)/g, '%29').replace(/\*/g, '%2A').replace(/%20/g, '+');	
}




function check(option)
{
	switch (option)
	{
		case 1:
		alert ("hello");
		break;
		
		
		
	};
}
