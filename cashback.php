<html>
<head>
<?php
?>
<title>Harga Cashback</title>
<link rel='stylesheet' href='css/bootstrap.min.css'>
	<script src='asset/jquery.min.js'></script>
	<script src='asset/bootstrap.min.js'></script>
	<link rel="stylesheet" href="css/tablejquery.css">
<script src="asset/tablejquery.js"></script>
<style>
	#ukuran{
		display:none;
	}
	#springbed{
		display:none;
	}
</style>	
<script>
$(document).ready(function(){
	$(".1").click(function(){
	$('.div1').show();
	$('.div2').hide();
	$('.div3').hide();
	$('.div4').hide();
	$('.s1').hide();
	});
	$(".2").click(function(){
	$('.div2').show();
	$('.div1').hide();
	$('.div3').hide();
	$('.div4').hide();
	$('.s1').hide();
	});
	$(".3").click(function(){
	$('.div2').hide();
	$('.div1').hide();
	$('.div3').show();
	$('.div4').hide();
	$('.s1').hide();
	});
	$(".4").click(function(){
	$('.div2').hide();
	$('.div1').hide();
	$('.div3').hide();
	$('.div4').show();
	$('.s1').hide();
	});
});

function sudah(param)
{
if(param==1)
document.getElementById("ukuran").style.display = 'block';
else
document.getElementById("ukuran").style.display = 'none';

}

