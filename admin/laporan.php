<html>
<head>
	<meta CHarset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 <title>Laporan</title>
<link rel='stylesheet' href='../css/bootstrap.min.css'>
<script src='../asset/jquery.min.js'></script>
<script src='../asset/bootstrap.min.js'></script>
<link rel="stylesheet" href="../css/tablejquery.css">
<script src="../asset/tablejquery.js"></script>
<?php
include 'menu.php';
if(empty($_SESSION['level'])){
	header("location:../logout.php");
}elseif($_SESSION['level']=="admin" && $_SESSION['status']=='aktif' && $array['br_v']=='block'){
	
	}elseif($_SESSION['level']=='user'){
		header("location:../logout.php");
	}else{
		header("location:../logout.php");	
	}
$datemin=$_SESSION["datemin"];
$datemax=$_SESSION["datemax"];

?>
</head>
<body>
<?php echo "<a class='btn btn-success' target='_blank' href='sql?datemin=".$datemin."&datemax=".$datemax."'>Download Laporan</a>"?>
 <div class="panel panel-default">
                        <div class="panel-body">
                                    <table id="lookup" class="table table-bordered">  
	                                   <thead bgcolor="#eeeeee" align="center">
                                        <tr>
	  
                                <th>Voucher</th>
								<th>seri</th>
								<th>Nama</th>
								<th>No.Nota</th>
								<th>Total Belanja</th>
								<th>Tanggal</th>
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
					"responsive": true,
					"processing": true,
					"serverSide": true,
					"ajax":{
						url :"qlaporan.php", // json datasource
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

