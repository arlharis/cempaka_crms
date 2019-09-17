<?php
/**
 * HTML2PDF Librairy - example
 *
 * HTML => PDF convertor
 * distributed under the LGPL License
 *
 * @author: Laurent MINGUET <webmaster@html2pdf.fr>
 *
 * isset($_GET['vuehtml']) is not mandatory
 * it allow to display the result in the HTML format
 */

    // get the HTML
    ob_start();
    include(dirname(__FILE__).'/emergency_print_page.inc.php');
	//include(dirname(__FILE__).'/ticket-print.php');
    $content = ob_get_clean();
	
	$datenow = date("dmY");
	$printname = "Emergency Contact List".$datenow;
	
	//$files = "report_print";
	//$files2 = "report_print/report_stock_purchase_print_".$datenow;
	
	/*if (!file_exists($files."/".$printname)) {
		mkdir($files."/".$printname, 0777, true);
	}*/
	
    // convert to PDF
    require_once('includes/html2pdf.class.php');
    try
    {
        // A4 = (width : 8.27)  (height : 11.69) 
		// A3 = (width : 11.69) (height : 16.54)
		// LETTER = (width : 9.5) (height : 11.00)
		
		$width_in_mm = 210; 
		$height_in_mm = 297;
		
		//$html2pdf = new HTML2PDF('P', 'A4', 'en', true, 'UTF-8', 3);
        $html2pdf = new HTML2PDF('P', array($width_in_mm,$height_in_mm), 'en', true, 'UTF-8',  array(5, 3, 0, 0));
		//$html2pdf->pdf->SetDisplayMode('fullpage');  
		//$html2pdf->addFont('Times', '', '/../_tcpdf_5.0.002/fonts/times.php');  
		//$html2pdf->SetFont('times','',14);
		$html2pdf->writeHTML($content, isset($_GET['vuehtml']));
		ob_end_clean();
        $html2pdf->Output($printname.'.pdf','I');
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }
/**
     --> $html2pdf->Output()
	 * Send the document to a given destination: string, local file or browser.
     * Dest can be :
     *  I : send the file inline to the browser (default). The plug-in is used if available. The name given by name is used when one selects the "Save as" option on the link generating the PDF.
     *  D : send to the browser and force a file download with the name given by name.
     *  F : save to a local server file with the name given by name.
     *  S : return the document as a string. name is ignored.
     *  FI: equivalent to F + I option
     *  FD: equivalent to F + D option
     *  true  => I
     *  false => S
	 
	 --> $html2pdf->AddFont('Comic','I','comici.php');
	 * Font style. The possible values ​​are (regardless of case):
	 * Empty string: normal
	 * B : Fat
	 * I : Italic
	 * BIor IB: bold italics
	 * The default is the normal style.
*/