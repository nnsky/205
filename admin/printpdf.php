<?php
include "../pdf/fpdf.php";

include "../koneksi.php";
$get=$_GET["id"];
$select="select *from quote where id=$get";
$query=mysqli_query($conn,$select);
$array=mysqli_fetch_array($query);
$a=explode(",",$array["desk"]);
$b=explode(",",$array["jumlah"]);
$c=explode(",",$array["harga"]);
$f=explode(",",$array["diskon"]);
$e=count ($a);

class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image('../img/q3.png',10,4,80);
    // Arial bold 15
     $this->Image('../img/q4.png',135,4,60);
    $this->Ln(7);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-40);
    // Arial italic 8
   
	$this->SetFont("times","b","12");
	$this->Cell(195,0,'If you have any questions about this price quote, please contact',0,0,'C',1);
	$this->ln(5);
	$this->SetFont("times","b","10");
	$this->Cell(195,0,'Phone: 021-4205550 (WA) ; E-Mail : online@chandrakarya.com',0,0,'C',1);
	$this->ln(10);
	$this->SetFont("times","b","18");
	$this->Cell(195,0,'Thank you for your Business!',0,0,'C',1);
	$this->ln(5);
	}
}

$pdf=new PDF();
$title="Quotation";
$pdf->SetTitle($title);
$pdf->AddPage();
$pdf->SetTextColor(0,0,0);
$pdf->setFillColor(255,255,255);
$pdf->SetFont("times","b","12");
$pdf->Cell(120,5,'Jl. Pramuka Raya No 168 - 180',0,0,'L',1);
$pdf->Cell(30,5,'Date',0,0,'L',1);
$pdf->Cell(43,5,$array["tanggal"],1,0,'C',1);
$pdf->ln(5);
$pdf->Cell(120,5,'Jakarta Pusat 10570',0,0,'L',1);
$pdf->Cell(30,5,'Quote #',0,0,'L',1);
$pdf->Cell(43,5,$array["quote"],1,0,'C',1);
$pdf->ln(5);
$pdf->Cell(120,5,'NPWP : 03.163.760.6-024.000',0,0,'L',1);
$pdf->Cell(30,5,'Customer ID',0,0,'L',1);
$pdf->Cell(43,5,$array["customer"],1,0,'C',1);
$pdf->ln(5);
$pdf->Cell(120,5,'Phone: (021) 4205550 - 4247749 - 4212323 - 4254682',0,0,'L',1);
$pdf->Cell(30,5,'Valid Until',0,0,'L',1);
$pdf->Cell(43,5,$array["berlaku"],1,0,'C',1);
$pdf->ln(5);
$pdf->Cell(120,5,'Prepared by:'.$array["user"],0,0,'L',1);
$pdf->ln(6);
$pdf->setFillColor(0,128,255);
$pdf->SetTextColor(240,248,255);
$pdf->Cell(120,10,'CUSTOMER',1,1,'L',1);
$pdf->ln(3);
$pdf->SetTextColor(0,0,0);
$pdf->write("3",$array["nama"]);
$pdf->ln(6);
$pdf->write("3",$array["perusahaan"]);
$pdf->ln(6);
$pdf->write("3",$array["alamat"].', '.$array["pos"]);
$pdf->ln(6);
$pdf->write("3",$array["telp"]);
$pdf->ln(6);
$pdf->SetTextColor(240,248,255);
$pdf->Cell(105,10,'DESCRIPTION',1,0,'C',1);
$pdf->Cell(10,10,'Qty',1,0,'C',1);
$pdf->Cell(38,10,'UNIT PRICE (Rp)',1,0,'C',1);
$pdf->Cell(40,10,'AMOUNT (Rp)',1,0,'C',1);
$pdf->ln();
$pdf->SetTextColor(0,0,0);
$pdf->setFillColor(255,255,255);
for ($i=1;$i<$e;$i++){
	$t=str_replace(".","", $c[$i-1]);
	$s=$t*$b[$i-1];
	$l=number_format($c[$i-1],0,'','.');
	$m=number_format($s,0,'','.');
$pdf->Cell(105,10,$a[$i-1],1,0,'L',1);
$pdf->Cell(10,10,$b[$i-1],1,0,'L',1);
$pdf->Cell(38,10,$l,1,0,'R',1);
$pdf->Cell(40,10,$m,1,0,'R',1);
$pdf->ln();
}
$pdf->ln(2);
$pdf->Cell(121,5,'',0,0,'C',1);
$pdf->Cell(10,5,'',0,0,'C',1);
$pdf->Cell(20,5,'Subtotal',0,0,'L',1);
$sub=0;
	for($s=1;$s<$e;$s++){
	$sub += $c[$s-1] * $b[$s-1];	
	}
	$subt=number_format($sub,0,'','.');
