<html>
<?php
include 'menu.php';
if(empty($_SESSION['level'])){
	header("location:../logout.php");
}elseif($_SESSION['level']=="admin" && $_SESSION['status']=='aktif' && $array['vck_v']=='block'){

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
    <title>Voucher Ketupat</title>
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
			dateFormat: 'dd/mm/yy'
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

    $(function() {
        $('#jenispaket').change(function(){
            $('.seri').hide();
            $('#' + $(this).val()).show();
        });
    });
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
	</div>
<div id="ModalAdd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
    <div class="modal-content">
	 <form action="prosesangpao.php" method="post">
      <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel"><center>FORM VOUCHER ANGPAO HOKI</center></h4>
        </div>
	<div class="modal-body">
		<div class="row">
				<div class='col-sm-6'>
					<b><h4>Username</h4></b>
				<input type="text" name='user' class='form-control' value="<?php echo $_SESSION['username']?>" readonly>	
				<input type='hidden' name='lokasi' value="<?php echo $_SESSION['lokasi']?>">
				</div>
				<div class='col-sm-6'>
					<b><h4>Nama Konsumen</h4></b>
				<input type="text" name='nama' class='form-control' autocomplete='off' required>	
				</div>
		</div>
		<div class='row'>
				<div class='col-sm-6'>
				<b><h4>Tanggal</h4></b>
				<input type='text' name='tanggal' id="datetimepicker1" class='form-control' autocomplete='off'>
				</div>
				<div class='col-sm-6'>
				<b><h4>Nota</h4></b>
				<input type='text' name='nota' class='form-control' autocomplete="off" required>
				</div>
		</div>
		<div class='row'>
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
						$select="select *from stangpao where status='aktif' && jenis='A' order by seri ASC";
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
						$select="select *from stangpao where status='aktif' && jenis='B' order by seri ASC";
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
						$select="select *from stangpao where status='aktif' && jenis='C' order by seri ASC";
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
						$select="select *from stangpao where status='aktif' && jenis='D' order by seri ASC";
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
						$select="select *from stangpao where status='aktif' && jenis='E' order by seri ASC";
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
						$select="select *from stangpao where status='aktif' && jenis='F' order by seri ASC";
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
						$select="select *from stangpao where status='aktif' && jenis='G' order by seri ASC";
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
								<th>Tanggal</th>
								<th>Nama Konsumen</th>
								<th>Nota</th>
								<th>Jenis | Seri</th>
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
						url :"qangpao", // json datasource
						type: "post",  // method  , by default get
						error: function(){  // error handling
							$(".lookup-error").html("");
							$("#lookup").append('<tbody class="employee-grid-error"><tr><th colspan="3">Sementara Data Tidak Di Tampilkan</th></tr></tbody>');
							$("#lookup_processing").css("display","none");
							
						}
					}
				} );
			} );
        </script>
</html>
 
 








