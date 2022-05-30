<html>
<head>
<?php
include 'menu.php';
$lokasi=$_SESSION['lokasi'];
date_default_timezone_set('asia/jakarta');
$date=date("Ymd");
$today=date("Ymd");	
?>
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

function showDiv(select){
   if(select.value=="p1"){
    document.getElementById('paket1').style.display = "block";
    document.getElementById('kupon1').style.display = "block";
	 document.getElementById('paket2').style.display = "none";
	 document.getElementById('kupon2').style.display = "none";
	 document.getElementById('paket3').style.display = "none";
	 document.getElementById('kupon3').style.display = "none";
	 document.getElementById('paket4').style.display = "none";
	 document.getElementById('kupon4').style.display = "none";
	 document.getElementById('paket5').style.display = "none";
	 document.getElementById('kupon5').style.display = "none";
	 document.getElementById('paket6').style.display = "none";
	 document.getElementById('kupon6').style.display = "none";

   }else if(select.value=="p2"){
    document.getElementById('paket1').style.display = "none";
    document.getElementById('kupon1').style.display = "none";
	 document.getElementById('paket2').style.display = "block";
	 document.getElementById('kupon2').style.display = "block";
	 document.getElementById('paket3').style.display = "none";
	 document.getElementById('kupon3').style.display = "none";
	 document.getElementById('paket4').style.display = "none";
	 document.getElementById('kupon4').style.display = "none";
	 document.getElementById('paket5').style.display = "none";
	 document.getElementById('kupon5').style.display = "none";
	 document.getElementById('paket6').style.display = "none";
	 document.getElementById('kupon6').style.display = "none";
	
   }else if(select.value=="p3"){
    document.getElementById('paket1').style.display = "none";
    document.getElementById('kupon1').style.display = "none";
	 document.getElementById('paket2').style.display = "none";
	 document.getElementById('kupon2').style.display = "none";
	 document.getElementById('paket3').style.display = "block";
	 document.getElementById('kupon3').style.display = "block";
	 document.getElementById('paket4').style.display = "none";
	 document.getElementById('kupon4').style.display = "none";
	 document.getElementById('paket5').style.display = "none";
	 document.getElementById('kupon5').style.display = "none";
	 document.getElementById('paket6').style.display = "none";
	 document.getElementById('kupon6').style.display = "none";
   }else if(select.value=="p4"){
    document.getElementById('paket1').style.display = "none";
    document.getElementById('kupon1').style.display = "none";
	 document.getElementById('paket2').style.display = "none";
	 document.getElementById('kupon2').style.display = "none";
	 document.getElementById('paket3').style.display = "none";
	 document.getElementById('kupon3').style.display = "none";
	 document.getElementById('paket4').style.display = "block";
	 document.getElementById('kupon4').style.display = "block";
	 document.getElementById('paket5').style.display = "none";
	 document.getElementById('kupon5').style.display = "none";
	 document.getElementById('paket6').style.display = "none";
	 document.getElementById('kupon6').style.display = "none";
   }else if(select.value=="p5"){
    document.getElementById('paket1').style.display = "none";
    document.getElementById('kupon1').style.display = "none";
	 document.getElementById('paket2').style.display = "none";
	 document.getElementById('kupon2').style.display = "none";
	 document.getElementById('paket3').style.display = "none";
	 document.getElementById('kupon3').style.display = "none";
	 document.getElementById('paket4').style.display = "none";
	 document.getElementById('kupon4').style.display = "none";
	 document.getElementById('paket5').style.display = "block";
	 document.getElementById('kupon5').style.display = "block";
	 document.getElementById('paket6').style.display = "none";
	 document.getElementById('kupon6').style.display = "none";
   }else if(select.value=="p6"){
    document.getElementById('paket1').style.display = "none";
    document.getElementById('kupon1').style.display = "none";
	 document.getElementById('paket2').style.display = "none";
	 document.getElementById('kupon2').style.display = "none";
	 document.getElementById('paket3').style.display = "none";
	 document.getElementById('kupon3').style.display = "none";
	 document.getElementById('paket4').style.display = "none";
	 document.getElementById('kupon4').style.display = "none";
	 document.getElementById('paket5').style.display = "none";
	 document.getElementById('kupon5').style.display = "none";
	 document.getElementById('paket6').style.display = "block";
	 document.getElementById('kupon6').style.display = "block";
   }else{
	   document.getElementById('paket1').style.display = "none";
    document.getElementById('kupon1').style.display = "none";
	 document.getElementById('paket2').style.display = "none";
	 document.getElementById('kupon2').style.display = "none";
	 document.getElementById('paket3').style.display = "none";
	 document.getElementById('kupon3').style.display = "none";
	 document.getElementById('paket4').style.display = "none";
	 document.getElementById('kupon4').style.display = "none";
	 document.getElementById('paket5').style.display = "none";
	 document.getElementById('kupon5').style.display = "none";
	 document.getElementById('paket6').style.display = "none";
	 document.getElementById('kupon6').style.display = "none";
	   
   }
}
</script>	
</head>
<body>

