<?php
include '../commons/fpdf/fpdf.php';
class PDF extends FPDF
{ //create class
    function Header() ///header function
    {
        $this->SetY(20);
        $this->SetFont('Arial', 'B', 20);
        $this->Cell(190, 6, " ERP SYSTEM", 0, 0, "R");
        $this->SetFont("Arial", "", "10");
        $this->Ln();
        $date = date("Y-m-d");
        $this->Cell(190, 6, 'Date : ' . $date, "", 1, "R");
    }
    function Footer() ///footer function
    {
        $this->SetY(-20);
        $this->Terms_Singature();
        $this->SetY(-15);
        $this->SetFont('Arial', '', 10);
        $this->Cell(0, 10, 'Page' . $this->PageNo(), "", "", 'C');
    }
    function TableHeading() ///table heading function
    {
        $this->Cell(0, 10, '', 0, 1);
        $this->Cell(0, 10, '', 0, 1);
        $this->SetFont("times", "B", "20");
        $this->Cell(190, 0, 'AVAILABLE INVOICE REPORT', 0, 0, 'C');
        $this->Ln();
        $this->Cell(190, 0, "______________________________", 0, 0, "C");
    }
    function TableBody()
    { ///table body function
        include '../model/Report_Model.php'; ///include  report model
        $ReportObj = new Report(); ///create REPORT object
       
        $row1 = $ReportObj->getItemReport(); ///get result report model
      
        $this->Cell(0,10,'',0,1);
        $this->Cell(0,10,'',0,1);
        $this->SetFont("Arial","B","10");
       
     
        $this->Cell(30, 10, 'ID', 1, "", 'C');
        $this->Cell(36, 10, 'ITEM NAME', 1, "", 'C');
        $this->Cell(30, 10, 'ITEM CATEGORY', 1, "", 'C');
        $this->Cell(30, 10, 'ITEM SUB CATEGORY', 1, "", 'C');
        $this->Cell(32, 10, 'ITEM QUANTITY', 1, "1", 'C');
     
        $counter = 0;
        $this->SetFont("Arial", "", "10");
        $counter++;
        while ($row = $row1->fetch_assoc()) {
            $this->Cell(30, 10, $row["id"], 1, "", 'C');
            $this->Cell(36, 10, $row["item_name"], 1, "", 'C');
            $this->Cell(30, 10, $row["icname"], 1, "", 'C');
            $this->Cell(30, 10, $row["iscname"], 1, "", 'C');
            $this->Cell(32, 10, $row["quantity"], 1, "1", 'C');
        }
    }
    function Terms_Singature()
    { ////terms signature function
        $this->SetFont("Arial", "", "10");
        $this->Cell(190, 15, "..............................................", "", 1, "R");
        $this->Cell(175, 0, "Manager", "", 1, "R");
    }
}
$pdf = new PDF(); /////create pdf object
$pdf->SetTitle("ERP SYSTEM"); ///pdf title
$pdf->AddPage('P', 'A4', 0); ///add page
$pdf->TableHeading(); ///out put table heading value
$pdf->TableBody(); //out put table body value  
$date = date("Y-m-d"); ///curent date 

$filename = "Item_" . $date . ".pdf"; //file name

$pdf->Output();
