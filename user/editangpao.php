<html>
<head>
<meta CHarset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Voucher Angpao</title>
	<link rel='stylesheet' href='../css/bootstrap.min.css'>
	<script src='../asset/jquery.min.js'></script>
	<script src='../asset/bootstrap.min.js'></script>
	<link rel="stylesheet" href="../css/tablejquery.css">
	<script src="../asset/tablejquery.js"></script>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css"> 
   <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script> 
<script>
     $(function () {
        $('#datetimepicker1').datepicker({
			dateFormat: 'ddmmyy'
            });
        });
	  $(function () {
         $('#datetimepicker2').datepicker({
			dateFormat: 'ddmmyy'
            });
        });	
	  $(function () {
         $('#datetimepicker3').datepicker({
			dateFormat: 'ddmmyy'
            });
        });	
</script>	
<?php
include 'menu.php';
$id=$_GET['id'];

$select="select *from dbkonsumen where id='$id'";
$qselect=mysqli_query($conn,$select);
$aselect=mysqli_fetch_array($qselect);
?>
</head>
<body>
<center><h3>Form Kupon <?php echo $aselect['kdpkt'].' '.$aselect['seri'] ?></h3></center>
<div class="container controls">
<form action="cekedit1" method="post">
	<div class="row">
		<div class="col-sm-3">
		<label>Nama</label>
		<input type="text" name="nama" class="form-control" value="<?php echo $aselect['nama']?>">
		</div>
		<div class="col-sm-3">
		<label>Nik</label>
		<input type="text" name="nik" class="form-control" value="<?php echo $aselect['nik'] ?>">
		</div>
		<div class="col-sm-3">
		<label>No Hp</label>
		<input type="text" name="hp" class="form-control" value="<?php echo $aselect['hp'] ?>">
		</div>
		<div class="col-sm-3">
		<label>Email</label>
		<input type="text" name="email" class="form-control" value="<?php echo $aselect['email'] ?>">
		</div>
	</div>
	<div class="row">
		<div class="col-sm-4">
		<label>Alamat</label>
		<textarea name="alamat" class="form-control" value="<?php echo $aselect['alamat']?>"> </textarea>
		</div>
		<div class="col-sm-4">
		<label>Kode Kupon</label>
		<input type="text" name="kdpkt" class="form-control" value="<?php echo $aselect['kdpkt'] ?>" readonly>
		</div>
		<div class="col-sm-4">
		<label>Seri Voucher</label>
		<input type="text" name="seri" class="form-control" value="<?php echo $aselect['seri'] ?>" required>
		</div>
	</div>
	<center><h4>Nota</h4></center>
<table class='table table-responsive'>
	<tr>
		<td>Matress</td>
		<td>Sofa</td>
		<td>Quality</td>
	</tr>
	<tr>
		<td>
		<?php
			if($aselect['notam']==null){
				echo "<input type='text' name='matt' class='form-control' ";
			}else{
				echo "<input type='text' name='matt' class='form-control' value='".$aselect['notam']."' readonly";
				
			}
		?>
		</td>
		<td>
		<?php
			if($aselect['notas']==null){
				echo "<input type='text' name='sofa' class='form-control' ";
			}else{
				echo "<input type='text' name='sofa' class='form-control' value='".$aselect['notas']."' readonly";
				
			}
		?>
		</td>
		<td>
		<?php
			if($aselect['notaq']==null){
				echo "<input type='text' name='qual' class='form-control' ";
			}else{
				echo "<input type='text' name='qual' class='form-control' value='".$aselect['notaq']."' readonly";
				
			}
		?>
		</td>
	</tr>
</table>
	<center><h4>Tanggal Pembelian</h4></center>
	<table class='table table-responsive'>
	<tr>
		<td>Matress</td>
		<td>Sofa</td>
		<td>Quality</td>
	</tr>
	<tr>
		<td>
		<?php
			if($aselect['tanggalm']==null){
				echo "<input id='datetimepicker1' type='text' name='tglmatt' class='form-control' ";
			}else{
				echo "<input type='text' name='tglmatt' class='form-control' value='".$aselect['tanggalm']."' readonly";
				
			}
		?>
		</td>
			<td>
		<?php
			if($aselect['tanggals']==null){
				echo "<input id='datetimepicker2' type='text' name='tglsofa' class='form-control' ";
			}else{
				echo "<input type='text' name='tglsofa' class='form-control' value='".$aselect['tanggals']."' readonly";
				
			}
		?>
		</td>
			<td>
		<?php
			if($aselect['tanggalq']==null){
				echo "<input id='datetimepicker3' type='text' name='tglqual' class='form-control' ";
			}else{
				echo "<input type='text' name='tglqual' class='form-control' value='".$aselect['tanggalq']."' readonly";
				
			}
		?>
		</td>
	<div class="modal-footer">
		<input type="hidden" value="qvangpao" name="perihal">
		<input type="hidden" value="<?php echo $_SESSION['lokasi'] ?>" name="lokasi">
		<input type="hidden" value="<?php echo $_SESSION['username'] ?>" name="user">
		<input type="hidden" value="<?php echo $aselect['id']?>" name="id">
		<input type="hidden" value="<?php echo $aselect['seri']?>" name="serilama">
          <button class="btn btn-primary">Simpan</button>
          <a href="vangpao" class="btn btn-default">Kembali</a>
        </div>
	</form>
</div>
</body>
</html>
