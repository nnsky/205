<html> <head>
	<meta CHarset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 <title>Voucher Chandrakarya</title> <link rel='stylesheet' href='../css/bootstrap.min.css'> <script src='../asset/jquery.min.js'></script> <script src='../asset/bootstrap.min.js'></script> 
<link rel="stylesheet" href="../css/tablejquery.css"> <script src="../asset/tablejquery.js"></script> <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
   <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script> <?php include 'menu.php'; if(empty($_SESSION['level'])){
	header("location:../logout.php");
}elseif($_SESSION['level']=="admin" && $_SESSION['status']=='aktif' && $array['vc_v']=='block'){
	
	}elseif($_SESSION['level']=='user'){
		header("location:../logout.php");
	}else{
		header("location:../logout.php");
	}
$date=date('M y'); $today=date("Ymd");
					$cek="select seri from voucher order by id DESC limit 1";
					$que=mysqli_query($conn,$cek);
					$arr=mysqli_fetch_array($que);
					?> <style> * {
  .border-radius(0) !important;
}
#field {
    margin-bottom:20px;
}
.brand{
	display:<?php echo $array['vc_e'] ?>;
	width:50px;
}
</style> <script>
      $(function () {
        $('#datetimepicker1').datepicker({
			dateFormat: 'dd/mm/yy'
            });
        });
      $(function () {
        $('#datetimepicker').datepicker({
			dateFormat: 'dd/mm/yy'
            });
        });
		
</script> </head> <body> <span id="demo"></span> <div class="container" style='margin-top:-30px;'>
	<br/> <div class="col-sm-2"><button style="display:<?php echo $array['vc_i']?>" class="btn btn-primary " data-toggle="modal" data-target="#ModalAdd">Buat</button></div> <div 
class="col-sm-2"><a class="btn btn-success" href="vm">Laporan</a></div> <div id="ModalAdd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"> 
<div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Form Voucher Ke Cabang</h4>
        </div>
        <div class="modal-body">
          <div class="control-group" id="fields">
                <form action='buat.php' method='POST'>
				<input type='hidden' name='perihal' value='voucher'>
				 <div class="form-group">
					<div class="col-sm-6">
				    <label for="recipient-name" class="col-form-label">Kode Voucher</label>
					<input type="text" class="form-control" placeholder="Kode Voucher" value="Voucher Cashback <?php echo $date?>" name="nama" autocomplete="off" 
