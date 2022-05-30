<!DOCTYPE html>
<html lang="en">
<head>
  <title>CK Lelang Dan Bazaar</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/home.css">
  <script src="asset/jquery.min.js"></script>
  <script src="asset/bootstrap.min.js"></script>
     <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css"> 
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script> 
  <body>
  <script>
          $(function () {
            $('#datetimepicker1').datepicker({
				dateFormat: 'dd-mm-yy'
            });
        });
		
  function validangka(a)
{
	if(!/^[0-9 /]+$/.test(a.value))
	{
	a.value = a.value.substring(0,a.value.length-1);
	}
}
  function validhuruf(a)
{
	if(!/^[a-z A-Z /]+$/.test(a.value))
	{
	a.value = a.value.substring(0,a.value.length-1);
	}
}

$(document).ready(function(){
    $('#sumber').on('change', function() {
      if ( this.value == '1')
      
      {
        $("#hasil").show();
      }
      else
      {
        $("#hasil").hide();
      }
    });
});

  </script>
 <div>
<div class="col-sm-2">
<div class="table">
<center><label>5 Pendaftar Terakhir</label></center>
<table class="table table-bordered">
<thead align="center">
	<tr>
	<th>Nama</th>
	<th>Kode Voucher</th>
	</tr>
</thead>
<tbody>
<?php
include "koneksi.php";
$select="select nama,kode from lelang where peserta = 'Jilid 4' order by id DESC limit 5";
$query=mysqli_query($conn,$select);
while($array=mysqli_fetch_array($query)){
echo '<tr>
<td>'.$array["nama"].'</td>
<td>'.$array["kode"].'</td>
</tr>
'
;
}
?>
</tbody>
</table>
</div>
</div>
<div class='col-sm-10'>
<center><img src='img/web.png' id='tes' class='img-responsive margin'></center>
</div>
</div>
<div class='container'>
<div class='row'>
<center><br>
<b><p class='regis' >R E G I S T R A S I</p></b>
<b><p class='konten'>LELANG PRODUK 1 RUPIAH | SPECIAL DOORPRIZE | ACARA MENARIK LAINNYA</p></b>
<button class="btn btn-primary" data-toggle="modal" data-target="#daftar">DAFTAR LELANG </button>
</center>
<div id="daftar" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <center><h4 class="modal-title" id="myModalLabel">DAFTAR LELANG/DOORPRIZE</h4></Center>
        </div>

        <div class="modal-body">
          <form action="input" name="modal_popup" enctype="multipart/form-data" method="POST">
            
                <div class="form-group">
                  <label for="Name">Nama</label>
                  <input type="text" name="nama"  class="form-control" placeholder="Nama Anda" onkeyup='validhuruf(this)' required/>
                </div>

                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" name="email"  class="form-control" placeholder="Email Anda" required/>
                </div>

                <div class="form-group" style="padding-bottom: 5px;">
                  <label for="number">No. Hp</label>
                  <input type="text" name="hp"  class="form-control" placeholder='Nomor HandPhone' onkeyup='validangka(this)' required/>
                </div>
				  <div class="form-group">
                  <label for="email">Alamat</label>
                  <input type="text" name="alamat"  class="form-control" placeholder="Alamat Anda" required/>
                </div>

				<div class='form-group' style='padding-bottom:5px'>
				<label>NIK KTP</label>
				<input type="text" class="form-control" name="nik"> 
				</div>
				<div class='form-group' style='padding-bottom:5px'>
				<label>Nomor Nota</label>
				<input type="text" class="form-control" name="nota"> 
				</div>
				<div class='form-group' style='padding-bottom:5px'>
				<label>Diskon Periode</label>
				<input type="radio" name="diskon" value="20%">20%
				<input type="radio" name="diskon" value="15%">15%
				<input type="radio" name="diskon" value="10%">10%
				<input type="radio" name="diskon" value="0%" checked>0%
				</div>
				<div class='form-group' style='padding-bottom : 5px'>
				<label>Sudah Pernah Berbelanja ?</label>
				<input type='radio' name='belanja' value='belum' checked><b>Belum</b>
				<input type='radio' name='belanja' value='sudah'><b>Sudah</b>
				</div>
				<div class='form-group' style='padding-bottom : 5px'>
				<label>Pernah Mengikuti Acara Bazaar Lelang di Chandra Karya?</label>
				<input type='radio' name='ikut' value='belum' checked><b>Belum</b>
				<input type='radio' name='ikut' value='sudah' ><b>Sudah</b>
				</div>
				<div class='form-group' style='padding-bottom:5px'>
				<label>Rencana Hadir Tanggal</label><br>
				<input type='checkbox' name='datang[0]' value='11 Agustus'><b>11 Agustus</b>
				<input type='checkbox' name='datang[4]' value='18 Agustus'><b>18 Agustus</b><br>
				<input type='checkbox' name='datang[1]' value='12 Agustus'><b>12 Agustus</b>
				<input type='checkbox' name='datang[5]' value='19 Agustus'><b>19 Agustus</b><br>
				<input type='checkbox' name='datang[2]' value='16 Agustus'><b>16 Agustus</b><br>
				<input type='checkbox' name='datang[3]' value='17 Agustus'><b>17 Agustus</b>
				</div>
				<div class="form-group">
                <input id="datetimepicker1" name='setdate' type="text" class="form-control" required />
				</div>
				<div class='form-group' style='padding-bottom:50px'>
					<div class='col-sm-6'>
					<label>Petugas-Lokasi</label><br>
					<input type='text' name='petugas' placeholder='Cth: David-PG'>
					</div>
					<div class='col-sm-6'>
					<label>Verifikasi Perserta</label><br>
					<input type='checkbox' name='very' value="Sudah Verifikasi"><b> Sudah Verifikasi</b>
					</div>
				</div>
              <div class="modal-footer">
					<input type="hidden" name="jilid" value="4">
                  <button class="btn btn-success" type="submit">Confirm</button>
                  <button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true"> Cancel</button>
              </div>
              </form>
				</div>
			</div>
</div>
</div>
</body>
</html>
