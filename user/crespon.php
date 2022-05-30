<html>
<?php
include "menu.php";
if(empty($_SESSION['level'])){
	header("location:../logout.php");
}elseif($_SESSION['level']=="user" && $_SESSION['status']=='aktif' && $array['re_v']=='block'){
			
	}
?>
<head>
<title>Halaman Respon</title>
<link rel='stylesheet' href='../css/bootstrap.min.css'>
<script src='../asset/jquery.min.js'></script>
<script src='../asset/bootstrap.min.js'></script>
<script src='../asset/hidden.js'></script>
<link rel='stylesheet' href='../css/respon.css'>
</head>
<body>
<center><h4 class="modal-title" id="myModalLabel">Pilih Lokasi Yang Dituju</h4>
	<button value='1' class="btn btn-primary 1">Pramuka CM</button>
	<button value='2' class="btn btn-danger 2">Pramuka CH</button>
	<button value='3' class="btn btn-info 3">Premium Gallery</button>
	<button value='4' class="btn btn-success 4">PIK</button>
	<button value='5' class="btn btn-default 5">Ruko Alsut</button>
	<button value='6' class="btn btn-primary 6">Kelapa Gading</button>
	<button value='7' class="btn btn-danger 7">Bekasi</button>
	<button value='8' class="btn btn-info 8">Bandung</button>
	<button value='9' class="btn btn-success 9">Online</button><br><br></center>

	<div class="div1" style="display:none">
	<form role="form" method="POST" action="prosesrespon" >
	<table class="table table-striped" style="font-size:14px;">
	<tr><td>Media Yang Di Pakai</td>
	<td><input type="radio" name="hubungi" value="Telepon">Telepon
	<input type="radio" name="hubungi" value="Whatsapp"/>Whatsapp
	<input type="radio" name="hubungi" value="Sms"/>Sms
	<input type="radio" name="hubungi" value="BBM"/>BBM
	<input type="radio" name="hubungi" value="Email"/>Email
	</td><td>
	<span class="Telepon bix">
	<select name="Telepon">
	<option value="4205550">4205550</option>
	<option value="4254682">4254682</option>
	<option value="4212323">4212323</option>
	<option value="08981801800">08981801800</option>
	<option value="08999921800">08999921800</option>
	</select>
	</span>
	<span class="Whatsapp bix">
	<select name="Whatsapp">
	<option value="08981801800">08981801800</option>
	<option value="08999921800">08999921800</option>
	<option value="08990021020">08990021020</option>	
