<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tanggapan Sales</title>
	<link rel="stylesheet" type="text/css" href="../css/respon.css">
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<script src="/asset/jquery.min.js"></script>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css"> 
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
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
<div class="s">
<h3>Data Konsumen :</h3><br>
<form action="prosesasales.php" method="POST">
<div class="row r">
	<div class="col-sm-3">
		Nama : <input type='text' name='nama' value='<?php echo $hasil['nama']?>' required>
	</div>
	<div class="col-sm-3">
		Kontak :<input type="text" name="kontak" value='<?php echo $hasil['kontak']?>' required>
	</div>
	<div class="col-sm-3">
		Nota : <input text='text' name='nota' value='<?php echo $hasil['nota']?>' required>
	</div>
	<div class="col-sm-3">
		<?php
			if($hasil['status']=='pending'){
				echo "Status : <b style='color:red'>Pending</b>";
			}else if($hasil['status']=='proses'){
				echo "Status : <b style='color:green'>On-Process</b>";
			}else{
				echo "Status :  <b style='color:blue'>Selesai</b>";
			}
		?>
	</div>
	
</div>
<br>
<div class='row r'>
	<div class='col-sm-3'>
	Status Kirim :
	<?php 
		if($hasil['pengiriman']=="kiriman sebagian"){
		   echo "
		   <select name='pengiriman'>
			<option value='kirim sebagian'>Kiriman Sebagian</option>
			<option value='kirim selesai'>Kiriman Selesai</option>
		   </select>
		   ";
		}else{
			 echo "
		   <select name='pengiriman'>
			<option value='kirim selesai'>Kiriman Selesai</option>
			<option value='kirim sebagian'>Kiriman Sebagian</option>
		   </select>
		   ";
		}
	?>
	</div>
	<div class='col-sm-3'>
		Sales : <input type='text' name='sales' value='<?php echo $hasil["sales"]?>' required>
	</div>
	<div class='col-sm-3'>
		Status Feedback :
		<?php
			if($hasil['sfeed']=='-'){
				echo "
				<select name='sfeed'>
					<option value='-'>-</option>
					<option value='+'>+</option>
					<option value='ttd'>Tidak Di Angkat</option>
				</select>
				";
			}else if($hasil['sfeed']=='+'){
				echo "
				<select name='sfeed'>
					<option value='+'>+</option>
					<option value='-'>-</option>
					<option value='ttd'>Tidak Di Angkat</option>
				</select>
				";
			}else{
				echo "
				<select name='sfeed'>
					<option value='ttd'>Tidak Di Angkat</option>
					<option value='-'>-</option>
					<option value='+'>+</option>
				</select>
				";
			}
		?>
	</div>
	<div class='col-sm-3'>
		 <b>Tgl Beli : </b><input type='text' id="datetimepicker1" name='tglorder' autocomplete="off" value='<?php echo $hasil['tglorder']?>' required>
	</div>
</div>
<br>
<div class='row r'>
	<div class='col-sm-3'>
		 <b>Tgl Kirim : </b><input type='text' id="datetimepicker2" name='tglkirim' autocomplete="off" value='<?php echo $hasil['tglkirim']?>' required>
	</div>
	<div class='col-sm-3'>
		 <b>Tgl konfrim : </b><input type='text' id="datetimepicker3" name='tglkonfrim' autocomplete="off" value='<?php echo $hasil['tglkonfrim']?>' required>
	</div>
	<div class='col-sm-3'>
		Brand : <input type='text' name='brand' value='<?php echo $hasil["brand"]?>'>
	</div>
	<div class='col-sm-3'>
		Type : <input type='text' name='type' value='<?php echo $hasil["type"]?>'>
	</div>
</div>
<br>
<div class='row r'>
	<div class='col-sm-3'>
		Jenis : <input type='text' name='jenis' value='<?php echo $hasil["jenis"]?>'>
	</div>
</div>
<br>
<p></p>
<div class='col-sm-12'>
					<div class='col-sm-6'><label style='font-size:18px;'>Pesan</label></div>
					<div class='col-sm-6'><label style='font-size:18px;'>Memo Dari Sales : <?php echo $hasil['sales'] ?></label></div>
				</div>
				<div class='col-sm-12'>
					<div class='col-sm-6'><b><textarea rows='6' cols='30' name='feedback' class="form-control" style='overflow:scroll;'> <?php echo $hasil['feedback'] ?></textarea></b></div>
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
							<option value="proses">ON Process</option>
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
							<input type='hidden' name='id' value='<?php echo $_GET['_id'] ?>'>
							<input type="hidden" name="tanggapanlama" value="<?php echo $hasil['respon'];?>">
							<input type="hidden" name="user" value="<?php echo $_GET['user'];?>">
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
