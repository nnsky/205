<html> 
<head> <?php 
include "menu.php";
?> 
<title>Harga Cashback</title>
<link rel='stylesheet' href='../css/bootstrap.min.css'>
	<script src='../asset/jquery.min.js'></script>
	<script src='../asset/bootstrap.min.js'></script> <style>
	#ukuran{
		display:none;
	}
</style> <script> $(document).ready(function(){
	$(".1").click(function(){
	$('.div1').show();
	$('.div2').hide();
	$('.div3').hide();
	});
	$(".2").click(function(){
	$('.div2').show();
	$('.div1').hide();
	$('.div3').hide();
	});
});
function sudah(param) { if(param==1) 
document.getElementById("ukuran").style.display = 'block'; else 
document.getElementById("ukuran").style.display = 'none';
}
function formatangka(objek) {
   a = objek.value;
   b = a.replace(/[^\d]/g,"");
   c = "";
   panjang = b.length;
   j = 0;
   for (i = panjang; i > 0; i--) {
     j = j + 1;
     if (((j % 3) == 1) && (j != 1)) {
       c = b.substr(i-1,1) + "." + c;
     } else {
       c = b.substr(i-1,1) + c;
     }
   }
   objek.value = c;
}
</script> </head> <body> <center> <h3 style="color:red;">*Pastikan Hanya 
Peserta Lelang*</h3> <h3 style="color:red;">*CASHBACK Hanya Berlaku 
Untuk Pemenang dan Sudah Membeli Barang Lelang*</h3> <div 
style="margin-top:20px"></div> <p><button class="btn btn-primary 
1">Membeli Voucher Nawar Rp.1</button> <button class="btn btn-danger 
2">Membeli Produk Lelang</button></p></center> <br> <div class="div1" 
style="display:none"> <center><h4>Biaya Yang Harus Di 
Keluarkan</h4></center> 
<form action="csback" method="POST"> <div 
class="row">
	<div class="col-sm-2">
	
	</div>
	<div class="col-sm-4">
	<b>Ukuran Yang Di Menangkan
	<input type="text" name="uks" placeholder="Cth : 160" 
onkeyup="formatangka(this)" required>X200</b>
	</div>
	<div class="col-sm-4">
	<b>Ukuran Yang Di Inginkan
	<input type="text" name="uki" placeholder="Cth : 180" 
onkeyup="formatangka(this)" required>X200</b>
	</div>
	<div class="col-sm-2">
	</div> </div> <div class="row" style="margin-top:20px">
	<div class="col-sm-2">
	
	</div>
	<div class="col-sm-4">
	<b>Harga Kemenangan Rp
	<input type="text" name="hk" onkeyup="formatangka(this)" 
required></b>
	</div>
	<div class="col-sm-4">
	<b>Selisi Harga Netto Rp
	<input type="text" name="hn" onkeyup="formatangka(this)" 
required></b>
	</div>
	<div class="col-sm-2">
	
	</div> </div>
	<center><button class="btn btn-success" 
style="margin-top:20px">Hitung</button></center>
	<input type="hidden" name="respon" value="tahap1">
	</form>
	</div> <div class="div2" style="display:none"> <center><h4>Nilai 
Cashback Lelang</h4></center> <form action="csback" method="POST"> 
<div class="row">
	<div class="col-sm-2">
	
	</div>
	<div class="col-sm-4">
	<b>Diskon Kemenangan
	<input type="radio" name="disc" value="0.2">20%
	<input type="radio" name="disc" value="0.15">15%
	<input type="radio" name="disc" value="0.1">10%
	<input type="radio" name="disc" value="0" checked>0%
	</div>
	<div class="col-sm-5">
	<span style="color:blue">Ukuran Pembelian</span> Lebih Besar 
Daripada <span style="color:red">Kemenangan?</span>
	<input type="radio" name="ukuran" value="Ya" 
onclick="sudah(1)">Ya
	<input type="radio" name="ukuran" value="Tidak" 
onclick="sudah(0)" checked>Tidak
	</div>
	<div class="col-sm-1">
	
	</div> </div> <div class="row" id="ukuran" 