readonly required>
					</div>
					<div class="col-sm-6">
					<label for="recipient-name" class="col-form-label">Lokasi</label>
					<select name='lokasi' class="form-control">
						<option value="GCK">Grand CK</option>
						<option value="CM">CM</option>
						<option value="CH">CH</option>
						<option value="CPG">Premium Gallery</option>
						<option value="CPIK">PIK</option>
						<option value="KG">Kelapa Gading</option>
						<option value="CBEK">Bekasi</option>
						<option value="CBDG">Bandung</option>
						<option value="CKS">Sunter</option>
						<option value="OfficeIdea">Office Idea</option>
						<option value="CPI">Pdk Indah</option>
						<option value="CMKS">Makassar</option>
					</select>
					</div>
				  </div>
				  <div class="form-group">
					<div class="col-sm-6">
					 <label for="recipient-name" class="col-form-label">Kadaluarsa voucher</label>
					<input id="datetimepicker1" type="text" class="form-control" name="kadaluarsa" autocomplete="off" required>
					</div>
					<div class="col-sm-6">
					<label for="recipient-name" class="col-form-label">Kode Seri Dari <?php echo $arr["seri"];?> Sampai <span id="voucher"></span> </label>
					<input type="number" class="form-control" id="banyak" name="seri" onchange="total()" value='0' required>
				    </div>
				  </div>
				  <div class="form-group">
				  <div class="col-sm-6">
					 <label for="recipient-name" class="col-form-label">User </label>
					<input type="text" class="form-control" name="user" value="<?php echo $_SESSION['username'] ?>" readonly required>
					</div>
					<div class="col-sm-6">
					 <label for="recipient-name" class="col-form-label">Cek Kembali </label>
					<select required class="form-control">
						<option value="">-----</option>
						<option value="ya">sesuai</option>
					</select>
					</div>
					
				  </div>
				  <br>
				<button class='btn btn-primary'>Simpan</button>
				<input type="hidden" name="perihal" value="voucher">
                </form>
				</div>
			</div>
			<div style='margin-top:20px;'></div>
			<form action='inpvoucher.php' method='POST'>
				<h3 style='color:red;text-align:center;'>HANYA BISA INPUT 1 KODE VOUCHER</h3>
				<p style='color:red;text-align:center;'>Hanya dipakai untuk melongkap / meloncat.<br>
				Cth: kode saat ini 20190000 dan ingin loncat ke 20200000
				</p>
				<div class="form-group">
				<div class="col-sm-6">
				  <label for="recipient-name" class="col-form-label">Kode Voucher</label>
				<input type='text' class="form-control" name='voucher' placeholder='Voucher Cashback <?php echo $date?>' >
				</div>
				<div class="col-sm-6">
					 <label for="recipient-name" class="col-form-label">Seri </label>
					<input type="number" class="form-control" name="seri" autocomplete="off" required>
				</div>
				</div>
				
			<div class="form-group">
				<div class="col-sm-6">
					 <label for="recipient-name" class="col-form-label">Kadaluarsa voucher </label>
					<input id="datetimepicker" type="text" class="form-control" name="kadaluarsa" autocomplete="off" required>
				</div>
				<div class='col-sm-6'>
					<label for="recipient-name" class="col-form-label">Status Voucher </label>
					<select name='status' class='form-control'>
						<option value='Tidak Aktif'>Tidak Aktif</option>
						<option value='Aktif'>Aktif</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-6">
					<label for="recipient-name" class="col-form-label">Lokasi</label>
					<select name='lokasi' class="form-control">
						<option value="CM">CM</option>
						<option value="CH">CH</option>
						<option value="CPG">Premium Gallery</option>
						<option value="CPIK">PIK</option>
						<option value="KG">Kelapa Gading</option>
						<option value="CBEK">Bekasi</option>
						<option value="CBDG">Bandung</option>
						<option value="CKS">Sunter</option>
						<option value="OfficeIdea">Office Idea</option>
						<option value="CPI">Pdk Indah</option>
						<option value="CMKS">Makassar</option>
					</select>
				</div>
				<div class='col-sm-6'>
					<label for="recipient-name" class="col-form-label">User </label>
				<input type="text" class="form-control" name="user" value="<?php echo $_SESSION['username'] ?>" readonly>
				</div>
			</div>
			<button class='btn btn-primary'>Simpan</button>
			</form>
		</div>
	</div> </div> </div> <br> <center> 
<?php 
$selectcm="select *from voucher where lokasi='CM' && status ='Belum Digunakan' && statvoucher='Aktif' && expv > $today"; 
$querycm=mysqli_query($conn,$selectcm);
$countcm= mysqli_num_rows($querycm);

$selectch="select *from voucher where lokasi='GCK' && status ='Belum Digunakan' && statvoucher='Aktif' && expv > $today"; 
$querych=mysqli_query($conn,$selectch);
$countch= mysqli_num_rows($querych); 

$selectpg="select *from voucher where lokasi='CPG' && status ='Belum Digunakan' && statvoucher='Aktif'&& expv > $today"; 
$querypg=mysqli_query($conn,$selectpg); 
$countpg= mysqli_num_rows($querypg); 

$selectkgn="select *from voucher where lokasi='KG' && status ='Belum Digunakan' && statvoucher='Aktif'&& expv > $today"; 
$querykgn=mysqli_query($conn,$selectkgn); 
$countkgn= mysqli_num_rows($querykgn); 

