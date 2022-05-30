<html>
<head>
<title>Voucher Masuk</title>
<link rel='stylesheet' href='../css/bootstrap.min.css'>
<script src='../asset/jquery.min.js'></script>
<script src='../asset/bootstrap.min.js'></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css"> 
   <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
   <link rel="stylesheet" href="../css/tablejquery.css">
<script src="../asset/tablejquery.js"></script>
<script>
	$(function () {
        $('#datetimepicker1').datepicker({
			dateFormat: 'd/mm/y'
            });
        });
</script>	
<?php
include ("menu.php");
?>

</head>
<body>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Input Voucher masuk
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Input Voucher Kembali</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"></span>
        </button>
      </div>
<form action="notifvoucher.php" method="POST">
      <div class="modal-body">
         <div class="form-group">
				<div class="col-sm-12">
					<h4>Maksimal 500 voucher</h4>
				</div>
				<div class="col-sm-3">
				<label for="recipient-name" class="col-form-label">Voucher Dari</label>
				<input type="number" name="dari" id="dari" value="201800000" autocomplete="off">
				</div>
				<div class="col-sm-3">
				<label for="recipient-name" class="col-form-label">Sampai</label>
				<input type="number" name="sampai" id="sampai" value="201800500" autocomplete="off">
				</div>
				<div class="col-sm-3">
				<label for="recipient-name" class="col-form-label">Tanggal Terima</label>
				<input type="text" id="datetimepicker1" name="tanggal" autocomplete="off" required>
				</div>
				<div class="col-sm-3">
				<label for="recipient-name" class="col-form-label">User</label>
				<input type="text" name="user" value="<?php echo $_SESSION["username"]?>" autocomplete="off" readonly>
				</div>
		  </div>
		  <div class="modal-footer" >
					<button class="btn btn-primary">Simpan</button>
					   <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
      </div>  
</form>	  
    </div>
  </div>
</div>

<h3>Download Laporan</h3><br>
<div class="col-sm-12">
	<div class="col-sm-3">
		<span><b>Voucher Ke Cabang</b></span >
	</div>
	<form action="sql.php" method="POST">
	<div class="col-sm-3">
		<select name="bulan">
			<option value="01">Januari</option>
			<option value="02">Febuari</option>
			<option value="03">Maret</option>
			<option value="04">April</option>
			<option value="05">Mei</option>
			<option value="06">Juni</option>
			<option value="07">Juli</option>
			<option value="08">Agustus</option>
			<option value="09">September</option>
			<option value="10">Oktober</option>
			<option value="11">November</option>
			<option value="12">Desember</option>
		</select>
	</div>
	<div class="col-sm-3">
		<select name="tahun">
			<option value="18">2018</option>
			<option value="19">2019</option>
		</select>
	</div>
	<div class="col-sm-3">
		<button class="btn btn-success">Download</button>
		<input type="hidden" name="perihal" value="cabang">
	</form>
	</div>
</div>
<div style="clear:both"></div>
<br>
<div class="col-sm-12">
	<div class="col-sm-3">
		<span><b>Voucher Ke Konsumen</b></span >
	</div>
	<form action="sql.php" method="POST">
	<div class="col-sm-3">
		<select name="bulan">
			<option value="01">Januari</option>
			<option value="02">Febuari</option>
			<option value="03">Maret</option>
			<option value="04">April</option>
			<option value="05">Mei</option>
			<option value="06">Juni</option>
			<option value="07">Juli</option>
			<option value="08">Agustus</option>
			<option value="09">September</option>
			<option value="10">Oktober</option>
			<option value="11">November</option>
			<option value="12">Desember</option>
		</select>
	</div>
	<div class="col-sm-3">
		<select name="tahun">
			<option value="18">2018</option>
			<option value="19">2019</option>
		</select>
	</div>
	<div class="col-sm-3">
		<button class="btn btn-success">Download</button>
		<input type="hidden" name="perihal" value="konsumen">
	</form>
	</div>
</div>
<div style="clear:both"></div>
<br>
<div class="col-sm-12">
	<div class="col-sm-3">
		<span><b>Voucher Kembali</b></span >
	</div>
	<form action="sql.php" method="POST">
	<div class="col-sm-3">
		<select name="bulan">
			<option value="01">Januari</option>
			<option value="02">Febuari</option>
			<option value="03">Maret</option>
			<option value="04">April</option>
			<option value="05">Mei</option>
			<option value="06">Juni</option>
			<option value="07">Juli</option>
			<option value="08">Agustus</option>
			<option value="09">September</option>
			<option value="10">Oktober</option>
			<option value="11">November</option>
			<option value="12">Desember</option>
		</select>
	</div>
	<div class="col-sm-3">
		<select name="tahun">
			<option value="18">2018</option>
			<option value="19">2019</option>
		</select>
	</div>
	<div class="col-sm-3">
		<button class="btn btn-success">Download</button>
		<input type="hidden" name="perihal" value="kembali">
	</form>
	</div>
</div>
<br>
                                  <div class="panel panel-default">
                        <div class="panel-body">
                                    <table id="lookup" class="table table-bordered">  
	                                   <thead bgcolor="#eeeeee" align="center">
                                        <tr>
	  
                                        <th>Tanggal</th>
	                                    <th>Nota</th>
	                                    <th>Lokasi</th>
	                                    <th>Seri</th>
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
        <script>
        $(document).ready(function() {
				var dataTable = $('#lookup').DataTable( {
					"responsive": true,
					"processing": true,
					"serverSide": true,
					"ajax":{
						url :"qvm.php", // json datasource
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