</select>
	</span>
	<span class="Sms bix">
	<select name="SMS">
	<option value="08981801800">08981801800</option>
	<option value="08999921800">08999921800</option>
	</select>
	</span>
	<span class="BBM bix">
	<input type="text" name="BBM" value="5E76601F">
	</span>
	<span class="Email bix">
	<select name="Email">
	<option value="sales@chandrakarya.com">Sales@chandrakarya.com</option>
	</select>
	</span></td></tr>
	<tr><td></td>
	<td><center>DATA KONSUMEN</center></td></tr>
	<tr>
	<td>Kategori</td>
	<td><select name="kategori" required>
	<option value="">---</option>
	<option value="Komplain">Komplain</option>
	<option value="Pembayaran">Pembayaran</option>
	<option value="Tanya Pengriman">Tanya Pengiriman</option>
	<option value="Tanya Produk">Tanya Produk</option>
	<option value="Tanya Harga">Tanya Harga</option>
	<option value="Tanya Stock">Tanya Stock</option>
	<option value="Promo">Promo</option>
	<option value="DLL">DLL</option>
	</td>
	</tr>
	<tr><td>Sumber :</td><td>
	<input type="radio" name="sumber" value="Konsumen Sudah Belanja">Konsumen Sudah Belanja
	<input type="radio" name="sumber" value="Calon Pembeli" >Calon Pembeli
	<input type="radio" name="sumber" value="After Service Customer" >After Service Customer
	</td>
	</tr>
	<tr><td>Title :</td>
	<td><select name="title">
	<option value=''>-----</option>
	<option value="Bpk">Bpk</option>
	<option value="Ibu">Ibu</option>
	</select></td>
	<td><span class="nota bax"><label>Nomor Nota</label> <input type="text" name="nota" value="CM"></span></td></tr>
	<tr><td>Nama : </td><td><input type="text" name="nama" onkeyup="validhuruf(this)" required ></td><td></td></tr>
	<tr><td>No Telp :</td><td><input type="text" name='kontak' required></td><td></td></tr>
	<tr><td>Kode Sales :</td><td><input type='text' name='sales' autocomplete='off' Value="CM ">	
	</td><td></td></tr>
	<tr><td>Pesan :</td><td><textarea cols="50" rows="7" name="pesan" required></textarea></td></tr>
	<tr><td>Waktu Pengerjaan</td>
	<td><select name="timer" required>
	<option value="">--Pilih Waktu---</option>
	<option value="sekarang">Sekarang</option>
	<option value="1">1 Jam</option>
	<option value="2">2 Jam</option>
	<option value="3">3 Jam</option>
	<option value="8">8 Jam</option>
	<option value="9">9 Jam</option>
	<option value="24">1 Hari</option>
	<option value="48">2 Hari</option>
	</select></td><td><input type='hidden' name='user' value='<?php echo $_SESSION["username"] ?>'></td></tr>
	<tr><td></td><td><div class="sekarang box"><textarea placeholder="Respon Sales" cols="50" rows="5" name="responsales"></textarea></div></td><td><input type="hidden" name="lokasi" value="CM"></tr>
		<tr><td><button class="btn btn-success" type="submit">Confirm</button></td><td><button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">Cancel</button></td><td><a class='btn btn-default' href='respon'>Kembali</a></td></tr>
	</form>
	</table>
	</div>
	
	<div class="div2" style="display:none;">
	<form role="form" method="POST" action="prosesrespon" >
	<table class="table table-striped" style="font-size:14px;">
	<tr><td>Media Yang Di Pakai</td>
	<td><input type="radio" name="hubungi" value="Telepon">Telepon
	<input type="radio" name="hubungi" value="Whatsapp"/>Whatsapp
	<input type="radio" name="hubungi" value="Sms"/>Sms
	<input type="radio" name="hubungi" value="BBM"/>BBM
	<input type="radio" name="hubungi" value="Email"/>Email
	</td><td>
	<span class="Telepon bix">
	<select name="Telepon">
	<option value="4205252">4205252</option>
	<option value="4253688">4253688</option>
	<option value="08989290002">08989290002</option>
	</select>
	</span>
	<span class="Whatsapp bix">
	<select name="Whatsapp">
	<option value="08989290002">08989290002</option>
	</select>
	</span>
	<span class="Sms bix">
	<select name="SMS">
	<option value="08989290002">08989290002</option>
	</select>
	</span>
	<span class="BBM bix">
	<input type="text" name="BBM" value="D0BADB2A">
	</span>
	<span class="Email bix">
	<select name="Email">
	<option value="CH52@chandrkarya.com">CH52@chandrkarya.com</option>
	</select>
	</span></td></tr>
	<tr><td></td>
	<td><center>DATA KONSUMEN</center></td></tr>
		<tr>
	<td>Kategori</td>
	<td><select name="kategori" required>
	<option value="">---</option>
	<option value="Komplain">Komplain</option>
	<option value="Pembayaran">Pembayaran</option>
	<option value="Tanya Pengriman">Tanya Pengiriman</option>
	<option value="Tanya Produk">Tanya Produk</option>
	<option value="Tanya Harga">Tanya Harga</option>
	<option value="Tanya Stock">Tanya Stock</option>
	<option value="Promo">Promo</option>
	<option value="DLL">DLL</option>
	</td>
	</tr>
	<tr><td>Sumber :</td><td>
	<input type="radio" name="sumber" value="Konsumen Sudah Belanja">Konsumen Sudah Belanja
	<input type="radio" name="sumber" value="Calon Pembeli" >Calon Pembeli
	<input type="radio" name="sumber" value="After Service Customer" >After Service Customer
	</td>
	</tr>
	<tr><td>Title :</td>
	<td><select name="title">
	<option value=''>-----</option>
	<option value="Bpk">Bpk</option>
	<option value="Ibu">Ibu</option>
	</select></td>
	<td><span class="nota bax"><label>Nomor Nota</label> <input type="text" name="nota" value="CH"></span></td></tr>
	<tr><td>Nama : </td><td><input type="text" name="nama" onkeyup="validhuruf(this)" required ></td><td></td></tr>
	<tr><td>No Telp :</td><td><input type="text" name='kontak' required></td><td></td></tr>
	<tr><td>Kode Sales :</td><td><input type='text' name='sales' autocomplete='off' Value="CH "></td><td> </td></tr>
	<tr><td>Pesan :</td><td><textarea cols="50" rows="7" name="pesan" required></textarea></td></tr>
	<tr><td>Waktu Pengerjaan</td>
	<td><select name="timer" required>
	<option value="">--Pilih Waktu---</option>
	<option value="sekarang">Sekarang</option>
	<option value="1">1 Jam</option>
	<option value="2">2 Jam</option>
	<option value="3">3 Jam</option>
	<option value="8">8 Jam</option>
	<option value="9">9 Jam</option>
	<option value="24">1 Hari</option>
	<option value="48">2 Hari</option>
	</select></td><td><input type='hidden' name='user' value='<?php echo $_SESSION["username"] ?>'></</td></tr>
	<tr><td></td><td><div class="sekarang box"><textarea placeholder="Respon Sales" cols="50" rows="5" name="responsales"></textarea></div></td><td><input type="hidden" name="lokasi" value="CH"></td></tr>
	<tr><td><button class="btn btn-success" type="submit">Confirm</button></td><td><button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">Cancel</button></td><td><a class='btn btn-default' href='respon'>Kembali</a></td></tr>
	</form>
	</table>
	</div>
	
	<div class="div3" style="display:none;">
	<form role="form" method="POST" action="prosesrespon" >
	<table class="table table-striped" style="font-size:14px;">
	<tr><td>Media Yang Di Pakai  </td>
	<td><input type="radio" name="hubungi" value="Telepon">Telepon
	<input type="radio" name="hubungi" value="Whatsapp"/>Whatsapp
	<input type="radio" name="hubungi" value="Sms"/>Sms
	<input type="radio" name="hubungi" value="BBM"/>BBM
	<input type="radio" name="hubungi" value="Email"/>Email
	</td><td>
	<span class="Telepon bix">
	<select name="Telepon">
	<option value="30032222">30032222</option>
	<option value="08979792255">08979792255</option>
	<option value="08979792233">08979792233</option>
	</select>
	</span>
	<span class="Whatsapp bix">
	<select name="Whatsapp">
	<option value="08979792255">08979792255</option>
	<option value="08979792233">08979792233</option>
	</select>
	</span>
	<span class="Sms bix">
	<select name="SMS">
	<option value="08979792255">08979792255</option>
	<option value="08979792233">08979792233</option>
	</select>
	</span>
	<span class="BBM bix">
	<input type="text" name="BBM" value="5AE9C001">
	</span>
	<span class="Email bix">
	<select name="Email">
	<option value="CKPG@chandrakarya.com">Ckpg@chandrakarya.com</option>
	</select>
	</span></td></tr>
	<tr><td></td>
	<td><center>DATA KONSUMEN</center></td></tr>
		<tr>
	<td>Kategori</td>
	<td><select name="kategori" required>
	<option value="">---</option>
	<option value="Komplain">Komplain</option>
	<option value="Pembayaran">Pembayaran</option>
	<option value="Tanya Pengriman">Tanya Pengiriman</option>
	<option value="Tanya Produk">Tanya Produk</option>
	<option value="Tanya Harga">Tanya Harga</option>
	<option value="Tanya Stock">Tanya Stock</option>
	<option value="Promo">Promo</option>
	<option value="DLL">DLL</option>
	</td>
	</tr>
	<tr><td>Sumber :</td><td>
	<input type="radio" name="sumber" value="Konsumen Sudah Belanja">Konsumen Sudah Belanja
	<input type="radio" name="sumber" value="Calon Pembeli" >Calon Pembeli
	<input type="radio" name="sumber" value="After Service Customer" >After Service Customer
	</td>
	</tr>
	<tr><td>Title :</td>
	<td><select name="title">
	<option value=''>-----</option>
	<option value="Bpk">Bpk</option>
	<option value="Ibu">Ibu</option>
	</select></td>
	<td><span class="nota bax"><label>Nomor Nota</label> <input type="text" name="nota" value="PG"></span></td></tr>
	<tr><td>Nama : </td><td><input type="text" name="nama" onkeyup="validhuruf(this)" required ></td><td></td></tr>
	<tr><td>No Telp :</td><td><input type="text" name='kontak' required></td><td></td></tr>
	<tr><td>Kode Sales :</td><td><input type='text' name='sales' autocomplete='off' Value="PG"></td><td></td></tr>
	<tr><td>Pesan :</td><td><textarea cols="50" rows="7" name="pesan" required></textarea></td></tr>
	<tr><td>Waktu Pengerjaan</td>
	<td><select name="timer" required>
	<option value="">--Pilih Waktu---</option>
	<option value="sekarang">Sekarang</option>
	<option value="1">1 Jam</option>
	<option value="2">2 Jam</option>
	<option value="3">3 Jam</option>
	<option value="8">8 Jam</option>
	<option value="9">9 Jam</option>
	<option value="24">1 Hari</option>
	<option value="48">2 Hari</option>
	</select></td><td><input type='hidden' name='user' value='<?php echo $_SESSION["username"] ?>'></</td></tr>
	<tr><td></td><td><div class="sekarang box"><textarea placeholder="Respon Sales" cols="50" rows="5" name="responsales"></textarea></div></td><td><input type="hidden" name="lokasi" value="CPG"></td></tr>
	<tr><td><button class="btn btn-success" type="submit">Confirm</button></td><td><button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">Cancel</button></td><td><a class='btn btn-default' href='respon'>Kembali</a></td></tr>
	</form>
	</table>
	</div>
	