$pdf->Cell(40,5,$subt,0,0,'R',1);
$pdf->ln(6);
$pdf->setFillColor(0,128,255);
$pdf->SetTextColor(240,248,255);
$pdf->Cell(131,5,'TERMS AND CONDITIONS',1,0,'L',1);
$dis=0;
	for($s=1;$s<$e;$s++){
	$dis += (($c[$s-1] * $b[$s-1])*$f[$s-1])/100;
		
	}
if($dis==0 or $dis==null){
$disc1="";	
}else{
	$disc1=number_format($dis,0,'','.');
}
$pdf->SetTextColor(0,0,0);
$pdf->setFillColor(255,255,255);
$pdf->Cell(20,5,'Disc ',0,0,'L',1);
$pdf->Cell(40,5,$disc1,0,0,'R',1);
$pdf->ln();
$pdf->Cell(131,70,'',1,0,'C',1);
$pdf->Cell(20,5,'PPN',0,0,'L',1);
if($array["ppn"]=="tidak"){
$ppn=0;
$pdf->Cell(40,5,'',0,0,'R',1);
		}else{
		$ppn = ($sub - $dis)*10/100;
		$hasil1=number_format($ppn,0,'','.');
		$pdf->Cell(40,5,$hasil1,0,0,'R',1);	
		}
$pdf->ln();
$pdf->Cell(131,0,'1. Customer will be billed after indicating acceptance of this quote',0,0,'L',1);
$pdf->ln(5);
$pdf->Cell(131,0,'2. Payment will be due prior to delivery of service and goods',0,0,'L',1);
$pdf->Cell(60,0,'__________________________',0,0,'L',1);
$pdf->ln(5);
$pdf->Cell(131,0,'3. Please fax or mail the signed price quote to the address above',0,0,'L',1);
$pdf->Cell(30,5,'TOTAL DUE',0,0,'L',1);
$due= $sub + $ppn - $dis;
$duep=number_format($due,0,'','.');
$pdf->Cell(30,5,'Rp '.$duep,0,0,'R',1);
$pdf->ln(5);
$pdf->cell(131,0,'4. For Wire Transfer :',0,0,'L',1);
$pdf->ln(5);
$pdf->cell(11,0,'',0,0,'L',1);
$pdf->cell(120,0,'Bank Name : BCA',0,0,'L',1);
$pdf->ln(5);
$pdf->cell(11,0,'',0,0,'L',1);
$pdf->cell(120,0,'Acc Name : PT. CHANDRA KARYA PRAMUKA',0,0,'L',1);
$pdf->ln(5);
$pdf->cell(11,0,'',0,0,'L',1);
$pdf->cell(120,0,'Acc Number : 342 - 3399 - 585',0,0,'L',1);
$pdf->ln(5);
$pdf->Cell(131,0,'Customer Acceptance (sign below):',0,0,'L',1);
$pdf->ln(20);
$pdf->Cell(131,0,'x.____________________________________________________________',0,0,'L',1);
$pdf->ln(5);
$pdf->Cell(131,0,$array["nama"],0,0,'L',1);
$pdf->ln(20);
$pdf->Output();
?>