<button class="btn btn-primary " data-toggle="modal" data-target="#myModal">Buat</button>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Form Voucher Angpao</h4>
        </div>
        <div class="modal-body controls test">
         <form action="buat1" method="POST">
		 <center><h4>Data Konsumen</h4></center>
          <div class="form-group">
			<div class="col-sm-3">
		   <label for="recipient-name" class="col-form-label">Gelar</label>
            <select class="form-control" name="gelar">
				<option name="Bpk">Bpk</option>
				<option name="Ibu">Ibu</option>
				<option name="Sdr">Sdr</option>
				<option name="Sdri">Sdri</option>
				</select>
			</div>
			<div class="col-sm-6">
            <label for="recipient-name" class="col-form-label">Nama</label>
            <input type="text" class="form-control" name="nama" required autocomplete='off'>
			</div>
			<div class="col-sm-3">
            <label for="recipient-name" class="col-form-label">NIK KTP</label>
            <input type="number" class="form-control" name="nik" required autocomplete='off'>
			</div>
          </div>
		  
		  <div class="form-group">
			<div class="col-sm-4">
			 <label for="recipient-name" class="col-form-label">Nomor Hp</label>
            <input type="number" class="form-control" name="hp" autocomplete="off">
			</div>
			<div class="col-sm-4">
            <label for="recipient-name" class="col-form-label">email</label>
            <input type="email" class="form-control" name="email" autocomplete='off'>
          </div>
		  	<div class="col-sm-4">
            <label for="recipient-name" class="col-form-label">Alamat</label>
            <textarea class="form-control" name="alamat" autocomplete='off'></textarea>
          </div>
		  </div>
		  
		  		  <div class="form-group">
			<div class="col-sm-6">
			 <label for="recipient-name" class="col-form-label">Paket Promo</label>
				<select class="form-control"  name='paket' onchange="showDiv(this)" required>
					<option value="">--- Pilih Paket Promo ---</option>
					<option value='p1'>P1</option>
					<option value='p2'>P2</option>
					<option value='p3'>P3</option>
					<option value='p4'>P4</option>
					<option value='p5'>P5</option>
					<option value='p6'>P6</option>
				</select>
			</div>
			<div class="col-sm-6">
            <label for="recipient-name" class="col-form-label">Kode Paket</label>
            <select id="kupon1" class="form-control" style="display:none;" name='kp1'>
						<?php
							$lokasi=$_SESSION['lokasi'];
							$select="select kdpkt from dbkupon where paket='P1' && status='aktif'";
							$qselect=mysqli_query($conn,$select);
							while($qarray=mysqli_fetch_array($qselect)){
						echo "<option value='".$qarray['kdpkt']."'>".$qarray['kdpkt']."</option>";
								
							}
						?>
			</select>
			<select id="kupon2" class="form-control" style="display:none;" name='kp2'>
					<?php
							$lokasi=$_SESSION['lokasi'];
							$select="select kdpkt from dbkupon where paket='P2'  && status='aktif'";
							$qselect=mysqli_query($conn,$select);
							while($qarray=mysqli_fetch_array($qselect)){
						echo "<option value='".$qarray['kdpkt']."'>".$qarray['kdpkt']."</option>";
								
							}
						?>
			</select>
			<select id="kupon3" class="form-control" style="display:none;" name='kp3'>
					<?php
							$lokasi=$_SESSION['lokasi'];
							$select="select kdpkt from dbkupon where paket='P3'  && status='aktif'";
							$qselect=mysqli_query($conn,$select);
							while($qarray=mysqli_fetch_array($qselect)){
						echo "<option value='".$qarray['kdpkt']."'>".$qarray['kdpkt']."</option>";
								
							}
						?>
			</select>
			<select id="kupon4" class="form-control" style="display:none;" name='kp4'>
					<?php
							$lokasi=$_SESSION['lokasi'];
							$select="select kdpkt from dbkupon where paket='P4'  && status='aktif'";
							$qselect=mysqli_query($conn,$select);
							while($qarray=mysqli_fetch_array($qselect)){
						echo "<option value='".$qarray['kdpkt']."'>".$qarray['kdpkt']."</option>";
								
							}
						?>
			</select>
						<select id="kupon5" class="form-control" style="display:none;" name='kp5'>
					<?php
							$lokasi=$_SESSION['lokasi'];
							$select="select kdpkt from dbkupon where paket='P5'  && status='aktif'";
							$qselect=mysqli_query($conn,$select);
							while($qarray=mysqli_fetch_array($qselect)){
						echo "<option value='".$qarray['kdpkt']."'>".$qarray['kdpkt']."</option>";
								
							}
						?>
			</select>
						<select id="kupon6" class="form-control" style="display:none;" name='kp6'>
					<?php
							$lokasi=$_SESSION['lokasi'];
							$select="select kdpkt from dbkupon where paket='P6'  && status='aktif'";
							$qselect=mysqli_query($conn,$select);
							while($qarray=mysqli_fetch_array($qselect)){
						echo "<option value='".$qarray['kdpkt']."'>".$qarray['kdpkt']."</option>";
								
							}
						?>
			</select>
          </div>
		  </div>
		  
		 	<div class="form-group">
				<div class="col-sm-6">
				<label for="recipient-name" class="col-form-label">Seri Voucher</label>
					<select id="paket1" class="form-control" style="display:none;" name='p1'>
						<option value=''>Konsumen Tidak Mengambil Voucher</option>
						<?php
							$lokasi=$_SESSION['lokasi'];
							$select="select seri from dbvoucher where paket='P1'  && status='aktif'";
							$qselect=mysqli_query($conn,$select);
							while($qarray=mysqli_fetch_array($qselect)){
						echo "<option value='".$qarray['seri']."'>".$qarray['seri']."</option>";
								
							}
						?>
					</select>
					<select id="paket2" class="form-control" style="display:none;" name='p2'>
						<option value=''>Konsumen Tidak Mengambil Voucher</option>
						<?php
							$lokasi=$_SESSION['lokasi'];
							$select="select seri from dbvoucher where paket='p2'   && status='aktif'";
							$qselect=mysqli_query($conn,$select);
							while($qarray=mysqli_fetch_array($qselect)){
						echo "<option value='".$qarray['seri']."'>".$qarray['seri']."</option>";
								
							}
						?>
				
					</select>
					<select id="paket3" class="form-control" style="display:none;" name='p3'>
						<option value=''>Konsumen Tidak Mengambil Voucher</option>
						<?php
							$lokasi=$_SESSION['lokasi'];
							$select="select seri from dbvoucher where paket='p3'   && status='aktif'";
							$qselect=mysqli_query($conn,$select);
							while($qarray=mysqli_fetch_array($qselect)){
						echo "<option value='".$qarray['seri']."'>".$qarray['seri']."</option>";
								
							}
						?>
				
					</select>
					<select id="paket4" class="form-control" style="display:none;" name='p4'>
						<option value=''>Konsumen Tidak Mengambil Voucher</option>
						<?php
							$lokasi=$_SESSION['lokasi'];
							$select="select seri from dbvoucher where paket='p4'   && status='aktif'";
							$qselect=mysqli_query($conn,$select);
							while($qarray=mysqli_fetch_array($qselect)){
						echo "<option value='".$qarray['seri']."'>".$qarray['seri']."</option>";
								
							}
						?>
				
					</select>
					<select id="paket5" class="form-control" style="display:none;" name='p5'>
						<option value=''>Konsumen Tidak Mengambil Voucher</option>
						<?php
							$lokasi=$_SESSION['lokasi'];
							$select="select seri from dbvoucher where paket='p5'   && status='aktif'";
							$qselect=mysqli_query($conn,$select);
							while($qarray=mysqli_fetch_array($qselect)){
						echo "<option value='".$qarray['seri']."'>".$qarray['seri']."</option>";
								
							}
						?>
				
					</select>
					<select id="paket6" class="form-control" style="display:none;" name='p6'>
						<option value=''>Konsumen Tidak Mengambil Voucher</option>
						<?php
							$lokasi=$_SESSION['lokasi'];
							$select="select seri from dbvoucher where paket='p6'   && status='aktif'";
							$qselect=mysqli_query($conn,$select);
							while($qarray=mysqli_fetch_array($qselect)){
						echo "<option value='".$qarray['seri']."'>".$qarray['seri']."</option>";
								
							}
						?>
				
					</select>
				</div>
				<div class="col-sm-6">
				<label for="recipient-name" class="col-form-label">User</label>
				<input type="text" class="form-control" name="user" autocomplete="off" value="<?php echo $_SESSION['username']?>" readonly required>
				</div>
			</div>
				 <center><h4>Nota</h4></center>
		  	<div class="form-group">
			<div class="col-sm-4">
			 <label for="recipient-name" class="col-form-label">Mattrass</label>
            <input type="text" class="form-control" name="matt" autocomplete="off">
			</div>
			<div class="col-sm-4">
            <label for="recipient-name" class="col-form-label">Sofa</label>
            <input type="text" class="form-control" name="sofa" autocomplete='off'>
          </div>
		  	<div class="col-sm-4">
            <label for="recipient-name" class="col-form-label">Quality</label>
            <input type="text" class="form-control" name="qual" autocomplete='off'>
          </div>
		  </div>
		  
		  <center><h4>Tanggal Pembelian</h4></center>
		  <div class="form-group">
			<div class="col-sm-4">
			 <label for="recipient-name" class="col-form-label">Mattrass</label>
            <input id='datetimepicker1' type="text" class="form-control" name="tglmatt" autocomplete="off">
			</div>
			<div class="col-sm-4">
            <label for="recipient-name" class="col-form-label">Sofa</label>
            <input id='datetimepicker2' type="text" class="form-control" name="tglsofa" autocomplete='off'>
          </div>
		  	<div class="col-sm-4">
            <label for="recipient-name" class="col-form-label">Quality</label>
            <input id='datetimepicker3' type="text" class="form-control" name="tglqual" autocomplete='off'>
          </div>
		  </div>
		  
		  
		</div>
        <div class="modal-footer">
			<input type="hidden" value="vangpao" name="perihal">
			<input type="hidden" value="<?php echo $_SESSION['lokasi']?>" name="lokasi">
          <button class="btn btn-primary">Simpan</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
		 </form>
      </div>
      
    </div>
  </div>



 <div class="panel panel-default">
                        <div class="panel-body">
                                    <table id="lookup" class="table table-bordered">  
	                                   <thead bgcolor="#eeeeee" align="center">
                                        <tr>
								<th>Kode Paket</th>
								<th>Seri</th>
								<th>Nama</th>
								<th>Cabang</th>
								<th>Tanggal</th>
								<th>Action</th>
                                       </tr>
                                      </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
</body>
        <script src="../asset/jquery.dataTables.js"></script>
        <script src="../asset/dataTables.bootstrap.js"></script>
        <script>
        $(document).ready(function() {
				var dataTable = $('#lookup').DataTable( {
					"processing": true,
					"serverSide": true,
					"ajax":{
						url :"qvangpao.php", // json datasource
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



