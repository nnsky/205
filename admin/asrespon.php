<html>
<?php
include "menu.php";
if(empty($_SESSION['level'])){
	header("location:../logout.php");
}elseif($_SESSION['level']=="admin" && $_SESSION['status']=='aktif' && $array['re_v']=='block'){
			
	}
?>
<head>
<title>After Sales</title>
<link rel='stylesheet' href='../css/bootstrap.min.css'>
<script src='../asset/jquery.min.js'></script>
<script src='../asset/bootstrap.min.js'></script>
<script src='../asset/hidden.js'></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css"> 
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
<script>
$(document).ready(function(){
  $("#brand").hide();
  $("#status").change(function(){
   if($("#status").val() == 'pending'){
      //Show text box here
      $("#brand").show();
   }
   else{
     //Hide text box here
     $("#brand").hide();
   }
    });
});
     $(function () {
        $('#datetimepicker1').datepicker({
			dateFormat: 'dd/mm/yy'
            });
        });
	  $(function () {
         $('#datetimepicker2').datepicker({
			dateFormat: 'dd/mm/yy'
            });
        });	
			  $(function () {
         $('#datetimepicker3').datepicker({
			dateFormat: 'dd/mm/yy'
            });
        });
</script>
</head>
<body>
<form action="prosesas.php" method='post'>
<div class='row'>
	<div class='col-sm-4'><h4>Lokasi Yang Dituju</h4></div><div class='col-sm-8'></div>
	<div class='col-sm-12'>
	<select name='lokasi' class="form-control" required>
		<option value='CM'>Pramuka 180</option>
		<option value='CH'>Pramuka 168</option>
		<option value='CPG'>Premium Gallery</option>
		<option value="KG">Kelapa Gading </option>
		<option value="AL">Ruko Alam Sutra </option>
		<option value="CPIK">Pantai Indah Kapuk </option>
		<option value="CBEK">Bekasi </option>
		<option value="CBDG">Bandung </option>
	
	</select>
	</div>
</div>
<center><h4>Data Konsumen</h4></center>
<div class='row'>
	<div class='col-sm-3'>
		 <b>Nama : </b><input type='text' name='nama' class='form-control' autocomplete='off' required>
	</div>
		<div class='col-sm-3'>
		 <b>Kontak : </b><input type='number' name='kontak' class='form-control' autocomplete='off' required>
	</div>
		<div class='col-sm-3'>
		 <b>Nota : </b><input type='text' name='nota' class='form-control' autocomplete='off' required>
	</div>
	<div class='col-sm-3'>
		 <b>Kode Sales : </b><input type='text' name='sales' class='form-control' required>
	</div>
</div>

<div class='row'>
	<div class='col-sm-3'>
		 <b>Tanggal Pembelian : </b><input type='text' id="datetimepicker1" name='tglorder' class='form-control' autocomplete="off" required>
	</div>
		<div class='col-sm-3'>
		 <b>Tanggal Kirim : </b><input type='text' id="datetimepicker2" name='tglkirim' class='form-control' autocomplete="off" required>
	</div>
		<div class='col-sm-3'>
		 <b>Tanggal Konfrim : </b><input type='text' id="datetimepicker3" name='tglkonfrim' class='form-control' autocomplete="off" required>
	</div>
	<div class='col-sm-3'>
		 <b>Status Pengiriman : </b>
		 <select name='pengiriman' class='form-control'>
			<option value='kiriman selesai'>Kiriman Selesai</option>
			<option value='kiriman sebagian'>Kiriman sebagian</option>
		 </select>
	</div>
</div>
<div class='row'>
		<div class='col-sm-3'>
		<b>Status Feedback</b>
		<select name='sfeed' id="statselect" class='form-control'>
			<option value='ttd'>Telepon Tidak Diangkat</option>
			<option value='+'>Positif</option>
			<option value='-'>Negatif</option>
			
		</select>
	</div>
	<div class='col-sm-6'>
	<b>Feedback</b>
	<textarea class='form-control' name='feedback'></textarea>
	</div>
		<div class='col-sm-3'>
	<b>Status Ticket :</b> 
	<select name='status' class='form-control' id='status' required>
		<option value=''>------</option>
		<option value='pending'>Belum Selesai</option>
		<option value='selesai'>Selesai</option>
	</select>
	</div>
</div>
<div class="row" id='brand'>
 <div class='col-sm-4'>
 <b>Brand</b>
 <input type='text' class='form-control' name='brand' autocomplete='off'>
 </div>
 <div class='col-sm-4'>
 <b>Type</b>
 <input type='text' class='form-control' name='type' autocomplete='off'>
 </div>
 <div class='col-sm-4'>
 <b>Jenis</b>
 <input type='text' class='form-control' name='jenis' autocomplete='off'>
 </div>
</div>
<br>
<div class="row">
	<div class='col-sm-3'>
		USER: <input type='text' name='user' value="<?php echo $_SESSION['username']?>"  readonly>
	</div>
</div>
<br>	
	
<button class='btn btn-primary'>Simpan</button>
<a class='btn btn-default' href='respon'>Kembali</a>
</form>
</body>
</html>