<div class="div4" style="display:none;">
		<form role="form" method="POST" action="prosesrespon" >
	<table class="table table-striped" style="font-size:14px;">
	<tr><td>Media Yang Di Pakai</td>
	<td><input type="radio" name="hubungi" value="Telepon">Telepon
	<input type="radio" name="hubungi" value="Whatsapp"/>Whatsapp
	<input type="radio" name="hubungi" value="Sms"/>Sms
	<input type="radio" name="hubungi" value="BBM"/>BBM
	<input type="radio" name="hubungi" value="Email"/>Email
	</td><td>
	<span class="Telepon bix">
	<select name="Telepon">
	<option value="30010510">30010510</option>
	<option value="30010512">30010512</option>
	<option value="08979791155">08979791155</option>
	<option value="08979791144">08979791144</option>
	</select>
	</span>
	<span class="Whatsapp bix">
	<select name="Whatsapp">
	<option value="08979791155">08979791155</option>
	<option value="08979791144">08979791144</option>
	</select>
	</span>
	<span class="Sms bix">
	<select name="SMS">
	<option value="08979791155">08979791155</option>
	<option value="08979791144">08979791144</option>
	</select>
	</span>
	<span class="BBM bix">
	<input type="text" name="BBM" value="58FB13E0">
	</span>
	<span class="Email bix">
	<select name="Email">
	<option value="PIK@chandrakarya.com">Pik@chandrakarya.com</option>
	</select>
	</span></td></tr>
	<tr><td></td>
	<td><center>DATA KONSUMEN</center></td></tr>
		<tr>
	<td>Kategori</td>
	<td><select name="kategori" required>
	<option value="">---</option>
	<option value="Komplain">Komplain</option>
	<option value="Pembayaran">Pembayaran</option>
	<option value="Tanya Pengriman">Tanya Pengiriman</option>
	<option value="Tanya Produk">Tanya Produk</option>
	<option value="Tanya Harga">Tanya Harga</option>
	<option value="Tanya Stock">Tanya Stock</option>
	<option value="Promo">Promo</option>
	<option value="DLL">DLL</option>
	</td>
	</tr>
	<tr><td>Sumber :</td><td>
	<input type="radio" name="sumber" value="Konsumen Sudah Belanja">Konsumen Sudah Belanja
	<input type="radio" name="sumber" value="Calon Pembeli" >Calon Pembeli
	<input type="radio" name="sumber" value="After Service Customer" >After Service Customer
	</td>
	</tr>
	<tr><td>Title :</td>
	<td><select name="title">
	<option value=''>-----</option>
	<option value="Bpk">Bpk</option>
	<option value="Ibu">Ibu</option>
	</select></td> 
	<td><span class="nota bax"><label>Nomor Nota</label> <input type="text" name="nota" value="PIK"></span></td></tr>
	<tr><td>Nama : </td><td><input type="text" name="nama" onkeyup="validhuruf(this)" required ></td><td></td></tr>
	<tr><td>No Telp :</td><td><input type="text" name='kontak' required></td><td></td></tr>
	<tr><td>Kode Sales :</td><td><input type='text' name='sales' autocomplete='off' Value=""></td><td></td></tr>
	<tr><td>Pesan :</td><td><textarea cols="50" rows="7" name="pesan" required></textarea></td></tr>
	<tr><td>Waktu Pengerjaan</td>
	<td><select name="timer" required>
	<option value="">--Pilih Waktu---</option>
	<option value="sekarang">Sekarang</option>
	<option value="1">1 Jam</option>
	<option value="2">2 Jam</option>
	<option value="3">3 Jam</option>
	<option value="8">8 Jam</option>
	<option value="9">9 Jam</option>
	<option value="24">1 Hari</option>
	<option value="48">2 Hari</option>
	</select></td><td></td></tr>
	<tr><td></td><input type='hidden' name='user' value='<?php echo $_SESSION["username"] ?>'></<td><div class="sekarang box"><textarea placeholder="Respon Sales" cols="50" rows="5" name="responsales"></textarea></div></td><td><input type="hidden" name="lokasi" value="PIK"></td></tr>
	<tr><td><button class="btn btn-success" type="submit">Confirm</button></td><td><button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">Cancel</button></td><td><a class='btn btn-default' href='respon'>Kembali</a></td></tr>
	</form>
	</table>
	</div>
	
	<div class="div5" style="display:none;">
		<form role="form" method="POST" action="prosesrespon" >
	<table class="table table-striped" style="font-size:14px;">
	<tr><td>Media Yang Di Pakai</td>
	<td><input type="radio" name="hubungi" value="Telepon">Telepon
	<input type="radio" name="hubungi" value="Whatsapp"/>Whatsapp
	<input type="radio" name="hubungi" value="Sms"/>Sms
	<input type="radio" name="hubungi" value="BBM"/>BBM
	<input type="radio" name="hubungi" value="Email"/>Email
	</td><td>
	<span class="Telepon bix">
	<select name="Telepon">
	<option value="29315151">29315151</option>
	<option value="29314978">29314978</option>
	<option value="29314979">29314979</option>
	<option value="089676877969">089676877969</option>
	</select>
	</span>
	<span class="Whatsapp bix">
	<select name="Whatsapp">
	<option value="089676877969">089676877969</option>
	</select>
	</span>
	<span class="Sms bix">
	<select name="SMS">
	<option value="089676877969">089676877969</option>
	</select>
	</span>
	<span class="BBM bix">
	<input type="text" name="BBM" value="265535A9">
	</select>
	</span>
	<span class="Email bix">
	<select name="Email">
	<option value="ALSUT@chandrakarya.com">Alsut@chandrakarya.com</option>
	</select>
	</span></td></tr>
	<tr><td></td>
	<td><center>DATA KONSUMEN</center></td></tr>
		<tr>
	<td>Kategori</td>
	<td><select name="kategori" required>
	<option value="">---</option>
	<option value="Komplain">Komplain</option>
	<option value="Pembayaran">Pembayaran</option>
	<option value="Tanya Pengriman">Tanya Pengiriman</option>
	<option value="Tanya Produk">Tanya Produk</option>
	<option value="Tanya Harga">Tanya Harga</option>
	<option value="Tanya Stock">Tanya Stock</option>
	<option value="Promo">Promo</option>
	<option value="DLL">DLL</option>
	</td>
	</tr>
