<?php
/* Database connection start */
include "../koneksi.php";
/* Database connection end */
// storing  request (ie, get/post) global array to a variable  
$requestData= $_REQUEST;


$columns = array( 
// datatable column index  => database column name
	0 => 'nama',
    1 => 'hp', 
	2 => 'status',
	3 => 'peserta',
	4 => 'petugas'
);

// getting total number records without any search
$sql = "SELECT *";
$sql.=" FROM lelang";
$query=mysqli_query($conn, $sql) or die("qlelang.php: get InventoryItems");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


if( !empty($requestData['search']['value']) ) {
	// if there is a search parameter
	$sql = "SELECT *";
	$sql.=" FROM lelang";
	$sql.=" WHERE nama LIKE '%".$requestData['search']['value']."%' ";    // $requestData['search']['value'] contains search parameter
	$sql.=" OR hp LIKE '%".$requestData['search']['value']."%' ";
	$sql.=" OR kode LIKE '%".$requestData['search']['value']."%' ";
	$sql.=" OR status LIKE '%".$requestData['search']['value']."%' ";
	$sql.=" OR peserta LIKE '%".$requestData['search']['value']."%' ";
	$sql.=" OR petugas LIKE '%".$requestData['search']['value']."%' ";
	$query=mysqli_query($conn, $sql) or die("qlelang.php: get PO");
	$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result without limit in the query 

	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   "; // $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc , $requestData['start'] contains start row number ,$requestData['length'] contains limit length.
	$query=mysqli_query($conn, $sql) or die("qlelang.php: get PO"); // again run query with limit
	
} else {	

	$sql = "SELECT *";
	$sql.=" FROM lelang";
	$sql.=" ORDER BY ID Desc LIMIT ".$requestData['start']." ,".$requestData['length']."   "; 
	$query=mysqli_query($conn, $sql) or die("qlelang.php: get PO");
	
}

$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	$nestedData=array(); 
	if($row["status"]=="Sudah Verifikasi" or $row["status"]=="Sudah Verfikasi"){
		$style="none";
	}else{
		$style="Block";
	}
	$nestedData[] = $row["nama"];
    $nestedData[] = $row["hp"];
    $nestedData[] = $row["status"].'('.$row["kode"].')';
    $nestedData[] = $row["peserta"];
    $nestedData[] = $row["petugas"];
    $nestedData[] = '
	<td><div class="col-sm-2"><a href="#add'.$row['id'].'" data-toggle="modal" class="btn btn-primary brand">Lihat</a></div>
</td>
<div id="add'.$row['id'].'" class="modal fade" role="dialog">
<div class="modal-dialog modal-lg">
<form action="cekedit" method="POST">   
   <div class="modal-content">

    	<div class="modal-header">
		 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h4 class="modal-title" id="myModalLabel"><center><b>Data Peserta Lelang ChandraKarya</b></center></h4>
			</div>
			<div class="modal-body">
		 <div class="row" style="margin-left:20px;line-height:25px;"><b>
		 <p><div class="col-sm-3">Nama  </div><div class="col-sm-9"><input type="text" name="nama" value="'.$row['nama'].'" ></div></p></br>
		 <p><div class="col-sm-3">Email  </div><div class="col-sm-9">'.$row['email'].'</div></p></br>
		  <p><div class="col-sm-3">Hp  </div><div class="col-sm-9">'.$row['hp'].'</div></p></br>
		 <p><div class="col-sm-3">Nik  </div><div class="col-sm-9">'.$row['nik'].'</div></p></br>
		 <p><div class="col-sm-3">Nomor Nota  </div><div class="col-sm-9">'.$row['nota'].'</div></p></br>
		 <p><div class="col-sm-3">Pernah Berbelanja  </div><div class="col-sm-9">'.$row['dtgck'].'</div></p></br>
		 <p><div class="col-sm-3">Alamat </div><div class="col-sm-9">'.$row['alamat'].'</div></p></br>
		 <p><div class="col-sm-3">Pernah Ikut Lelang</div><div class="col-sm-9">'.$row['ikut'].'</div></p></br>
		 <p><div class="col-sm-3">Bersedia Ikut  </div><div class="col-sm-9">'.$row['datang'].'</div></p></br>
		 <p><div class="col-sm-3">Tanggal  </div><div class="col-sm-9">'.$row['daftar'].'</div></p></br>
		 <p><div class="col-sm-3">status </div><div class="col-sm-9">'.$row['status'].' '.$row['kode'].'</div></p></br>
		 <p><div class="col-sm-3">Petugas  </div><div class="col-sm-9">'.$row['petugas'].'</div></p></br>
		 <p><div class="col-sm-3">Peserta  </div><div class="col-sm-9">'.$row['peserta'].'</div></p></br>
		 <p><div class="col-sm-3">Verifikasi </div><div class="col-sm-9" style="display:'.$style.'"><input type="checkbox" name="very" value="Sudah Verifikasi"><b> Sudah Verifikasi</b></div></p></br>
		
		</div>
		
		
				<div class="modal-footer">
				<input type="hidden" name="tgpan" value="lelang">
				<input type="hidden" name="id" value="'.$row["id"].'">
				<button class="btn btn-success" type="submit">Save</button>
	                </button> <button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">Cancel</button>
	            </div></form>
            </div>      
        </div>
</div>

        
		
	';			
	
	$data[] = $nestedData;
    
}



$json_data = array(
			"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
			"recordsTotal"    => intval( $totalData ),  // total number of records
			"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
			"data"            => $data   // total data array
			);

echo json_encode($json_data);  // send data as json format

?>


