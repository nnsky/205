<html>
<?php
include 'menu.php';
if(empty($_SESSION['level'])){
	header("location:../logout.php");
}elseif($_SESSION['level']=="user" && $_SESSION['status']=='aktif' && $array['vck_v']=='block'){

}else{
		header("location:../logout.php");	
	}
$lokasi=$_SESSION['lokasi'];
date_default_timezone_set('asia/jakarta');
$date=date("Ymd");
$today=date("Ymd");	
?>
<head>
	<meta CHarset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>VoucherCK</title>
	<link rel='stylesheet' href='../css/bootstrap.min.css'>
	<script src='../asset/jquery.min.js'></script>
	<script src='../asset/bootstrap.min.js'></script>
	<link rel="stylesheet" href="../css/tablejquery.css">
<script src="../asset/tablejquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">
<script>
$(document).ready(function() {
$('#seri').multiselect({
nonSelectedText: 'Pilih Voucher'
});
});

function formatangka(objek) {
   a = objek.value;
   b = a.replace(/[^\d]/g,"");
   c = "";
   panjang = b.length;
   j = 0;
   for (i = panjang; i > 0; i--) {
     j = j + 1;
     if (((j % 3) == 1) && (j != 1)) {
       c = b.substr(i-1,1) + "." + c;
     } else {
       c = b.substr(i-1,1) + c;
     }
   }
   objek.value = c;
}
</script>
<style>
.edit{
	display:<?php echo $array["vck_e"]?>;
	width:50px;
}
#tes{
    width: 170px;
    height: 150px;
    overflow: scroll;	
}
</style>
</head>
<body>
<div class="container col-sm-12">		
	<center><div class='col-sm-3'><button   style='display:<?php echo $array["vck_i"]; ?>;width:60px;' class="btn btn-primary " data-toggle="modal" data-target="#ModalAdd">Buat</button></div>
	<form action="cekvoucher" method="POST">
	<div class="col-sm-4"><input class="form-control" type="number" name='serivoucher' placeholder="Masukan Seri Voucher"></div>
	<div class="col-sm-1"><button class="btn btn-info">Cari</button></div></form>
	</center>
	<?php
	if(empty($_GET['info'])){
			
	}else{
		if($_GET['info']==1){
			echo '<h4 style="color:green">* Voucher Dapat Dipakai</h4>';
		}else if($_GET['info']==2){
		echo '<h4 style="color:Red">* Voucher Tidak Dapat Digunakan</h4>';	
	
		}
	}
	?>
	</div>
<div id="ModalAdd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
    <div class="modal-content">
	 <form action="prosesvoucher" method="POST">
      <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel"><center>FORM VOUCHER Ke Konsumen</center></h4>
        </div>
<div class="modal-body">
		 <div class="row">
		 <div class="col-sm-3">
		 User
		 </div>
		 <div class="col-sm-3">
		 <input type="text" name="user" value="<?php echo $_SESSION["username"] ?>" readonly>
		 </div>
		 <div class="col-sm-6">
		 
		 </div>
			<div class="col-sm-3">
			Nama Konsumen
			</div>
			<div class="col-sm-3">
			<input type="text" name="nama" placeholder="Nama Konsumen" autocomplete="off" required></div>
			<div class="col-sm-3">
			No Nota
			</div>
			<div class="col-sm-3">
			<input type="text" name="nota" placeholder="No Nota" autocomplete="off" required></div><br></br>
			<div class="col-sm-3">
			Total Belanja
			</div>
			<div class="col-sm-3">
			<input type="text" name="total" onkeyup="formatangka(this)" placeholder="Total Belanja" required></div>
			<div class="col-sm-3">
			Potongan Harga
			</div>
			<div class="col-sm-3">
			<input type="text" name="potongan" onkeyup="formatangka(this)" placeholder="Potongan Harga" required></div><br></br>
			<div class="col-sm-3">
			Kode Voucher
			</div>
			<div class="col-sm-3">
			<select name="voucher">
                        <option value="Voucher Cashback <?php echo date('M y')?>">Voucher Cashback <?php echo date("M y") ?></option>		
	                </select></div>
			<div class="col-sm-3">
			No Seri
			</div>
			<div class="col-sm-3">
			<div class="form-group" id="tes">
			<select id="seri" name="seri[]" multiple required>
			<?php
						$sql="select *from voucher where status ='Belum Digunakan' && statvoucher='Aktif' && lokasi='$lokasi' && expv > $today ORDER BY seri ASC";
						$query = mysqli_query($conn, $sql);
						while($rowdg=mysqli_fetch_array($query)){ 
						?><option value='<?php echo $rowdg["seri"]?>'><?php echo $rowdg["seri"]?></option>;
						<?php
						}
						?>
			</select>
			</div>
			</div><br></br>
			
			<input type="hidden" name="perihal" value="voucherck">
			</div>
			</div>
				<div class="modal-footer">
	                <button class="btn btn-primary" type="submit">Confirm
	                </button> <button type="reset" class="btn btn-success"  data-dismiss="modal" aria-hidden="true">Cancel</button>
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
								<th>Voucher</th>
								<th>No Seri</th>
								<th>Nama</th>
								<th>No.Nota</th>
								<th>Total Belanja</th>
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
						url :"qvck.php", // json datasource
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
 
 







