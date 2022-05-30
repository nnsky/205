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
$sql="SELECT * FROM asales where ticketid = '$report_id'";
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
	function media(param)
{
if(param==1)
document.getElementById("kuntak").style.display = 'block';
else
document.getElementById("kuntak").style.display = 'none';
}
</script>
</head>
<body>
<div class="s">
<h3>Data Konsumen :</h3><br>
<div class="row r">
	<div class="col-sm-3">
		Nama : <?php echo $hasil['nama']?>
	</div>
	<div class="col-sm-3">
		Kontak : <?php echo $hasil['kontak']?>
	</div>
	<div class="col-sm-3">
		Nota : <?php echo $hasil['nota']?>
	</div>
	<div class="col-sm-3">
		<?php
			if($hasil['status']=='pending'){
				echo "Status : <b style='color:red'>Pending</b>";
			}else if($hasil['status']=='proses'){
				echo "Status : <b style='color:green'>On Process</b>";
			}else{
				echo "Status :  <b style='color:blue'>Selesai</b>";
			}
		?>
	</div>
	<br>
</div>
<br>
<form action="prosesasales.php" method="POST">
<div class='col-sm-12'>
					<div class='col-sm-6'><label style='font-size:18px;'>Pesan</label></div>
					<div class='col-sm-6'><label style='font-size:18px;'>Memo Dari Sales : <?php echo $hasil['sales'] ?></label></div>
				</div>
				<div class='col-sm-12'>
					<div class='col-sm-6'><b><textarea rows='6' cols='30' disabled="disabled" class="form-control" style='overflow:scroll;'> <?php echo $hasil['feedback'] ?></textarea></b></div>
					<div class='col-sm-6'><b>
					<b><span class="form-control" disabled="disabled" style='overflow:scroll; height:150px;'>
					<?php 
								if($hasil['respon']==null){
									echo 'Maaf Untuk Saat Ini Tidak Ada Respon Dari Sales';
								}else
								echo $hasil['respon'];
								?>
					</span></b>
					</div>
				</div>
				<div class='col-sm-12'>
				  <span style='float:right; font-size:20px;'>Apakah Anda Ingin Menambahkan Memo :
					<input type="radio" onclick="media(0)" value="Tidak" checked>Tidak
					<input type="radio" onclick="media(1)" value="Iya" >Iya
					</span>
				</div>
				<div class='col-sm-12'>
					<div class='col-sm-6'>

					</div>
					<div class='col-sm-6'>
					<textarea id="kuntak" name="tanggapan" class='form-control' rows='5' style='display:none'></textarea>
					</div>
					</div>
				<div class='form-group' style="padding-bottom: 20px;">
						Status:
							<select name="status" id='status' required>
							<option value="">None</option>
							<option value="pending">Pending</option>
							<option value="proses">On Process</option>
							<option value="selesai">Selesai</option>
							</select>
							<select name='time' id='time'>
								<option value="5">5 Jam</option>
									<option value="6">6 Jam</option>
									<option value="7">7 Jam</option>
									<option value="8">8 Jam</option>
									<option value="9">9 Jam</option>
									<option value="24">1 Hari</option>
									<option value="48">2 Hari</option>
									<option value="168">1 Minggu</option>
							</select>
							<span style='font-size:18px; color:red'>Ubah Status Di Sini*</span>
							<input type='hidden' name='id' value='<?php echo $hasil["ticketid"] ?>'>
							<input type="hidden" name="tanggapanlama" value="<?php echo $hasil['respon'];?>">
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