style="margin-top:20px">
 <div class="row col-sm-12">
	<div class="col-sm-2">
	
	</div>
	<div class="col-sm-4">
	<b><span style="color:blue">Ukuran Pembelian</span>
	<input type="text" name="ukp" placeholder="180" 
onkeyup="formatangka(this)">X200</b>
	</div>
	<div class="col-sm-4">
	<b><span style="color:red">Ukuran Kemenangan</span>
	<input type="text" name="ukk" placeholder="160" 
onkeyup="formatangka(this)">X200</b>
	</div>
	<div class="col-sm-2">
	</div>
 </div>
 <div class="row col-sm-12" style="margin-top:20px">
	<div class="col-sm-2">
	
	</div>
	<div class="col-sm-4">
	<b><span style="color:blue">Harga Netto Uk Pembelian Rp</span>
	<input type="text" name="hkp" placeholder="Cth: 10.000.000" 
onkeyup="formatangka(this)"></b>
	</div>
	<div class="col-sm-4">
	<b><span style="color:red">Harga Netto Uk Kemenangan Rp</span>
	<input type="text" name="hkk" placeholder="Cth: 8.000.000" 
onkeyup="formatangka(this)"></b>
	</div>
	<div class="col-sm-2">
	</div> </div> </div> <div class="row" style="margin-top:20px">
	<div class="col-sm-2">
	
	</div>
	<div class="col-sm-4">
	<b><span style="color:blue">Harga Pembelian</span> Rp
	<input type="text" name="hp" onkeyup="formatangka(this)" 
required></b>
	</div>
	<div class="col-sm-4">
	<b><span>Harga Kemenangan</span> Rp
	<input type="text" name="hk" onkeyup="formatangka(this)" 
required></b>
	</div>
	<div class="col-sm-2">
	</div> </div>
		<center style="margin-top:20px"><button class="btn 
btn-success">Hitung</button></center>
		<input type="hidden" name="respon" value="tahap2">
		</form> </div> </body> <?php if(empty($_POST)){
	
}
if(isset($_POST)){
	if($_POST["respon"]=="tahap1"){
	$uks=$_POST["uks"];
	$uki=$_POST["uki"];
	if($uks < $uki){
		$hk=$_POST["hk"];
		$hkk=str_replace(".","",$hk);
		$hn=$_POST["hn"];
		$hnn=str_replace(".","",$hn);
		$biaya=$hnn-($hnn*0.075);
		$harga=$hkk + $biaya;
		echo "<center class='div3'><h3>Harga Kemenangan : 
".$hk." Biaya Upgrade : 
".number_format($biaya,0,',','.')."</h3></center><br>";
		echo "<h2 class='div3'><center>Total Biaya Rp. " 
.number_format($harga,0,',','.')."</center></h2>";
		}else{
		echo "<h4 style='color:red' class='div3'><center>Terjadi 
Kesalahan Pada Ukuran</center></h4>";
		}
	}else if($_POST["respon"]=="tahap2"){
		if($_POST["ukuran"]=="Tidak"){
		$hp=str_replace(".","",$_POST["hp"]);
		$hk=str_replace(".","",$_POST["hk"]);
		$disc=$_POST["disc"];
		$cashback=($disc*$hk)+($hp-$hk);
		echo "<h2 class='div3'><center>Total Cashback Yang Di 
Terima Rp. " .number_format($cashback,0,',','.')."</center></h2>";
		}elseif($_POST["ukuran"]=="Ya"){
			if($_POST["ukp"]>$_POST["ukk"]){
		$hp=str_replace(".","",$_POST["hp"]);
		$hk=str_replace(".","",$_POST["hk"]);
		$hkp=str_replace(".","",$_POST["hkp"]);
		$hkk=str_replace(".","",$_POST["hkk"]);
		$disc=$_POST["disc"];
		$selisi=($hkp-$hkk);
		$cashback=($disc*$hk)+($hp-$hk)-($selisi-($selisi*0.075));
		echo "<h2 class='div3'><center>Total Cashback Yang Di 
Terima Rp. " .number_format($cashback,0,',','.')."</center></h2>";
		
		}
		else{
		echo "<h4 style='color:red' class='div3'><center>Terjadi 
Kesalahan Pada Ukuran</center></h4>";
		}	
		}
	}
}
?> </html>
