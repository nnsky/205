<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tanggapan Sales</title>
	<link rel="stylesheet" type="text/css" href="../css/respon.css">
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<script src="/asset/jquery.min.js"></script>
</head>
<?php
include 'menu.php';
$report_id=$_GET['_id'];
$sql="SELECT * FROM respon where responid = '$report_id'";
$query = mysqli_query($conn, $sql);
$hasil=mysqli_fetch_array($query);
?>
<script>
$(document).ready(function(){
  $("#time").hide();
  $("#status").change(function(){
   if($("#status").val() == 'proses'){
      //Show text box here
      $("#time").show();
   }
   else{
     //Hide text box here
     $("#time").hide();
   }
    });
});
</script>
</head>
<body>
<div class="s">
<h3>Data Konsumen :</h3><br>
<form action="cektanggapan.php" method="POST">
<br>

<div class="r">
<div class='row'>
	<div class='col-sm-3'>
		Nama : <input type='text' name='nama' value="<?php echo $hasil['nama']?>" required>
	</div>
	<div class='col-sm-3'>
		Sumber : <input type='text' name='sumber' value="<?php echo $hasil['sumber']?>" required>
	</div>
	<div class='col-sm-3'>
		Telp : <input type='text' name='kontak' value="<?php echo $hasil['kontak']?>" required>
	</div>
	<div class='col-sm-3'>
		Status :
		<?php if($hasil['status'] == 'pending' or $hasil['status'] == 'Pending'){
	echo '<span style="color:red">Pending</span>';
	}elseif($hasil['status']=='proses'){
		echo '<span style="color:green">On-Process</span>';
	}else{
		echo '<span style="color:blue">Selesai</span>';
	}?> 
	</div>
</div>
<br>
<div class='row'>
	<div class='col-sm-3'>
	Nota : <input type='text' name='nota' value='<?php echo $hasil["nota"]?>'>
	</div>
	<div class='col-sm-3'>
	Media : <input type='text' name='mediaa' value='<?php echo $hasil["media"]?>'>
	</div>
	<div class='col-sm-3'>
	Sales : <input type='text' name='sales' value='<?php echo $hasil['untuk']?>' required>
	</div>
</div>
<br>
<div class='row'>
	<div class='col-sm-6'>
	<label style='font-size:18px;'>Pesan</label>
	<br>
	<b><textarea rows='6' cols='30' name='pesan' class="form-control" style='overflow:scroll;'> <?php echo $hasil['pesan'] ?></textarea></b>
	</div>
	<div class='col-sm-6'>
	<label style='font-size:18px;'>Memo Dari Sales : <?php echo $hasil['untuk'] ?></label>
	<br>
	<b><span class="form-control" disabled="disabled" style='overflow:scroll; height:150px;'>
					<?php 
								if($hasil['tanggapan']==null){
									echo 'Maaf Untuk Saat Ini Tidak Ada Respon Dari Sales';
								}else
								echo $hasil['tanggapan'];
								?>
					</span></b>
	</div>
</div>
			<div class='row'>
				<div class='col-sm-12'>
					<div class='col-sm-6'>
					<h4>Catatan Internal / Sales</h4>
					<textarea name="catatan" class='form-control' rows='5'><?php echo $hasil['catatan']?></textarea>
					</div>
					<div class='col-sm-6'>
					<h4>Tambahan Memo Untuk Konsumen</h4>
					<textarea name="tanggapan" class='form-control' rows='5'></textarea>
					</div>
				</div>
			</div>
				<div class='form-group' style="padding-bottom: 20px;">
						Status:
							<select name="status" id='status' required>
							<option value="">None</option>
							<option value="pending">Pending</option>
							<option value="proses">On Proses</option>
							<option value="selesai">Selesai</option>
							</select>
							<select name='time' id='time'>
								<option value="1">1 Jam</option>
									<option value="2">2 Jam</option>
									<option value="3">3 Jam</option>
									<option value="8">8 Jam</option>
									<option value="9">9 Jam</option>
									<option value="24">1 Hari</option>
									<option value="48">2 Hari</option>
									<option value="168">1 Minggu</option>
							</select>
							<span style='font-size:18px; color:red'>Ubah Status Di Sini*</span>
							<input type='hidden' name='id' value='<?php echo $report_id ?>'>
							<input type="hidden" name="tanggapanlama" value="<?php echo $hasil['tanggapan'];?>">
							<input type='hidden' name='user' value="<?php echo $_GET['user'] ?>">
					</div>
	            <div class="modal-footer">
	                <a href='respon' class='btn btn-default'>Kembali</a>
	                <button class="btn btn-success" type="submit">Confirm
	                </button>
	            </div>
</form>
</div>
</div>

</html>