function springbed(param)
{
if(param==1)
document.getElementById("springbed").style.display = 'block';
else
document.getElementById("springbed").style.display = 'none';

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

</script>
</head>
<body>
<center>
<h3 style="color:red;">*Pastikan Hanya Peserta Lelang*</h3>
<h3 style="color:red;">*CASHBACK Hanya Berlaku Untuk Pemenang dan Sudah Membeli Barang Lelang*</h3>
<div style="margin-top:20px"></div>
<p><button class="btn btn-primary 1">Membeli Voucher Nawar Rp.1</button> <button class="btn btn-danger 2">Membeli Produk Lelang</button> <button class="btn btn-success 3">Springbed Belum Dikirim</button> <button class="btn btn-info" data-toggle="modal" data-target="#peraturan">Peraturan</button></p></center>
<br>
<div class="div1" style="display:none">
<center><h3>Biaya <b>Upgrade</b></h3></center>
<form action="cashback" method="POST">
<div class="row">
<center><b>Harga Kemenangan Rp
	<input type="text" name="hk" onkeyup="formatangka(this)" required></b></center>
	<br>
	<div class="col-sm-2">
	
	</div>
	<div class="col-sm-4">
	<b>Ukuran Yang Di Menangkan
	<input type="text" name="uks" required>X200</b>
	</div>
	<div class="col-sm-4">
	<b>Ukuran Yang Di Inginkan
	<input type="text" name="uki" required>X200</b>
	</div>
	<div class="col-sm-2">
	</div>
</div>
<div class="row" style="margin-top:20px">
	<div class="col-sm-2">
	
	</div>
	<div class="col-sm-4">
	<b>Harga Netto Uk. Kemenangan Rp
	<input type="text" name="hkp" onkeyup="formatangka(this)" required></b>
	</div>
	<div class="col-sm-4">
	<b>Harga Netto Uk. Di Inginkan Rp
	<input type="text" name="hkk" onkeyup="formatangka(this)" required></b>
	</div>
	<div class="col-sm-2">
	
	</div>
</div>
	<center><button class="btn btn-success" style="margin-top:20px">Hitung</button></center>
	<input type="hidden" name="respon" value="tahap1">
	</form>
	</div>
<div class="div2" style="display:none">
<center><h4>Nilai Cashback Lelang</h4></center>
<form action="cashback" method="POST">
<div class="row">
	<div class="col-sm-2">
	
	</div>
	<div class="col-sm-4">
	<b>Diskon Kemenangan
	<input type="radio" name="disc" value="0.15">15%
	<input type="radio" name="disc" value="0.1">10%
	<input type="radio" name="disc" value="0" checked>0%
	</div>
	<div class="col-sm-5">
	<span style="">Apakah Springbed ?</span>
	<input type="radio" name="ukuran" value="Ya" onclick="springbed(1)">Ya
	<input type="radio" name="ukuran" value="Tidak" onclick="springbed(0)" checked>Tidak
	<br>
		<div id="springbed">
	<span style="color:blue">Ukuran Pembelian</span> Lebih Besar Daripada <span style="color:red">Kemenangan?</span>
	<input type="radio" name="ukuran" value="Ya" onclick="sudah(1)">Ya
	<input type="radio" name="ukuran" value="Tidak" onclick="sudah(0)" checked>Tidak
		</div>
	</div>
	<div class="col-sm-1">
	
	</div>
</div>
<div class="row" id="ukuran" style="margin-top:20px">
 <div class="row col-sm-12">
	<div class="col-sm-2">
	
	</div>
	<div class="col-sm-4">
	<b><span style="color:blue">Ukuran Pembelian</span>
	<input type="text" name="ukp" placeholder="180">X200</b>
	</div>
	<div class="col-sm-4">
	<b><span style="color:red">Ukuran Kemenangan</span>
	<input type="text" name="ukk" placeholder="160" >X200</b>
	</div>
	<div class="col-sm-2">
	</div>
 </div>
 <div class="row col-sm-12" style="margin-top:20px">
	<div class="col-sm-2">
	
	</div>
	<div class="col-sm-4">
	<b><span style="color:blue">Harga Netto Uk Pembelian</span>
	<input type="text" name="hkp" placeholder="Cth: 10.000.000" onkeyup="formatangka(this)"></b>
	</div>
	<div class="col-sm-4">
	<b><span style="color:red">Harga Netto Uk Kemenangan</span>
	<input type="text" name="hkk" placeholder="Cth: 8.000.000" onkeyup="formatangka(this)"></b>
	</div>
	<div class="col-sm-2">
	</div>
</div>
</div>

<div class="row" style="margin-top:20px">
	<div class="col-sm-2">
	
	</div>
	<div class="col-sm-4">
	<b><span style="color:blue">Harga Pembelian</span> Rp
	<input type="text" name="hp" onkeyup="formatangka(this)" required></b>
	</div>
	<div class="col-sm-4">
	<b><span>Harga Kemenangan</span> Rp
	<input type="text" name="hk" onkeyup="formatangka(this)" required></b>
	</div>
	<div class="col-sm-2">
	</div>
</div>
		<center style="margin-top:20px"><button class="btn btn-success">Hitung</button></center>
		<input type="hidden" name="respon" value="tahap2">
		</form>
</div>
<div class="div3" style="display:none">
<center><h4>Pembeli Ingin <b>Mengupgrade</b> Springbed, Dengan Kondisi Barang Belum Di Kirim</h4></center>
<form action="cashback" method="POST">
<div class="row col-sm-12" style="margin-top:20px">
	<div class="col-sm-2">
	
	</div>
	<div class="col-sm-4">
	<b>Diskon Kemenangan
	<input type="radio" name="disc" value="0.15">15%
	<input type="radio" name="disc" value="0.1">10%
	<input type="radio" name="disc" value="0" checked>0%
	</div>
	<div class="col-sm-4">
	<b><span style="color:red">Harga Kemenangan</span> Rp
	<input type="text" name="hk" onkeyup="formatangka(this)" required></b>
	</b>
	<div class="col-sm-2">

	</div>
</div>
<div class="row col-sm-12" style="margin-top:20px">
	<div class="col-sm-2">
	
	</div>
	<div class="col-sm-4">
	<b><span style="color:blue">Ukuran Pembelian</span>
	<input type="text" name="ukp" placeholder="cth : 160">X200</b>
	</div>
	<div class="col-sm-4">
	<b><span style="color:red">Ukuran Kemenangan</span>
	<input type="text" name="ukk" placeholder="cth : 180">X200</b>
	</div>
	<div class="col-sm-2">
	</div>

</div>
 <div class="row col-sm-12" style="margin-top:20px">
	<div class="col-sm-2">
	
	</div>
	<div class="col-sm-4">
	<b><span style="color:blue">Harga Netto Uk. Pembelian</span>
	<input type="text" name="hkp" placeholder="Cth: 8.000.000" onkeyup="formatangka(this)"></b>
	</div>
	<div class="col-sm-4">
	<b><span style="color:red">Harga Netto Uk Kemenangan</span>
	<input type="text" name="hkk" placeholder="Cth: 10.000.000" onkeyup="formatangka(this)"></b>
	</div>
	<div class="col-sm-2">
	</div>
</div>
</div>
<center><button class="btn btn-success">Hitung</button></center>
		<input type="hidden" name="respon" value="tahap3">
</div>
</form>


</div>

<!-- Modal -->
<div class="modal fade" id="peraturan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel"><center>Syarat Dan Ketentuan</center></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<div>
			<h4><center style="color:blue">Membeli Voucher Belanja Nawar Rp.1</center></h4>
			<span>* Hanya Peserta Lelang</span><br>
			<span>* Hanya Pemenang Lelang</span><br>
			<span>* Hanya Untuk Upgrade Size</span><br>
			<span>* Hanya Tidak Termasuk Assesoris Springbed</span><br>
			<h4><center style="color:red">Membeli Produk Lelang</center></h4>
			<span>* Hanya Peserta Lelang</span><br>
			<span>* Hanya 1 Peserta Pemenang Lelang</span><br>
			<span>* Peserta Sudah Membeli Barang Yang Akan Di Lelang</span><br>
			<span>* Hanya Perhitungan Cashback dan Unit Tidak Dapat Di Tukar</span><br>
			<span>* Selain Springbed Pilihlah "Tidak" pada Ukuran Kemenangan</span><br>
			<span>* Jika Springbed & Ukuran Menang Lelang Lebih Besar Size Daripada Pembelian Pilihlah "Tidak"</span><br>
			<span>* Jika Springbed & Ukuran Menang Lelang Lebih Kecil Size Daripada Pembelian Pilihlah "Ya"</span><br>
			<h4><center style="color:green">Membeli Produk Lelang</center></h4>
			<span>* Hanya Peserta Lelang</span><br>
			<span>* Peserta Sudah Membeli Barang Yang Akan Di Lelang</span><br>
			<span>* Hanya 1 Peserta Pemenang Lelang</span><br>
			<span>* Hanya Untuk Upgrade Size</span><br>
			<span>* Hanya Tidak Termasuk Assesoris Springbed</span>
		</div>
	  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</body>
<?php
if(empty($_POST)){
	
}
if(isset($_POST)){
	if($_POST["respon"]=="tahap1"){
	$uks=$_POST["uks"];
	$uki=$_POST["uki"];
	if($uks < $uki){
		$hkp=str_replace(".","",$_POST["hkp"]);
		$hkk=str_replace(".","",$_POST["hkk"]);	
		$hk=str_replace(".","",$_POST["hk"]);	
		$selisi=($hkk-$hkp);
		$biaya=($selisi-($selisi*0.075));
		$harga=$hk + $biaya;
		echo "<center class='s1'><h3>Harga Kemenangan : ".$hk." Biaya Upgrade : ".number_format($biaya,0,',','.')."</h3></center><br>";
		echo "<h2 class='s1'><center>Total Biaya Rp. " .number_format($harga,0,',','.')."</center></h2>";
		}else{
		echo "<h4 style='color:red' class='s1'><center>Terjadi Kesalahan Pada Ukuran</center></h4>";
		}
	}else if($_POST["respon"]=="tahap2"){
		if($_POST["ukuran"]=="Tidak"){
		$hp=str_replace(".","",$_POST["hp"]);
		$hk=str_replace(".","",$_POST["hk"]);
		$disc=$_POST["disc"];
		$cashback=($disc*$hk)+($hp-$hk);
		echo "<h2 class='s1'><center>Total Cashback Yang Di Terima Rp. " .number_format($cashback,0,',','.')."</center></h2>";
		}elseif($_POST["ukuran"]=="Ya"){
			if($_POST["ukp"]>$_POST["ukk"]){
		$hp=str_replace(".","",$_POST["hp"]);
		$hk=str_replace(".","",$_POST["hk"]);
		$hkp=str_replace(".","",$_POST["hkp"]);
		$hkk=str_replace(".","",$_POST["hkk"]);
		$disc=$_POST["disc"];
		$selisi=($hkp-$hkk);
		$cashback=($disc*$hk)+($hp-$hk)-($selisi-($selisi*0.075));
		echo "<h2 class='s1'><center>Total Cashback Yang Di Terima Rp. " .number_format($cashback,0,',','.')."</center></h2>";
		
		}
		else{
		echo "<h4 style='color:red' class='s1'><center>Terjadi Kesalahan Pada Ukuran</center></h4>";
		}	
		}
	}else if($_POST["respon"]=="tahap3"){
		if($_POST["ukp"]>$_POST["ukk"]){
			echo "<h4 style='color:red' class='s1'><center>Terjadi Kesalahan Pada Ukuran</center></h4>";
		}else{
			$hk=str_replace(".","",$_POST["hk"]);
			$hkp=str_replace(".","",$_POST["hkp"]);
			$hkk=str_replace(".","",$_POST["hkk"]);
			$selisi=($hkk-$hkp);
			$cashback=($selisi-($selisi*0.075)) - (($hkp-$hk) + ($_POST["disc"] *$hk));
			echo "<h2 class='s1'><center>Total Yang Harus Di Bayar Rp. " .number_format($cashback,0,',','.')."</center></h2>";
		
		}
	}
}
?>
<p style="margin-top:100px;"></p>
<div class="">
<h3 style="text-align:center">Refrensi Harga Produk Lelang 19 Juli 2018</h3>
<br>
                                  <div class="panel panel-default">
                        <div class="panel-body">
                                    <table id="lookup" class="table table-bordered">  
	                                   <thead bgcolor="#eeeeee" align="center">
                                        <tr>
	  
                                        <th>Nama</th>
	                                    <th>Harga</th>
	  
                                       </tr>
                                      </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
</div>

        <script src="asset/jquery.dataTables.js"></script>
        <script src="asset/dataTables.bootstrap.js"></script>
        <script>
        $(document).ready(function() {
				var dataTable = $('#lookup').DataTable( {
					"processing": true,
					"serverSide": true,
					"ajax":{
						url :"qcashback.php", // json datasource
						type: "post",  // method  , by default get
						error: function(){  // error handling
							$(".lookup-error").html("");
							$("#lookup").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
							$("#lookup_processing").css("display","none");
							
						}
					}
				} );
			} );
        </script>
</html>


