<html>
<head>
	<meta CHarset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 <title>After Sales</title>
<link rel='stylesheet' href='../css/bootstrap.min.css'>
<script src='../asset/jquery.min.js'></script>
<script src='../asset/bootstrap.min.js'></script>
<link rel="stylesheet" href="../css/tablejquery.css">
<script src="../asset/tablejquery.js"></script>
<?php
include 'menu.php';
if(empty($_SESSION['level'])){
	header("location:../logout.php");
}elseif($_SESSION['level']=="admin" && $_SESSION['status']=='aktif' && $array['re_v']=='block'){
	
	}else{
		header("location:../logout.php");	
	}
	?>
</head>
<div class="row">
	<div class='col-sm-12'>
		<a href="asrespon.php" class="btn btn-primary">Buat</a>
	</div>
</div>
<body>
                                  <div class="panel panel-default">
                        <div class="panel-body">
                                    <table id="lookup" class="table table-bordered">  
	                                   <thead bgcolor="#eeeeee" align="center">
                                        <tr>
	  
                                        <th>Tgl Konfrim</th>
	                                    <th>Nota</th>
	                                    <th>Nama</th>
	                                    <th>Stat Kirim</th>
	                                    <th>Feedback</th>
										<th>Sales</th>
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
						url :"qas.php", // json datasource
						type: "post",  // method  , by default get
						error: function(){  // error handling
							$(".lookup-error").html("");
							$("#lookup").append('<tbody class="employee-grid-error"><tr><th colspan="3">Data Kosong</th></tr></tbody>');
							$("#lookup_processing").css("display","none");
							
						}
					}
				} );
			} );
        </script>
</html>

