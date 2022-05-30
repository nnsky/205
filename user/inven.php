<html>
<head>
	<meta CHarset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 <title>Inventory</title>
<link rel='stylesheet' href='../css/bootstrap.min.css'>
<script src='../asset/jquery.min.js'></script>
<script src='../asset/bootstrap.min.js'></script>
<link rel="stylesheet" href="../css/tablejquery.css">
<script src="../asset/tablejquery.js"></script>
<?php
include 'menu.php';
$user=$_SESSION['username'];
$lokasi=$_SESSION['lokasi'];
if(empty($_SESSION['level'])){
	header("location:../logout.php");
}elseif($_SESSION['level']=="user" && $_SESSION['status']=='aktif' && $array['inv_v']=='block'){
	
	}else{
		header("location:../logout.php");	
	}
	?>
<style>
* {
  .border-radius(0) !important;
}

#field {
    margin-bottom:20px;
}
.brand{
	display:<?php echo $array['inv_e'] ?>;
	width:50px;
}
.nama{
	display:none;
}
.tambahan{
	display:none;
}
</style>
<script>
    $(function() {
        $('#jenis').change(function(){
            $('.nama').hide();
            $('#' + $(this).val()).show();
			$('.tambahan').show();
			
        });
    });
</script>
</head>
<body>
<div class="container" style='margin-top:-30px;'>		
	<br/>
	<button style="display:<?php echo $array['inv_i']?>" class="btn btn-primary " data-toggle="modal" data-target="#ModalAdd">Buat</button>	
</div>

  <!-- Modal -->
  <div class="modal fade" id="ModalAdd" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Input Inventory</h4>
        </div>
		
      <form action="inven_proses" method="POST">
		<div class="modal-body">
		 <div class='row'>

		 <div class="col-sm-6 form-group">
				<label for="text">Jenis Barang</label>
				<select id="jenis" name="jenis" class="form-control" required>
					<option value=''>--- Pilih ---</option>
					<option value='Handphone'>Handphone</option>		
					<option value='Komputer'>Komputer</option>		
					<option value='Keyboard'>Keyboard</option>									
					<option value='Monitor'>Monitor</option>					
					<option value='Mouse'>Mouse</option>					
					<option value='Printer'>Printer</option>					
					<option value='Telepon'>Telepon</option>										
				</select>
			</div>

			<div class="col-sm-6 form-group">
				<label for="text">Nama /Type Barang :</label>

				<select class='nama form-control' id='Handphone' name='Handphone'>
				<option value=''>--- Pilih ---</option>
					<?php
						$select=mysqli_query($conn,"select type from inven_jenis where jenis='Handphone'");
						while($hp=mysqli_fetch_array($select)){
							echo "
							<option value='".$hp['type']."'>".$hp['type']."</option>
							";
						}

					?>
				</select>

				<select class='nama form-control' id='Komputer' name='Komputer'>
				<option value=''>--- Pilih ---</option>
				<?php
						$select=mysqli_query($conn,"select type from inven_jenis where jenis='Komputer'");
						while($hp=mysqli_fetch_array($select)){
							echo "
							<option value='".$hp['type']."'>".$hp['type']."</option>
							";
						}

					?>				
				</select>

				<select class='nama form-control' id='Keyboard' name='Keyboard'>
				<option value=''>--- Pilih ---</option>
				<?php
						$select=mysqli_query($conn,"select type from inven_jenis where jenis='Keyboard'");
						while($hp=mysqli_fetch_array($select)){
							echo "
							<option value='".$hp['type']."'>".$hp['type']."</option>
							";
						}

					?>
				</select>

				<select class='nama form-control' id='Monitor' name='Monitor'>
				<option value=''>--- Pilih ---</option>
				<?php
						$select=mysqli_query($conn,"select type from inven_jenis where jenis='Monitor'");
						while($hp=mysqli_fetch_array($select)){
							echo "
							<option value='".$hp['type']."'>".$hp['type']."</option>
							";
						}

					?>
				</select>
				
				<select class='nama form-control' id='Mouse' name='Mouse'>
				<option value=''>--- Pilih ---</option>
				<?php
						$select=mysqli_query($conn,"select type from inven_jenis where jenis='Mouse'");
						while($hp=mysqli_fetch_array($select)){
							echo "
							<option value='".$hp['type']."'>".$hp['type']."</option>
							";
						}

					?>
				</select>

				<select class='nama form-control' id='Printer' name='Printer'>
				<option value=''>--- Pilih ---</option>
				<?php
						$select=mysqli_query($conn,"select type from inven_jenis where jenis='Printer'");
						while($hp=mysqli_fetch_array($select)){
							echo "
							<option value='".$hp['type']."'>".$hp['type']."</option>
							";
						}

					?>
				</select>

				<select class='nama form-control' id='Telepon' name='Telepon'>
				<option value=''>--- Pilih ---</option>
				<?php
						$select=mysqli_query($conn,"select type from inven_jenis where jenis='Telepon'");
						while($hp=mysqli_fetch_array($select)){
							echo "
							<option value='".$hp['type']."'>".$hp['type']."</option>
							";
						}

					?>
				</select>

			</div>
			<div class="tambahan col-sm-12 form-group">
			<label for='text'>Input Nama Jika Di List Nama Tidak Ada</label>
			<input type='text' name='tambahan' class='form-control'>
			</div>

		 </div>	
			<input type='hidden' name='tujuan' value='input'>
			<input type='hidden' name='create' value="<?php echo $user ?>">
			<input type='hidden' name='lokasi' value='<?php echo $lokasi?>'>
        </div>
        <div class="modal-footer">
		
		<button type="submit" class="btn btn-primary">Submit</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>	   
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

						  				<th>Jenis Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Kode Barang</th>
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
					"processing": true,
					"serverSide": true,
					"ajax":{
						url :"qinven.php", // json datasource
						type: "post",  // method  , by default get
						error: function(){  // error handling
							$(".lookup-error").html("");
							$("#lookup").append('<tbody class="employee-grid-error"><tr><th colspan="3">TIDAK ADA DATA</th></tr></tbody>');
							$("#lookup_processing").css("display","none");
							
						}
					}
				} );
			} );
        </script>
</html>




