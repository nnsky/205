<html> <?php include 'menu.php'; if(empty($_SESSION['level'])){
	header("location:../logout.php");
}elseif($_SESSION['level']=="admin" && $_SESSION['status']=='aktif' && $array['akun_v']=='block'){
	
	}elseif($_SESSION['level']=='user'){
		header("location:../logout.php");
	}else{
		header("location:../logout.php");
	}
$page = (isset($_GET['page']))? $_GET['page'] : 1; $limit = 5; $limit_start = ($page - 1) * $limit; $query = "SELECT * FROM akun LIMIT ".$limit_start.",".$limit; $result = 
mysqli_query($conn, $query);
	?> <head>
	<meta CHarset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Akun</title> <link rel='stylesheet' href='../css/bootstrap.min.css'> <script src='../asset/jquery.min.js'></script> <script src='../asset/bootstrap.min.js'></script> <link 
rel="stylesheet" href="../css/tablejquery.css"> <script src="../asset/tablejquery.js"></script>
		<script type="text/javascript"> function media(param) { if(param==1) document.getElementById("kontak").style.display = 'block'; else 
document.getElementById("kontak").style.display = 'none';
}
</script> <style> .edit{
	display:<?php echo $array['akun_e'] ?>;
	width:50px;
}
</style> </head> <body> <div class="container" style='margin-top:-30px;'>
	<br/>
	<button style='display:<?php echo $array['akun_i']?>' class="btn btn-primary " data-toggle="modal" data-target="#ModalAdd">Buat</button> </div> <div id="ModalAdd" class="modal fade" 
tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"> <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Daftar User</h4>
        </div>
        <div class="modal-body">
          <form action="buat.php" name="modal_popup" enctype="multipart/form-data" method="POST">
          <table class= "table table-striped">
		<tr>
		<td>Username</td>
		<td><input type="text" name="username" required/></td>
		</tr>
		<tr>
		<td>Password</td>
		<td><input type="text" name="password" required/></td>
		</tr>
		<tr>
		<td>Level</td>
		<td>
		<select name="level">
		<option value="admin">Admin</option>
		<option value="user">User</option>
		</select></td>
		</tr>
		<tr>
		<td>Lokasi</td>
		<td>
		<select name="lokasi">
		<option value="GCK">Grand CK</option>
		<option value="CM">Pramuka 180</option>
		<option value="CH">Pramuka 168</option>
		<option value="CPG">Premium Gallery</option>
		<option value="KG">Kelapa Gading </option>
		<option value="AL">Ruko Alam Sutra </option>
		<option value="CPIK">Pantai Indah Kapuk </option>
		<option value="CBEK">Bekasi </option>
		<option value="CBDG">Bandung </option>
		<option value="Sunter">Sunter</option>
		<option value="OfficeIdea">Office Idea</option>
		<option value="CPI">Pondok Indah</option>
		<option value="CMKS">Makassar</option>
		<td>
		</tr>
		<tr>
		<td>Status</td>
		<td>
		<select name="status">
		<option value="aktif">Aktif</option>
		<option value="tdkaktif">Tidak Aktif</option>
		</select></td>
		</tr>
		<tr>
		<input type='hidden' name='perihal' value='akun'>
		<td><input type="submit" Value="Simpan" class='btn btn-primary'></td>
		</tr>
		</table>
			
			</form>
			</div>
        </div>
    </div> </div>
                                  <div class="panel panel-default">
                        <div class="panel-body">
                                    <table id="lookup" class="table table-bordered">
	                                   <thead bgcolor="#eeeeee" align="center">
                                        <tr>
										<th>Username</th>
										<th>Level</th>
										<th>Lokasi</th>
										<th>Status</th>
										<th>Action</th>
                                       </tr>
                                      </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div> </body>
        <script src="../asset/jquery.dataTables.js"></script>
        <script src="../asset/dataTables.bootstrap.js"></script>
        <script>
        $(document).ready(function() {
				var dataTable = $('#lookup').DataTable( {
					"processing": true,
					"serverSide": true,
					"ajax":{
						url :"qakun.php", // json datasource
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
