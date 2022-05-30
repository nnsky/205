<html>
<?php
include 'menu.php';
if(empty($_SESSION['level'])){
	header("location:../logout.php");
}elseif($_SESSION['level']=="admin" && $_SESSION['status']=='aktif' && $array['lelang_v']=='block'){

	}elseif($_SESSION['level']=='user'){
		header("location:../logout.php");
	}else{
		header("location:../logout.php");	
	}
?>
<head>
	<meta CHarset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lelang CK</title>
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
				dateFormat: 'dd-mm-yy'
            });
        });
		
  function validangka(a)
{
	if(!/^[0-9 /]+$/.test(a.value))
	{
	a.value = a.value.substring(0,a.value.length-1);
	}
}
  function validhuruf(a)
{
	if(!/^[a-z A-Z]+$/.test(a.value))
	{
	a.value = a.value.substring(0,a.value.length-1);
	}
}
$(document).ready(function(){
    $('#sumber').on('change', function() {
      if ( this.value == '1')
      
      {
        $("#hasil").show();
      }
      else
      {
        $("#hasil").hide();
      }
    });
});
$(document).ready(function() {
    $('#example').DataTable( {
    
    } );
} );
</script>
<style>
.edit{
	display:<?php echo $array['lelang_e'] ?>;
	width:50px;
}
</style>
</head>
<body>
<div class='col-sm-12'>
	<div class='col-sm-1'><button style="display:<?php echo $array['lelang_i'] ?>" class="btn btn-primary " data-toggle="modal" data-target="#ModalAdd">Buat</button></div>
	<div class='col-sm-3'><a class='btn btn-success' href="dwnsql?id=lelang">Download Peserta Lelang</a></div>
</div>
<div id="ModalAdd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel"><center><b>Pendaftaran Lelang Jilid 2</b></center></h4>
        </div>
        <div class="modal-body">
		<form action="buat.php" name="modal_popup" enctype="multipart/form-data" method="POST">
            
                <div class="form-group">
                  <label for="Name">Nama</label>
                  <input type="text" name="nama"  class="form-control" placeholder="Nama Anda" onkeyup='validhuruf(this)' required/>
                </div>

                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" name="email"  class="form-control" placeholder="Email Anda" required/>
                </div>

                <div class="form-group" style="padding-bottom: 5px;">
                  <label for="number">No. Hp</label>
                  <input type="text" name="hp"  class="form-control" placeholder='Nomor HandPhone' onkeyup='validangka(this)' required/>
                </div>
				  <div class="form-group">
                  <label for="email">Alamat</label>
                  <input type="text" name="alamat"  class="form-control" placeholder="Alamat Anda" required/>
                </div>

				<div class='form-group' style='padding-bottom:5px'>
				<label>NIK KTP</label>
				<input type="text" class="form-control" name="nik"> 
				</div>
				<div class='form-group' style='padding-bottom:5px'>
				<label>Nomor Nota</label>
				<input type="text" class="form-control" name="nota"> 
				</div>
				<div class='form-group' style='padding-bottom:5px'>
				<label>Diskon Periode</label>
				<input type="radio" name="diskon" value="20%">20%
				<input type="radio" name="diskon" value="15%">15%
				<input type="radio" name="diskon" value="10%">10%
				<input type="radio" name="diskon" value="0%" checked>0%
				</div>
				<div class='form-group' style='padding-bottom : 5px'>
				<label>Sudah Pernah Berbelanja ?</label>
				<input type='radio' name='belanja' value='belum' checked><b>Belum</b>
				<input type='radio' name='belanja' value='sudah'><b>Sudah</b>
				</div>
				<div class='form-group' style='padding-bottom : 5px'>
				<label>Pernah Mengikuti Acara Bazaar Lelang di Chandra Karya?</label>
				<input type='radio' name='ikut' value='belum' checked><b>Belum</b>
				<input type='radio' name='ikut' value='sudah' ><b>Sudah</b>
				</div>
				<div class='form-group' style='padding-bottom:5px'>
				<label>Rencana Hadir Tanggal</label><br>
				<input type='checkbox' name='datang[0]' value='Day 1'><b>Day 1</b>
				<input type='checkbox' name='datang[4]' value='Day 5'><b>Day 5</b><br>
				<input type='checkbox' name='datang[1]' value='Day 2'><b>Day 2</b>
				<input type='checkbox' name='datang[5]' value='Day 6'><b>Day 6</b><br>
				<input type='checkbox' name='datang[2]' value='Day 3'><b>Day 3</b><br>
				<input type='checkbox' name='datang[3]' value='Day 4'><b>Day 4</b>
				</div>
				<div class="form-group">
                <input id="datetimepicker1" name='setdate' type="text" class="form-control" required />
				</div>
				<div class='form-group' style='padding-bottom:50px'>
					<div class='col-sm-4'>
					<label>Petugas-Lokasi</label><br>
					<input type='text' name='petugas' placeholder='Cth: David-PG'>
					<input type='hidden' name='perihal' value='lelang'>
					</div>
					<div class='col-sm-4'>
					<label>Peserta Jilid </label><br>
					<input type='text' name='peserta' placeholder='Cth : 4'>
					</div>
					<div class='col-sm-4'>
					<label>Verifikasi Perserta</label><br>
					<input type='checkbox' name='very' value="Sudah Verifikasi"><b> Sudah Verifikasi</b>
					</div>
				</div>
              <div class="modal-footer">
                  <button class="btn btn-success" type="submit">Confirm</button>
                  <button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true"> Cancel</button>
              </div>
              </form>

	</div>
	
			</div>           
        </div>
    </div>
 <div class="panel panel-default">
                        <div class="panel-body">
                                    <table id="lookup" class="table table-bordered">  
	                                   <thead bgcolor="#eeeeee" align="center">
                                        <tr>
								<th>Nama</th>
								<th>Hp</th>
								<th>Status</th>
								<th>Peserta</th>
								<th>Petugas</th>
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
						url :"qlelang.php", // json datasource
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




