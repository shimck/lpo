<?php
error_reporting(0);
require('../fpdf.php');


class PDF extends FPDF
{
	
			// Better table
			function ImprovedTable($header, $data)
			{
				// Column widths
				$w = array(20, 90, 20, 20,30);
				// Header
				$this->SetFont('Arial','B','12');
				for($i=0;$i<count($header);$i++)
					$this->Cell($w[$i],7,$header[$i],1,0,'C');
				$this->Ln();
				// Data
				$this->SetFont('Arial','','10');
				foreach($data as $row)
				{
					$this->Cell($w[0],6,$row[0],'LR');
					$this->Cell($w[1],6,$row[1],'LR');
					$this->Cell($w[2],6,$row[2],'LR',0,'R');
					$this->Cell($w[3],6,$row[3],'LR',0,'R');
					$this->Cell($w[4],6,$row[4],'LR',0,'R');
					
					/*
					$this->Cell($w[2],6,number_format($row[2]),'LR',0,'R');
					$this->Cell($w[3],6,number_format($row[3]),'LR',0,'R');
					$this->Cell($w[4],6,number_format($row[4]),'LR',0,'R');
					*/
					$this->Ln();
				}
				// Closing line
				$this->Cell(array_sum($w),0,'','T');
			}

		
		// Load data
		function LoadData($file)
		{
			// Read file lines
			$lines = file($file);
			$data = array();
			foreach($lines as $line)
				$data[] = explode(';',trim($line));
			return $data;
		}


}		
	
	
	//details from form
	$supplierName = $_POST['supplierName'];
	$supplierAddress = $_POST['supplierAddress'];
	$qn = $_POST['qn'];
	$lpo = '000' . rand(8000,8999);
		
	
	
	$pdf =  New PDF();
	//$tpdf = New PDF();
	
	
	$pdf->AddPage();

	
	$pdf->Image('mlclogo.jpg',9,4,30);
	
	$pdf->SetFont('Arial','B',23);
	$pdf->Cell(80);
	$pdf->Cell(30,19,'Mechanical Lloyd Co. Ltd.',0,0,'C');
	$pdf->Ln();
	$pdf->SetFont('Arial','B',9);
	$pdf->Cell(80);
	$pdf->Cell(30,5,'P.O. BOX 2086, Accra, GHANA W.A.',0,0,'C');
	$pdf->Ln();
	$pdf->Cell(80);
	$pdf->Cell(30,5,'Ring Road West Industrial Area, Telephone: 229312/229318, Fax:229399/227366',0,0,'C');
	$pdf->Ln();
	$pdf->Cell(80);
	$pdf->Cell(30,5,'Bankers: BARCLAYS BANK GHANA LTD. HIGH STREET, ACCRA.',0,0,'C');
	$pdf->Ln();
	$pdf->Cell(80);
	$pdf->Cell(30,5,'STANDARD CHARTERED BANK GHANA LTD.,',0,0,'C');
	$pdf->Ln();
	$pdf->Cell(80);
	$pdf->Cell(30,5,'HIGH STREET, ACCRA.',0,0,'C');
	$pdf->Ln();
	$pdf->Cell(80);
	$pdf->Cell(30,5,'TIN/VAT: 914E000005',0,0,'C');
	$pdf->Ln();
	$pdf->SetFont('Arial','B',15);
	$pdf->Cell(80);
	$pdf->Cell(30,15,'LOCAL PURCHASE ORDER',0,0,'C');
	
$date = date('d/m/20y');
	
	$pdf->Ln();
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(35,15,'Vendor Name:',0,0,'');
	$pdf->SetFont('Arial','',12);
	$pdf->Cell(115,15,$supplierName,0,0);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(15,15,'Date: ',0,0,'');
	$pdf->SetFont('Arial','',12);
	$pdf->Cell(130,15,$date,0,0);

	$pdf->Ln();
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(35,1,'Vendor Address: ',0,0,'');
	$pdf->SetFont('Arial','',12);
	$pdf->Cell(98,1,$supplierAddress,0,0);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(32,1,'LPO Number:  ','',0,'');
	$pdf->SetFont('Arial','',12);
	$pdf->Cell(40,1,$lpo,0,0);	//for demo use random number
	
	
//lpo demo

	 $pdf->Ln();
	 $pdf->SetFont('Arial','B',12);
	 $pdf->Cell(40,15,'Quotation Number:',0,0,'');
	 $pdf->SetFont('Arial','',12);
	 $pdf->Cell(30,15,$qn,0,0);
				
	//table data
	$header = array('Item No.', 'Description', 'Quantity', 'Unit Cost', 'Total Cost');
	$pdf->Ln(20);
	$data = $pdf->LoadData('contents.txt');
	$pdf->SetFont('Arial','',12);
	$pdf->ImprovedTable($header,$data);
	
	//total of all items
	//vat on items
	$pdf->Ln();
	$pdf->SetFont('Arial','B',11);
	$pdf->Cell(156,10,'Sub-Total:',0,0,'R');
	$pdf->SetFont('Arial','',11);
	$pdf->Cell(25,10,'GHS 0.00',0,0,'R');
	$pdf->Ln();
	$pdf->SetFont('Arial','B',11);
	$pdf->Cell(156,10,'VAT(15%) + NHIL(2.5%):',0,0,'R');
	$pdf->SetFont('Arial','',11);
	$pdf->Cell(25,10,'17.5%',0,0,'R');
	$pdf->Ln();
	$pdf->SetFont('Arial','B',11);
	$pdf->Cell(156,10,'Total Cost:',0,0,'R');
	$pdf->SetFont('Arial','',11);
	$pdf->Cell(25,10,'GHS 0.00',0,0,'R');
	
	//authorization
	
	$pdf->SetY(266);
	$pdf->SetX(150);
	$pdf->SetFont('Arial','B',9);
	$pdf->Cell(0,10,'For MECHANICAL LLOYD CO. LTD.');
	
	
	$pdf->Output();


?>