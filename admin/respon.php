<html>
<?php
include "menu.php";
if(empty($_SESSION['level'])){
	header("location:../logout.php");
}elseif($_SESSION['level']=="admin" && $_SESSION['status']=='aktif' && $array['re_v']=='block'){
			
	}
?>
<head>
<meta CHarset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="refresh" content="900"> 
 <title>Halaman Respon</title>
<link rel='stylesheet' href='../css/bootstrap.min.css'>
<script src='../asset/jquery.min.js'></script>
<script src='../asset/bootstrap.min.js'></script>
<link rel='stylesheet' href='../css/respon.css'>
<link rel="stylesheet" href="../css/tablejquery.css">
<script src="../asset/tablejquery.js"></script>
<style>
.edit{
	display:<?php echo $array['re_e'] ?>;
	width:70px;
	margin-top:50px;
	margin-left:100px;
}
.buat{
	display:<?php echo $array['re_i'] ?>;
	width:75px;
}	
</style>
</head>
<body>
<div class="container" style='margin-top:-30px;'>		
	<br/>
	<div class='col-sm-4'><a href="crespon" class="btn btn-primary buat">Buat</a></div>
	<div class='col-sm-4'><button type="button" class="btn btn-info" data-toggle="modal" data-target="#ModalAdd">Laporan</button></div>
	
</div>
<div id="ModalAdd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
    <div class="modal-content">
	 <form action="dwinstore" method="post">
      <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel"><center>Download Laporan Instore</center></h4>
        </div>
        <div class="modal-body">
		<div class='row'>
			<div class="col-sm-6">
			<b>Bulan</b>
			<select class='form-control' name="bulan">
				<option value='1'>January</option>
				<option value='2'>Februari</option>
				<option value='3'>Maret</option>
				<option value='4'>April</option>
				<option value='5'>Mei</option>
				<option value='6'>Juni</option>
				<option value='7'>Juli</option>
				<option value='8'>Agustus</option>
				<option value='9'>September</option>
				<option value='10'>Oktober</option>
				<option value='11'>November</option>
				<option value='12'>Desember</option>
			</select>
			</div>
			<div class="col-sm-6">
			</b>Tahun</b>
			<select class='form-control' name="tahun">
				<option value='19'>2019</option>
			</select>
			</div>
        </div>
	<div class='row'>
	 <div class='col-sm-6'>
	 <b>Lokasi</b>
	 		<select name="lokasi" class='form-control' >
		<option value="CM">Pramuka 180</option>
		<option value="CH">Pramuka 168</option>
		<option value="CPG">Premium Gallery</option>
		<option value="KG">Kelapa Gading </option>
		<option value="AL">Ruko Alam Sutra </option>
		<option value="CPIK">Pantai Indah Kapuk </option>
		<option value="CBEK">Bekasi </option>
		<option value="CBDG">Bandung </option>
		</select>
	 </div>
	 	 <div class='col-sm-6'>
	 
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
					<th>Report_Id</th>
					<th>Nama</th>
					<th>No.Nota</th>
					<th>Pesan</th>
					<th>kontak</th>
					<th>Sales</th>
					<th>Status</th> 
                                       </tr>
                                      </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
<div class='container'>
                     <br />  
                          <table class="table table-bordered" id="table_hasil">  
                               <tr>  
  
                               </tr>  
							   <tr>
</body>
        <script src="../asset/jquery.dataTables.js"></script>
        <script src="../asset/dataTables.bootstrap.js"></script>
        <script>
        $(document).ready(function() {
				var dataTable = $('#lookup').DataTable( {
					"processing": true,
					"serverSide": true,
					"ajax":{
						url :"qrespon.php", // json datasource
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