<tr><td>Sumber :</td><td>
	<input type="radio" name="sumber" value="Konsumen Sudah Belanja">Konsumen Sudah Belanja
	<input type="radio" name="sumber" value="Calon Pembeli" >Calon Pembeli
	<input type="radio" name="sumber" value="After Service Customer" >After Service Customer
	</td>
	</tr>
	<tr><td>Title :</td>
	<td><select name="title">
	<option value=''>-----</option>
	<option value="Bpk">Bpk</option>
	<option value="Ibu">Ibu</option>
	</select></td>
	<td><span class="nota bax"><label>Nomor Nota</label> <input type="text" name="nota" value="AL"></span></td></tr>
	<tr><td>Nama : </td><td><input type="text" name="nama" onkeyup="validhuruf(this)" required ></td><td></td></tr>
	<tr><td>No Telp :</td><td><input type="text" name='kontak' required></td><td></td></tr>
	<tr><td>Kode Sales :</td><td><input type='text' name='sales' autocomplete='off' Value=""></td><td></td></tr>
	<tr><td>Pesan :</td><td><textarea cols="50" rows="7" name="pesan" required></textarea></td></tr>
	<tr><td>Waktu Pengerjaan</td>
	<td><select name="timer" required>
	<option value="">--Pilih Waktu---</option>
	<option value="sekarang">Sekarang</option>
	<option value="1">1 Jam</option>
	<option value="2">2 Jam</option>
	<option value="3">3 Jam</option>
	<option value="8">8 Jam</option>
	<option value="9">9 Jam</option>
	<option value="24">1 Hari</option>
	<option value="48">2 Hari</option>
	</select></td><td><input type='hidden' name='user' value='<?php echo $_SESSION["username"] ?>'></</td></tr>
	<tr><td></td><td><div class="sekarang box"><textarea placeholder="Respon Sales" cols="50" rows="5" name="responsales"></textarea></div></td><td><input type="hidden" name="lokasi" value="AL"></td></tr>
	<tr><td><button class="btn btn-success" type="submit">Confirm</button></td><td><button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">Cancel</button></td><td><a class='btn btn-default' href='respon'>Kembali</a></td></tr>
	</form>
	</table>
	</div>
	
	<div class="div6" style="display:none;">
		<form role="form" method="POST" action="prosesrespon" >
	<table class="table table-striped" style="font-size:14px;">
	<tr><td>Media Yang Di Pakai</td>
	<td><input type="radio" name="hubungi" value="Telepon">Telepon
	<input type="radio" name="hubungi" value="Whatsapp"/>Whatsapp
	<input type="radio" name="hubungi" value="Sms"/>Sms
	<input type="radio" name="hubungi" value="BBM"/>BBM
	<input type="radio" name="hubungi" value="Email"/>Email
	</td><td>
	<span class="Telepon bix">
	<select name="Telepon">
	<option value="29745252">29745252</option>
	<option value="29745353">29745353</option>
	<option value="08999450333">08999450333</option>
	</select>
	</span>
	<span class="Whatsapp bix">
	<select name="Whatsapp">
	<option value="08999450333">08999450333</option>
	</select>
	</span>
	<span class="Sms bix">
	<select name="SMS">
	<option value="08999450333">08999450333</option>
	</select>
	</span>
	<span class="BBM bix">
	<input type="text" name="BBM" value="5F07C288">
	</select>
	</span>
	<span class="Email bix">
	<select name="Email">
	<option value="gading@chandrakarya.com">Gading@chandrakarya.com</option>
	</select>
	</span></td></tr>
	<tr><td></td>
	<td><center>DATA KONSUMEN</center></td></tr>
		<tr>
	<td>Kategori</td>
	<td><select name="kategori" required>
	<option value="">---</option>
	<option value="Komplain">Komplain</option>
	<option value="Pembayaran">Pembayaran</option>
	<option value="Tanya Pengriman">Tanya Pengiriman</option>
	<option value="Tanya Produk">Tanya Produk</option>
	<option value="Tanya Harga">Tanya Harga</option>
	<option value="Tanya Stock">Tanya Stock</option>
	<option value="Promo">Promo</option>
	<option value="DLL">DLL</option>
	</td>
	</tr>
