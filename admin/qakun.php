<?php
/* Database connection start */
include "../koneksi.php";
/* Database connection end */
// storing  request (ie, get/post) global array to a variable  
$requestData= $_REQUEST;


$columns = array( 
// datatable column index  => database column name
	0 => 'username',
    1 => 'level', 
	2 => 'lokasi',
	3 => 'status'
);

// getting total number records without any search
$sql = "SELECT *";
$sql.=" FROM akun";
$query=mysqli_query($conn, $sql) or die("qakun.php: get InventoryItems");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


if( !empty($requestData['search']['value']) ) {
	// if there is a search parameter
	$sql = "SELECT *";
	$sql.=" FROM akun";
	$sql.=" WHERE username LIKE '%".$requestData['search']['value']."%' ";    // $requestData['search']['value'] contains search parameter
	$sql.=" OR level LIKE '%".$requestData['search']['value']."%' ";
	$sql.=" OR lokasi LIKE '%".$requestData['search']['value']."%' ";
	$sql.=" OR status LIKE '%".$requestData['search']['value']."%' ";
	$query=mysqli_query($conn, $sql) or die("qakun.php: get PO");
	$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result without limit in the query 

	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   "; // $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc , $requestData['start'] contains start row number ,$requestData['length'] contains limit length.
	$query=mysqli_query($conn, $sql) or die("qakun.php: get PO"); // again run query with limit
	
} else {	

	$sql = "SELECT *";
	$sql.=" FROM akun";
	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
	$query=mysqli_query($conn, $sql) or die("qakun.php: get PO");
	
}

$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	$nestedData=array(); 

	$nestedData[] = $row["username"];
    $nestedData[] = $row["level"];
    $nestedData[] = $row["lokasi"];
    $nestedData[] = $row["status"];
    $nestedData[] = '<td><div class="col-sm-2"><a href="#add'.$row['id'].'" data-toggle="modal" class="btn btn-primary edit">Edit</a></div>
</td>
<div id="add'.$row['id'].'" class="modal fade" role="dialog">
<div class="modal-dialog modal-lg">
<form action="cekedit" method="POST">   
   <div class="modal-content">

    	<div class="modal-header">
		 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel"><center><b>Username : '.$row["username"].'</b></center></h4>
        </div>
				<div class="modal-body">
		 <div class="row">
			<p><div class="col-sm-3">Username </div><div class="col-sm-3"><input type="text" name="username" Value="'.$row['username'].'" required></div></p></br></br>
			<p><div class="col-sm-3">Level</div>
			<div class="col-sm-3">
				<select name="level">
				<option value="">Ubah Level</option>
				<option value="admin">Admin</option>
				<option value="user">User</option>
				</select>
			</div>
			<div class="col-sm-3">Lokasi</div>
			<div class="col-sm-3">
			<select name="lokasi">
			<option value="">Ubah Lokasi</option>
			<option value="GCK">Grand CK</option>
			<option value="CM">Pramuka 180</option>
			<option value="CH">Pramuka 168</option>
			<option value="CPG">Premium Gallery</option>
			<option value="KG">Kelapa Gading </option>
			<option value="AL">Ruko Alam Sutra </option>
			<option value="CPIK">Pantai Indah Kapuk </option>
			<option value="CBEK">Bekasi </option>
			<option value="CBDG">Bandung </option>
			<option value="CKS">Sunter</option>
			<option value="CPI">Pondok Indah</option>
			<option value="CMKS">Makassar</option>
			</select>
			</div></br></br>
			<div class="col-sm-3">Status</div>
			<div class="col-sm-3">
			<select name="status">
			<option value="">Ubah Status</option>
			<option value="aktif">Aktif</option>
			<option value="tidakaktif">Tidak Aktif</option>
			</select>
			</div>
			<div class="col-sm-3">Ingin Mengubah Password</div>
			<div class="col-sm-3">
			<input type="password" name="password" placeholder="Ganti Password">
			</div><p></br>
			<input type="hidden" name="asal" value="akun">
			<input type="hidden" name="id" value="'.$row["id"].'">
			<input type="hidden" name="tgpan" value="akun">
			</div></br></br>
		
				<div class="modal-footer">
				<a href="akses?&username='.$row["username"].'" class="btn btn-info">Hak Akses</a>
	                <button class="btn btn-primary" type="submit">Confirm
	                </button> <button type="reset" class="btn btn-success"  data-dismiss="modal" aria-hidden="true">Cancel</button>
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

