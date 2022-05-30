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
//$f=explode(",",$array["diskon"]);
$dis=str_replace('.','',$array['diskon']);
$e=count ($a);

if($array['lokasi']=="CM"){
	$lokasi1='Jl. Pramuka Raya No. 180';
	$lokasi2='Jakarta Pusat 10570';
}elseif($array["lokasi"]=="CPG"){
	$lokasi1='Jl. Jalur Sutera Kav.22D';
	$lokasi2='Alam Sutera, Tangerang, Banten';
}elseif($array["lokasi"]=="CH"){
	$lokasi1='Jl. Pramuka Raya No 168 - 180';
	$lokasi2='Jakarta Pusat 10570';
}elseif($array["lokasi"]=="CPIK"){
	$lokasi1='Jl. Pantai Indah Utara 2 No. 8 DD-CS';
	$lokasi2='Metro Broadway The Gallery, Jakarta Utara';
}elseif($array["lokasi"]=="KG"){
	$lokasi1='Jl. Boulevard Raya Blok WE 2 No.1KL';
	$lokasi2='Rt. 13 Rw. 16 Kelapa Gading Timur';
}elseif($array["lokasi"]=="CBEK"){
	$lokasi1='Jl. Bulevar Ahmad Yani, Graha Bulevar Blok GB No.A01-02-03';
	$lokasi2='Bekasi, Jawa Barat';
}
elseif($array["lokasi"]=="CBDG"){
	$lokasi1='Jalan Pajajaran no 101 RT 07 RW 03, Arjuna, Cicendo';
	$lokasi2='Bandung, Jawa Barat 40172';
}
elseif($array["lokasi"]=="CPI"){
	$lokasi1='Jl.Sultan Iskandar Muda No. 17 C';
	$lokasi2='Jakarta Selatan, DKI Jakarta';
}
elseif($array["lokasi"]=="CMKS"){
	$lokasi1='Summarecon Mutiara Jl. Graha Boulevard Barat 1 Blok GB01 / C01-02';
	$lokasi2='Makassar, Sulawesi Selatan';
}
else{
	$lokasi1='Jl. Pramuka Raya No 168 - 180';
	$lokasi2='Jakarta Pusat 10570';
}
;

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
    $this->SetY(-30);
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
$pdf->Cell(120,5,$lokasi1,0,0,'L',1);
$pdf->Cell(30,5,'Date',0,0,'L',1);
$pdf->Cell(43,5,$array["tanggal"],1,0,'C',1);
$pdf->ln(5);
$pdf->Cell(120,5,$lokasi2,0,0,'L',1);
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
$pdf->Cell(120,5,'Prepared by:'.$array["sales"],0,0,'L',1);
$pdf->ln(6);
$pdf->setFillColor(0,128,255);
$pdf->SetTextColor(240,248,255);
$pdf->Cell(120,10,'CUSTOMER',1,1,'L',1);
$pdf->ln(3);
$pdf->SetTextColor(0,0,0);
if($array["nama"]==null){

}else{
$pdf->write("3",$array["nama"]);
$pdf->ln(5);
}
if($array["perusahaan"]==null){

}else{
$pdf->write("3",$array["perusahaan"]);
$pdf->ln(5);	
}
if($array["alamat"]==null){
	
}else{
$pdf->write("3",$array["alamat"].', '.$array["pos"]);
$pdf->ln(5);
}
if($array["telp"]==null){
	
}else{
$pdf->write("3",$array["telp"]);
$pdf->ln(5);	
}
$pdf->SetTextColor(240,248,255);
$pdf->SetFont("times","b","11");
$pdf->Cell(120,10,'DESCRIPTION',1,0,'C',1);
$pdf->Cell(10,10,'Qty',1,0,'C',1);
$pdf->Cell(33,10,'UNIT PRICE (Rp)',1,0,'C',1);
$pdf->Cell(30,10,'AMOUNT (Rp)',1,0,'C',1);
$pdf->ln();
$pdf->SetTextColor(0,0,0);
$pdf->setFillColor(255,255,255);
for ($i=1;$i<$e;$i++){
	$t=str_replace(".","", $c[$i-1]);
	$s=$t*$b[$i-1];
	$l=number_format($c[$i-1],0,'','.');
	$m=number_format($s,0,'','.');
$pdf->Cell(120,8,$a[$i-1],1,0,'L',1);
$pdf->Cell(10,8,$b[$i-1],1,0,'L',1);
$pdf->Cell(33,8,$l,1,0,'R',1);
$pdf->Cell(30,8,$m,1,0,'R',1);
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
// $dis=0;
	// for($s=1;$s<$e;$s++){
	// $dis += (($c[$s-1] * $b[$s-1])*$f[$s-1])/100;
		
	// }
// if($dis==0 or $dis==null){
// $disc1="";	
// }else{
	// $disc1=number_format($dis,0,'','.');
// }
$pdf->SetTextColor(0,0,0);
$pdf->setFillColor(255,255,255);
$pdf->Cell(20,5,'Disc ',0,0,'L',1);
//$pdf->Cell(40,5,$disc1,0,0,'R',1);
if($array['diskon']==0){
$pdf->Cell(40,5,'',0,0,'R',1);
}else{
$pdf->Cell(40,5,$array['diskon'],0,0,'R',1);	
}
$pdf->ln();
$pdf->Cell(131,70,'',0,0,'C',1);
$pdf->Cell(20,5,'PPN',0,0,'L',1);
if($array["ppn"]=="tidak"){
$ppn=0;
$pdf->Cell(40,5,'',0,0,'R',1);
		}else{
		$ppn=$array['ppn'];
		$hasil1=number_format($ppn,0,'','.');
		$pdf->Cell(40,5,$hasil1,0,0,'R',1);	
		}
$pdf->ln();
$pdf->Cell(131,0,'1. Harga NETTO diatas sudah termasuk diskon dan PPN 11%',0,0,'L',1);
$pdf->ln(5);
$pdf->Cell(131,0,'2. Harga di atas sudah termasuk biaya pengiriman (Franco Jakarta)',0,0,'L',1);
$pdf->ln(5);
$pdf->Cell(131,0,'3. Barang yang sudah dipesan tidak dapat ditukar atau dibatalkan',0,0,'L',1);
$pdf->Cell(60,0,'__________________________',0,0,'L',1);
$pdf->ln(5);
$pdf->Cell(131,0,'4. Pembayaran harus dibayar LUNAS sebelum barang dikirimkan',0,0,'L',1);
$pdf->Cell(30,5,'TOTAL DUE',0,0,'L',1);
$due= $sub + $ppn - $dis;
$duep=number_format($due,0,'','.');
$pdf->Cell(30,5,'Rp '.$duep,0,0,'R',1);
$pdf->ln(5);
$pdf->cell(131,0,'5. Pembayaran dapat ditransfer melalui:',0,0,'L',1);
$pdf->ln(5);
$pdf->cell(11,0,'',0,0,'L',1);
$pdf->cell(120,0,$array['bank'],0,0,'L',1);
$pdf->ln(5);
$pdf->cell(120,0,'6. Harga tidak mengikat, sewaktu-waktu dapat berubah tanpa pemberitahuan.',0,0,'L',1);
$pdf->ln(2);
	if($array['term']==null){
	$pdf->ln(15);
	
	}else{
	$g=explode("^",$array['term']);
	$h=count($g);
	$tr=6;
	for($t=1;$t<$h;$t++){
	$no=$tr+$t;
	$kata=$g[$t-1];
	$pdf->write("5",$no.'.'.$kata);
	$pdf->ln(5);
	}
$pdf->ln(10);
	}

$pdf->Cell(131,0,'x.____________________________________________________________',0,0,'L',1);
$pdf->ln(5);
$pdf->Cell(131,0,$array["nama"],0,0,'L',1);
$pdf->ln(7);
if($array['note']==null){
	
}else{
	$pdf->write("3",'Note Sales : '.$array['note']);
}
$pdf->ln(20);
$pdf->Output();
?>