<tr><td>Sumber :</td><td>
	<input type="radio" name="sumber" value="Konsumen Sudah Belanja">Konsumen Sudah Belanja
	<input type="radio" name="sumber" value="Calon Pembeli" >Calon Pembeli
	<input type="radio" name="sumber" value="After Service Customer" >After Service Customer
	</td>
	</tr>
	<tr><td>Title :</td>
	<td><select name="title">
	<option value=''>-----</option>
	<option value="Bpk">Bpk</option>
	<option value="Ibu">Ibu</option>
	</select></td>
	<td><span class="nota bax"><label>Nomor Nota</label> <input type="text" name="nota" value="KG"></span></td></tr>
	<tr><td>Nama : </td><td><input type="text" name="nama" onkeyup="validhuruf(this)" required ></td><td></td></tr>
	<tr><td>No Telp :</td><td><input type="text" name='kontak' required></td><td></td></tr>
	<tr><td>Kode Sales :</td><td><input type='text' name='sales' autocomplete='off' Value=""></td><td></td></tr>
	<tr><td>Pesan :</td><td><textarea cols="50" rows="7" name="pesan" required></textarea></td></tr>
	<tr><td>Waktu Pengerjaan</td>
	<td><select name="timer" required>
	<option value="">--Pilih Waktu---</option>
	<option value="sekarang">Sekarang</option>
	<option value="1">1 Jam</option>
	<option value="2">2 Jam</option>
	<option value="3">3 Jam</option>
	<option value="8">8 Jam</option>
	<option value="9">9 Jam</option>
	<option value="24">1 Hari</option>
	<option value="48">2 Hari</option>
	</select></td><td><input type='hidden' name='user' value='<?php echo $_SESSION["username"] ?>'></</td></tr>
	<tr><td></td><td><div class="sekarang box"><textarea placeholder="Respon Sales" cols="50" rows="5" name="responsales"></textarea></div></td><td><input type="hidden" name="lokasi" value="KG"></td></tr>
	<tr><td><button class="btn btn-success" type="submit">Confirm</button></td><td><button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">Cancel</button></td><td><a class='btn btn-default' href='respon'>Kembali</a></td></tr>
	</form>
	</table>
	</div>
	
	<div class="div7" style="display:none;">
		<form role="form" method="POST" action="prosesrespon" >
	<table class="table table-striped" style="font-size:14px;">
	<tr><td>Media Yang Di Pakai</td>
	<td><input type="radio" name="hubungi" value="Telepon">Telepon
	<input type="radio" name="hubungi" value="Whatsapp"/>Whatsapp
	<input type="radio" name="hubungi" value="Sms"/>Sms
	<input type="radio" name="hubungi" value="BBM"/>BBM
	<input type="radio" name="hubungi" value="Email"/>Email
	</td><td>
	<span class="Telepon bix">
	<select name="Telepon">
	<option value="28088889">28088889</option>
	<option value="28088866">28088866</option>
	<option value="tes1">08979791800</option>
	</select>
	</span>
	<span class="Whatsapp bix">
	<select name="Whatsapp">
	<option value="tes1">08979791800</option>
	</select>
	</span>
	<span class="Sms bix">
	<select name="SMS">
	<option value="tes1">08979791800</option>
	</select>
	</span>
	<span class="BBM bix">
	<input type="text" name="BBM" value="59AA0585">
	</select>
	</span>
	<span class="Email bix">
	<select name="Email">
	<option value="bekasi@chandrakarya.com">Bekasi@chandrakarya.com</option>
	</select>
	</span></td></tr>
	<tr><td></td>
	<td><center>DATA KONSUMEN</center></td></tr>
		<tr>
	<td>Kategori</td>
	<td><select name="kategori" required>
	<option value="">---</option>
	<option value="Komplain">Komplain</option>
	<option value="Pembayaran">Pembayaran</option>
	<option value="Tanya Pengriman">Tanya Pengiriman</option>
	<option value="Tanya Produk">Tanya Produk</option>
	<option value="Tanya Harga">Tanya Harga</option>
	<option value="Tanya Stock">Tanya Stock</option>
	<option value="Promo">Promo</option>
	<option value="DLL">DLL</option>
	</td>
	</tr>
	<tr><td>Sumber :</td><td>
	<input type="radio" name="sumber" value="Konsumen Sudah Belanja">Konsumen Sudah Belanja
	<input type="radio" name="sumber" value="Calon Pembeli" >Calon Pembeli
	<input type="radio" name="sumber" value="After Service Customer" >After Service Customer
	</td>
	</tr>
	<tr><td>Title :</td>
	<td><select name="title">
	<option value=''>-----</option>
	<option value="Bpk">Bpk</option>
	<option value="Ibu">Ibu</option>
	</select></td>
	<td><span class="nota bax"><label>Nomor Nota</label> <input type="text" name="nota" value="CKB"></span></td></tr>
	<tr><td>Nama : </td><td><input type="text" name="nama" onkeyup="validhuruf(this)" required ></td><td></td></tr>
	<tr><td>No Telp :</td><td><input type="text" name='kontak' required></td><td></td></tr>
	<tr><td>Kode Sales :</td><td><input type='text' name='sales' autocomplete='off' Value=""></td><td></td></tr>
	<tr><td>Pesan :</td><td><textarea cols="50" rows="7" name="pesan" required></textarea></td></tr>
	<tr><td>Waktu Pengerjaan</td>
	<td><select name="timer" required>
	<option value="">--Pilih Waktu---</option>
	<option value="sekarang">Sekarang</option>
	<option value="1">1 Jam</option>
	<option value="2">2 Jam</option>
	<option value="3">3 Jam</option>
		<option value="8">8 Jam</option>
	<option value="9">9 Jam</option>
	<option value="24">1 Hari</option>
	<option value="48">2 Hari</option>
	</select></td><td><input type='hidden' name='user' value='<?php echo $_SESSION["username"] ?>'></</td></tr>
	<tr><td></td><td><div class="sekarang box"><textarea placeholder="Respon Sales" cols="50" rows="5" name="responsales"></textarea></div></td>	<td><input type="hidden" name="lokasi" value="CBEK"></td></tr>
	<tr><td><button class="btn btn-success" type="submit">Confirm</button></td><td><button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">Cancel</button></td><td><a class='btn btn-default' href='respon'>Kembali</a></td></tr>
	</form>
	</table>
	</div>
	
	<div class="div8" style="display:none;">
		<form role="form" method="POST" action="prosesrespon" >
	<table class="table table-striped" style="font-size:14px;">
	<tr><td>Media Yang Di Pakai</td>
	<td><input type="radio" name="hubungi" value="Telepon">Telepon
	<input type="radio" name="hubungi" value="Whatsapp"/>Whatsapp
	<input type="radio" name="hubungi" value="Sms"/>Sms
	<input type="radio" name="hubungi" value="BBM"/>BBM
	<input type="radio" name="hubungi" value="Email"/>Email
	</td><td>
	<span class="Telepon bix">
	<select name="Telepon">
	<option value="20567766">20567766</option>
	<option value="20567767">20567767</option>
	<option value="20567768">20567768</option>
	<option value="08979790205">08979790205</option>
	<option value="08987979100">08987979100</option>
	</select>
	</span>
	<span class="Whatsapp bix">
	<select name="Whatsapp">
	<option value="08979790205">08979790205</option>
	<option value="08987979100">08987979100</option>
	</select>
	</span>
	<span class="Sms bix">
	<select name="SMS">
	<option value="08979790205">08979790205</option>
	<option value="08987979100">08987979100</option>
	</select>
	</span>
	<span class="BBM bix">
	<input type="text" name="BBM" value="--EMPTY--">
	</select>
	</span>
	<span class="Email bix">
	<select name="Email">
	<option value="bandung@chandrkarya.com">Bandung@chandrakarya.com</option>
	</select>
	</span></td></tr>
	<tr><td></td>
	<td><center>DATA KONSUMEN</center></td></tr>
		<tr>
	<td>Kategori</td>
	<td><select name="kategori" required>
	<option value="">---</option>
	<option value="Komplain">Komplain</option>
	<option value="Pembayaran">Pembayaran</option>
	<option value="Tanya Pengriman">Tanya Pengiriman</option>
	<option value="Tanya Produk">Tanya Produk</option>
	<option value="Tanya Harga">Tanya Harga</option>
	<option value="Tanya Stock">Tanya Stock</option>
	<option value="Promo">Promo</option>
	<option value="DLL">DLL</option>
	</td>
	</tr>
