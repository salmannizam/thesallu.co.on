<?php
// Include the main TCPDF library (search for installation path).
include '../include/connection.php';
include '../include/global_function.php';
require_once('tcpdf.php');
include_once '../classes/unlisted_stocks.php';

foreach($_REQUEST as $key => $value) 
		{
		    $data[$key] = $value;
		}

// object
$unlisted_stocks_ob_for_pdf = new UnlistedStocks;

function export_to_pdf($data)
{
	
	// Extend the TCPDF class to create custom Header and Footer
	class MYPDF extends TCPDF { 

	    //Page header
	    public function Header() {
	    	  $image_file = CDN_S3_URI .'/images/stocx-logo.png';
	       //  $this->Image($image_file, 20, 4, 40, '', 'PNG', '', 'T', false, 300, 'R', false, false, 0, false, false, false);
	       //  // $this->Cell(10, 15, 'Audit Report', 0, false, 'R', 0, '', 0, false, 'L', 'L');
	       //  // Set font
	       //  $this->SetFont('helvetica', 'B', 20);

	      $html = '<table><tr><td><img src="'.$image_file.'"></td>
	      							<td align="right"><h1 style="margin-top:50px;"><br>Share Certificate</h1></td>
	      						  </tr></table><hr><\n>';
 			$this->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '', $html, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = 'top', $autopadding = true);
	      $this->SetFont('helvetica', 'B', 20);
	    }

	    // Page footer
	    public function Footer() {
	        // Position at 15 mm from bottom
	        $this->SetY(-15);
	        // Set font
	        $this->SetFont('helvetica', 'I', 8);
	        // Page number
	        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
	    }
	}

	// create new PDF document
	$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

	// set document information
	$pdf->SetCreator(PDF_CREATOR);
	// set default header data
	$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

	// set header and footer fonts
	$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
	$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

	// set default monospaced font
	$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

	// set margins
	$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
	$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
	$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

	// set auto page breaks
	$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

	// set image scale factor
	$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

	// set some language-dependent strings (optional)
	if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	    require_once(dirname(__FILE__).'/lang/eng.php');
	    $pdf->setLanguageArray($l);
	}

	// ---------------------------------------------------------

	// set font
	$pdf->SetFont('Helvetica', '', 11);

	// add a page
	$pdf->AddPage();
	$orderid_decode = base64_decode($data['Order_id']);
	$data['UL_ORD_ID'] = $orderid_decode;
	$opData = $GLOBALS['unlisted_stocks_ob_for_pdf']->get_unlisted_stocks_orders_by_id($data);
	// print_r($opData);die;
	//$pdf->Ln(10); 
	$table ='<table cellpadding="5"  width="100%">
						<tr>
							<td border="1">
									<h3>'. Company_name .' </h3>
							</td>
						</tr>
						
						<tr height="400px">
								<td border="1" width="50%">
									<b>Address : </b><br>'.Address .'<br>
									<b>Pan No : </b> AAHCB2024P <br>
									<b>Email : </b>'. CONTACT_EMAIL .'<br>
									<b>Mobile : </b>'. Mobile_no .'<br>
									<b>DP ID : </b>'. DP_ID .'<br>
									<b>Client ID : </b>'. Client_ID .'<br>
								</td>						
								
								<td width="50%" border="1">
									
									<b>Order No : </b>
									'.$opData[UL_ORD_ID].'<br>
									<b>Bill To : </b>
									'.$opData[name].'<br>
									<b>Pan No : </b>
									'.(!empty($opData[PAN_number]) ? $opData[PAN_number] : "Not Available") .'<br>
									<b>Mobile No : </b>
									'.$opData[phone_number].'<br>
									<b>DP ID : </b>
									'.$opData[DP_ID].'<br>
								</td>						
						</tr>

				</table><br>'; 
	$table .= '<br><br><br><p>Dear <b>'.$opData[name].'</b> <br>
					Thank you for purchasing share with us. Following are the order details. </p>';

	$table .='<table border="1" bordercolor="#B0B0B0" cellpadding="5">
						<thead>
							<tr>
								<th align="center"><b>Share</b></th>
								<th align="center"><b>Order Date</b></th>
								<th align="center"><b>Type</b></th>
								<th align="center"><b>Qty</b></th>
								<th align="center"><b>Price</b></th>
								<th align="center"><b>Amount</b></th>
							</tr>
						</thead>';
				if(count($opData) > 0)
					{	
					$table .='<tr>
									<td>'.$opData['UL_STOCKS_S_NAME'].'</td>
									<td>'.$opData['UL_ORD_DATE'].'</td>
									<td>'.$opData['UL_ORD_TYPE'].'</td>
									<td>'.$opData['UL_ORD_QUANTITY'].'</td>
									<td>'.$opData['UL_ORD_PRICE_PER_SHARE'].'</td>
									<td>'.$opData['UL_ORD_AMOUNT'].'</td>
								</tr>';
					}
				else{
			        	$table .= '<tr>
										<td colspan="6">No Record Found</td>		
									</tr>';
			      }
	$table .='</table>';

					$stamp = CDN_S3_URI .'/images/BV-+Sign.jpg';
			      $table .= '<br><br><br><br><br>
			      				<table>
			      					
										<tr>
											<td align="center">*This is a digital certificate and does not require any signature*</td>
										</tr>
									</table>';




	$tbl = $table;
	$pdf->writeHTML($tbl, true, false, false, false, '');

	$pdf->Ln(6);

   $pdf->Output('file.pdf', 'I'); // show pdf
}

	export_to_pdf($data);
?>