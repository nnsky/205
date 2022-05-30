<html>
<?php
include "menu.php";
if(empty($_SESSION['level'])){
	header("location:../logout.php");
}elseif($_SESSION['level']=="user" && $_SESSION['status']=='aktif' && $array['re_v']=='block'){
			
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
					<th>Kategori</th>
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