<tr><td>Sumber :</td><td>
	<input type="radio" name="sumber" value="Konsumen Sudah Belanja">Konsumen Sudah Belanja
	<input type="radio" name="sumber" value="Calon Pembeli" >Calon Pembeli
	<input type="radio" name="sumber" value="After Service Customer" >After Service Customer
	</td>
	</tr>
	<tr><td>Title :</td>
	<td><select name="title">
	<option value=''>-----</option>
	<option value="Bpk">Bpk</option>
	<option value="Ibu">Ibu</option>
	</select></td>
	<td><span class="nota bax"><label>Nomor Nota</label> <input type="text" name="nota" value="BDG"></span></td></tr>
	<tr><td>Nama : </td><td><input type="text" name="nama" onkeyup="validhuruf(this)" required ></td><td></td></tr>
	<tr><td>No Telp :</td><td><input type="text" name='kontak'  required></td><td></td></tr>
	<tr><td>Kode Sales :</td><td><input type='text' name='sales' autocomplete='off' Value=""></td><td></td></tr>
	<tr><td>Pesan :</td><td><textarea cols="50" rows="7" name="pesan" required></textarea></td></tr>
	<tr><td>Waktu Pengerjaan</td>
	<td><select name="timer" required>
	<option value="">--Pilih Waktu---</option>
	<option value="sekarang">Sekarang</option>
	<option value="1">1 Jam</option>
	<option value="2">2 Jam</option>
	<option value="3">3 Jam</option>
	<option value="8">8 Jam</option>
	<option value="9">9 Jam</option>
	<option value="24">1 Hari</option>
	<option value="48">2 Hari</option>
	</select></td><td><input type='hidden' name='user' value='<?php echo $_SESSION["username"] ?>'></</td></tr>
	<tr><td></td><td><div class="sekarang box"><textarea placeholder="Respon Sales" cols="50" rows="5" name="responsales"></textarea></div></td><td><input type="hidden" name="lokasi" value="CBDG"></td></tr>
	<tr><td><button class="btn btn-success" type="submit">Confirm</button></td><td><button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">Cancel</button></td><td><a class='btn btn-default' href='respon'>Kembali</a></td></tr>
	</form>
	</table>
	</div>
	
	<div class="div9" style="display:none">
	<form role="form" method="POST" action="prosesrespon" >
	<table class="table table-striped" style="font-size:14px;">
	<tr><td>Media Yang Di Pakai</td>
	<td><input type="radio" name="hubungi" value="Telepon">Telepon
	<input type="radio" name="hubungi" value="Whatsapp"/>Whatsapp
	<input type="radio" name="hubungi" value="Sms"/>Sms
	<input type="radio" name="hubungi" value="BBM"/>BBM
	<input type="radio" name="hubungi" value="Email"/>Email
	</td><td>
	<span class="Telepon bix">
	<select name="Telepon">
	<option value="4205550">4205550</option>
	<option value="4254682">4254682</option>
	<option value="4212323">4212323</option>
	<option value="08981801800">08981801800</option>
	<option value="08999921800">08999921800</option>
	</select>
	</span>
	<span class="Whatsapp bix">
	<select name="Whatsapp">
	<option value="08981801800">08981801800</option>
	<option value="08999921800">08999921800</option>
	<option value="08990021020">08990021020</option>
	<option value="089603000401">089603000401</option>	
