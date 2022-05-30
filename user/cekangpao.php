<html>
<head>
<link rel='stylesheet' href='../css/bootstrap.min.css'>
<script src='../asset/jquery.min.js'></script>
<script src='../asset/bootstrap.min.js'></script> 
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css"> 
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>

<script>
      $(function () {
        $('#datetimepicker').datepicker({
			dateFormat: 'dd/mm/yy'
            });
        });
		
		    $(function() {
        $('#update').change(function(){
            $('.jenis').hide();
            $('#' + $(this).val()).show();
        });
    });
			    $(function() {
        $('#jenispaket').change(function(){
            $('.seri').hide();
            $('#' + $(this).val()).show();
        });
    });
</script>
</head>
<?php
	include '../koneksi.php';
	session_start();
	$lokasi=$_SESSION['lokasi'];
	$id=$_GET['id'];
	$cari="select *from vangpao where id=$id";
	$query=mysqli_query($conn,$cari);
	$hasil=mysqli_fetch_array($query);
?>
<body>
<div class="container">
  <h2><center>Form Pohon Angpao</center></h2>
  <form action="uangpao?&id=<?php echo $hasil['id'] ?>" method='POST'>
  <div class='row'>
    <div class="col-sm-6 form-group">
      <label for="nama">Nama Konsumen:</label>
      <input type="text" class="form-control" name="nama" value="<?php echo $hasil['nama']?>">
    </div>
    <div class="col-sm-6 form-group">
      <label for="tanggal">Tanggal Pembelian</label>
      <input type="text" id="datetimepicker" class="form-control" name="tanggal" value='<?php echo $hasil['tanggal']?>' autocomplete='off'>
    </div>
   </div>
     <div class='row'>
    <div class="col-sm-6 form-group">
      <label for="nota">Nota Konsumen:</label>
      <input type="text" class="form-control" name="nota" value="<?php echo $hasil['nota']?>">
    </div>
    <div class="col-sm-6 form-group">
      <label for="seri">Seri | Seri Voucher</label>
      <input type="text" class="form-control" name="jenislama" value='<?php echo $hasil['jenis'].'|'.$hasil['seri']?>' autocomplete='off' readonly>
    </div>
   </div>
   <h3>Ubah Jenis Dan Seri  ?</h3><br>
	<select id='update' class='form-control' name='update'>
		<option value='tidak'>Tidak</option>
		<option value='ya'>Ya</option>
	</select>
 		<div class='row jenis' id='ya' style='display:none'>
				<div class='col-sm-6'>
				<b><h4>Jenis Voucher</h4></b>
				<select id='jenispaket' class='form-control' name='jenis' required>
					<option value='kosong'>--Pilih Jenis Voucher</option>
					<option value="A">Jenis A</option>
					<option value="B">Jenis B</option>
					<option value="C">Jenis C</option>
					<option value="D">Jenis D</option>
					<option value="E">Jenis E</option>
					<option value="F">Jenis F</option>
					<option value="G">Jenis G</option>
				</select>
				</div>
				<div class='col-sm-6'>
				<b><h4>Seri Voucher</h4></b>
				<select id='kosong' name='' class='form-control seri' style='display:block'>
					<option value=''>---Seri Voucher----</option>
				</select>
				<select name='A' id='A' class='form-control seri' style='display:none'>
					<?php
						$select="select *from stangpao where lokasi='$lokasi' && status='aktif' && jenis='A' order by seri ASC";
						$query=mysqli_query($conn,$select);
						while($array=mysqli_fetch_array($query)){
							echo "
							<option value=".$array['seri'].">".$array['seri']."</option>
							
							";
						}
					?>
				</select>
				<select name='B' id='B' class='form-control seri' style='display:none'>
				<?php
						$select="select *from stangpao where lokasi='$lokasi' && status='aktif' && jenis='B' order by seri ASC";
						$query=mysqli_query($conn,$select);
						while($array=mysqli_fetch_array($query)){
							echo "
							<option value=".$array['seri'].">".$array['seri']."</option>
							
							";
						}
					?>
				</select>
				<select name='C' id='C' class='form-control seri' style='display:none'>
				<?php
						$select="select *from stangpao where lokasi='$lokasi' && status='aktif' && jenis='C' order by seri ASC";
						$query=mysqli_query($conn,$select);
						while($array=mysqli_fetch_array($query)){
							echo "
							<option value=".$array['seri'].">".$array['seri']."</option>
							
							";
						}
					?>
				</select>
				<select name='D' id='D' class='form-control seri' style='display:none'>
				<?php
						$select="select *from stangpao where lokasi='$lokasi' && status='aktif' && jenis='D' order by seri ASC";
						$query=mysqli_query($conn,$select);
						while($array=mysqli_fetch_array($query)){
							echo "
							<option value=".$array['seri'].">".$array['seri']."</option>
							
							";
						}
					?>
				</select>
				<select name='E' id='E' class='form-control seri' style='display:none'>
				<?php
						$select="select *from stangpao where lokasi='$lokasi' && status='aktif' && jenis='E' order by seri ASC";
						$query=mysqli_query($conn,$select);
						while($array=mysqli_fetch_array($query)){
							echo "
							<option value=".$array['seri'].">".$array['seri']."</option>
							
							";
						}
					?>
				</select>
				<select name='F' id='F' class='form-control seri' style='display:none'>
				<?php
						$select="select *from stangpao where lokasi='$lokasi' && status='aktif' && jenis='F' order by seri ASC";
						$query=mysqli_query($conn,$select);
						while($array=mysqli_fetch_array($query)){
							echo "
							<option value=".$array['seri'].">".$array['seri']."</option>
							
							";
						}
					?>
				</select>
				<select name='G' id='G' class='form-control seri' style='display:none'>
						<?php
						$select="select *from stangpao where lokasi='$lokasi' && status='aktif' && jenis='G' order by seri ASC";
						$query=mysqli_query($conn,$select);
						while($array=mysqli_fetch_array($query)){
							echo "
							<option value=".$array['seri'].">".$array['seri']."</option>
							
							";
						}
					?>
				</select>
				</div>
		</div>
		<br>
	<a href='angpao' class='btn btn-default'>Back</a>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
</body>
</html>
