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
		<input type="text" name="kdpkt" class="form-control" value="<?php echo $aselect['kdpkt'] ?>" >
		</div>
		<div class="col-sm-4">
		<label>Seri Voucher</label>
		<input type="text" name="seri" class="form-control" value="<?php echo $aselect['seri'] ?>" required>
		</div>
	</div>
	<h3><center>Nota</center></h3>
	<div class="row">
		<div class="col-sm-4">
		<label>Matress</label>
		<input type="text" name="matt" class="form-control" value="<?php echo $aselect['notam'] ?>" >
		</div>
		<div class="col-sm-4">
		<label>Sofa</label>
		<input type="text" name="sofa" class="form-control" value="<?php echo $aselect['notas'] ?>" >
		</div>
		<div class="col-sm-4">
		<label>Quality</label>
		<input type="text" name="qual" class="form-control" value="<?php echo $aselect['notaq'] ?>">
		</div>
	</div>
	<h3><center>Tanggal Pembelian</center></h3>
	<div class="row">
		<div class="col-sm-4">
		<label>Matress</label>
		<input id="datetimepicker1" type="text" name="tanggalm" class="form-control" value="<?php echo $aselect['tanggalm'] ?>" >
		</div>
		<div class="col-sm-4">
		<label>Sofa</label>
		<input id="datetimepicker2" type="text" name="tanggals" class="form-control" value="<?php echo $aselect['tanggals'] ?>" >
		</div>
		<div class="col-sm-4">
		<label>Quality</label>
		<input id="datetimepicker3" type="text" name="tanggalq" class="form-control" value="<?php echo $aselect['tanggalq'] ?>">
		</div>
	</div>
		<div class="modal-footer">
		<input type="hidden" value="qvangpao" name="perihal">
		<input type="hidden" value="<?php echo $_SESSION['lokasi'] ?>" name="lokasi">
		<input type="hidden" value="<?php echo $_SESSION['username'] ?>" name="user">
		<input type="hidden" value="<?php echo $aselect['id']?>" name="id">
          <button class="btn btn-primary">Simpan</button>
          <a href="vangpao" class="btn btn-default">Kembali</a>
        </div>
</body>
</html>