</select>
	</span>
	<span class="Sms bix">
	<select name="SMS">
	<option value="08981801800">08981801800</option>
	<option value="08999921800">08999921800</option>
	</select>
	</span>
	<span class="BBM bix">
	<input type="text" name="BBM" value="5E76601F">
	</span>
	<span class="Email bix">
	<select name="Email">
	<option value="sales@chandrakarya.com">Sales@chandrakarya.com</option>
	</select>
	</span></td></tr>
	<tr><td></td>
	<td><center>DATA KONSUMEN</center></td></tr>
	<tr>
	<td>Kategori</td>
	<td><select name="kategori" required>
	<option value="">---</option>
	<option value="Komplain">Komplain</option>
	<option value="Pembayaran">Pembayaran</option>
	<option value="Tanya Pengriman">Tanya Pengiriman</option>
	<option value="Tanya Produk">Tanya Produk</option>
	<option value="Tanya Harga">Tanya Harga</option>
	<option value="Tanya Stock">Tanya Stock</option>
	<option value="Promo">Promo</option>
	<option value="DLL">DLL</option>
	</td>
	</tr>
	<tr><td>Sumber :</td><td>
	<input type="radio" name="sumber" value="Konsumen Sudah Belanja">Konsumen Sudah Belanja
	<input type="radio" name="sumber" value="Calon Pembeli" >Calon Pembeli
	<input type="radio" name="sumber" value="After Service Customer" >After Service Customer
	</td>
	</tr>
	<tr><td>Title :</td>
	<td><select name="title">
	<option value=''>-----</option>
	<option value="Bpk">Bpk</option>
	<option value="Ibu">Ibu</option>
	</select></td>
	<td><label>Nomor Nota</label>
	<select name="nota">
	<option value="ON-MKP">ON-MKP</option>
	<option value="ON-PC">ON-PC</option>
	<option value="ON-SM">ON-SM</option>
	</select>
	</td></tr>
	<tr><td>Nama : </td><td><input type="text" name="nama" onkeyup="validhuruf(this)" required ></td><td></td></tr>
	<tr><td>No Telp :</td><td><input type="text" name='kontak' required></td><td></td></tr>
	<tr><td>Kode Sales :</td><td><input type='text' name='sales' autocomplete='off' Value=""></td><td></td></tr>
	<tr><td>Pesan :</td><td><textarea cols="50" rows="7" name="pesan" required></textarea></td></tr>
	<tr><td>Waktu Pengerjaan</td>
	<td><select name="timer" required>
	<option value="">--Pilih Waktu---</option>
	<option value="sekarang">Sekarang</option>
	<option value="1">1 Jam</option>
	<option value="2">2 Jam</option>
	<option value="3">3 Jam</option>
	<option value="8">8 Jam</option>
	<option value="9">9 Jam</option>
	<option value="24">1 Hari</option>
	<option value="48">2 Hari</option>
	</select></td><td><input type='hidden' name='user' value='<?php echo $_SESSION["username"] ?>'></td></tr>
	<tr><td></td><td><div class="sekarang box"><textarea placeholder="Respon Sales" cols="50" rows="5" name="responsales"></textarea></div></td><td><input type="hidden" name="lokasi" value="CM"></tr>
		<tr><td><button class="btn btn-success" type="submit">Confirm</button></td><td><button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">Cancel</button></td><td><a class='btn btn-default' href='respon'>Kembali</a></td></tr>
	</form>
	</table>
	</div>
</body>
</html>