$selectpik="select *from voucher where lokasi='CPIK' && status ='Belum Digunakan' && statvoucher='Aktif'&& expv > $today"; 
$querypik=mysqli_query($conn,$selectpik);
$countpik= mysqli_num_rows($querypik); 

$selectbks="select *from voucher where lokasi='CBEK' && status ='Belum Digunakan' && statvoucher='Aktif' && expv > $today";
$querybks=mysqli_query($conn,$selectbks);
$countbks= mysqli_num_rows($querybks);

$selectsun="select *from voucher where lokasi='CKS' && status ='Belum Digunakan' && statvoucher='Aktif' && expv > $today";
$querysun=mysqli_query($conn,$selectsun); 
$countsun= mysqli_num_rows($querysun); 

$selectbdg="select *from voucher where lokasi='CBDG' && status ='Belum Digunakan' && statvoucher='Aktif' && expv > $today";
$querybdg=mysqli_query($conn,$selectbdg); 
$countbdg= mysqli_num_rows($querybdg); 

$selectidea="select *from voucher where lokasi='OfficeIdea' && status='Belum Digunakan' && statvoucher='Aktif' && expv>$today";
$queryidea=mysqli_query($conn,$selectidea);
$countidea=mysqli_num_rows($queryidea);

$selectcpi="select *from voucher where lokasi='CPI' && status='Belum Digunakan' && statvoucher='Aktif' && expv>$today";
$querycpi=mysqli_query($conn,$selectcpi);
$countcpi=mysqli_num_rows($querycpi);

$selectcmks="select *from voucher where lokasi='CMKS' && status='Belum Digunakan' && statvoucher='Aktif' && expv>$today";
$querycmks=mysqli_query($conn,$selectcmks);
$countcmks=mysqli_num_rows($querycmks);


echo ' 
<div class="col-sm-1">Stock Voucher</div> 
<div class="col-sm-1">CM '.$countcm.'</div> 
<div class="col-sm-1">GCK '.$countch.'</div> 
<div class="col-sm-1">PG '.$countpg.'</div> 
<div class="col-sm-1">Gading '.$countkgn.'</div>
<div class="col-sm-1">Pik '.$countpik.'</div>
<div class="col-sm-1">Bekasi '.$countbks.'</div>
<div class="col-sm-1">Bandung '.$countbdg.'</div> 
<div class="col-sm-1">Sunter '.$countsun.'</div> 
<div class="col-sm-1">Idea '.$countidea.' </div> 
<div class="col-sm-1">PIndah '.$countcpi.' </div> 
<div class="col-sm-1">Mksr '.$countcmks.' </div> ';
?>
</center>
 <br>
                                  <div class="panel panel-default">
                        <div class="panel-body">
                                    <table id="lookup" class="table table-bordered">
	                                   <thead bgcolor="#eeeeee" align="center">
                                        <tr>
	  
                                        <th>Kode Voucher</th>
	                                    <th>No Seri</th>
	                                    <th>Lokasi</th>
	                                    <th>Exp</th>
	                                    <th>status</th>
	                                    <th class="text-center"> Action </th>
	  
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
        <script type="text/javascript">
		function total() {
		var valgoritma = <?php echo $arr["seri"]?> + parseInt(document.getElementById('banyak').value);
		document.getElementById("voucher").innerHTML = valgoritma;
		}
		
</script>
		<script>
        $(document).ready(function() {
				var dataTable = $('#lookup').DataTable( {
					"processing": true,
					"serverSide": true,
					"ajax":{
						url :"qvoucher.php", // json datasource
						type: "post", // method , by default get
						error: function(){ // error handling
							$(".lookup-error").html("");
							$("#lookup").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
							$("#lookup_processing").css("display","none");
							
						}
					}
				} );
			} );
        </script> </html>
