<?php
/* Database connection start */
include "../koneksi.php";
/* Database connection end */
// storing  request (ie, get/post) global array to a variable  
$requestData= $_REQUEST;


$columns = array( 
// datatable column index  => database column name
	0 => 'lokasi',
    1 => 'kwitansid', 
	2 => 'nama',
	3 => 'jumlah',
	4 => 'informasi',
	5 => 'tanggal'
);

// getting total number records without any search
$sql = "SELECT *";
$sql.=" FROM kwitansi";
$query=mysqli_query($conn, $sql) or die("qkwitansi.php: get InventoryItems");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


if( !empty($requestData['search']['value']) ) {
	// if there is a search parameter
	$sql = "SELECT *";
	$sql.=" FROM kwitansi";
	$sql.=" WHERE lokasi LIKE '%".$requestData['search']['value']."%' ";    // $requestData['search']['value'] contains search parameter
	$sql.=" OR kwitansid LIKE '%".$requestData['search']['value']."%' ";
	$sql.=" OR nama LIKE '%".$requestData['search']['value']."%' ";
	$sql.=" OR jumlah LIKE '%".$requestData['search']['value']."%' ";
	$sql.=" OR sales LIKE '%".$requestData['search']['value']."%' ";
	$sql.=" OR terbilang LIKE '%".$requestData['search']['value']."%' ";
	$query=mysqli_query($conn, $sql) or die("qkwitansi.php: get PO");
	$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result without limit in the query 

	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   "; // $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc , $requestData['start'] contains start row number ,$requestData['length'] contains limit length.
	$query=mysqli_query($conn, $sql) or die("qkwitansi.php: get PO"); // again run query with limit
	
} else {	

	$sql = "SELECT *";
	$sql.=" FROM kwitansi";
	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
	$query=mysqli_query($conn, $sql) or die("qkwitansi.php: get PO");
	
}
function limit_words($string, $word_limit){
$words = explode(" ",$string);
return implode(" ",array_splice($words,0,$word_limit));}
$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	$nestedData=array(); 

	$nestedData[] = $row["lokasi"];
    $nestedData[] = $row["kwitansid"];
    $nestedData[] = $row["nama"];
    $nestedData[] = $row["jumlah"];
    $nestedData[] = limit_words($row["informasi"],3);
    $nestedData[] = $row["tanggal"];
    $nestedData[] = '
	<td><div class="col-sm-4"><a href="#add'.$row['id'].'" data-toggle="modal" class="btn btn-primary edit">Edit</a></div>
	<div class="col-sm-6"><a href="printkwt?&id='.$row["id"].'" class="btn btn-info">Print</a></div>
	</td>
<div id="add'.$row['id'].'" class="modal fade" role="dialog">
<div class="modal-dialog modal-lg">
<form action="cekedit" method="POST">   
   <div class="modal-content">

    	<div class="modal-header">
		 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel"><center><b>No Kwitansi '.$row["kwitansid"].'</b></center></h4>
        </div>
				<div class="modal-body">
		 <div class="row">
			<b><div class="col-sm-6">No Kwitansi :<input type="text" name="idbaru" value="'.$row['kwitansid'].'"></div>
                <div class="col-sm-6">Tanggal : <input type="text" name="tgl" value="'.$row['tanggal'].'"></div><br><br>
                <div class="col-sm-6">Nama : <input type="text" name="nama" value="'.$row['nama'].'" ></div>
                <div class="col-sm-6">User : '.$row['sales'].'</div><br><br>
                <div class="col-sm-6">Lokasi : 
				<select name="lokasi">
				<option value="">Ubah Lokasi</option>
				<option value="CM">Pramuka 180</option>
				<option value="CH">Pramuka 168</option>
				<option value="CPG">Premium Gallery</option>
				<option value="CKG">Kelapa Gading </option>
				<option value="ALS">Ruko Alam Sutra </option>
				<option value="CPIK">Pantai Indah Kapuk </option>
				<option value="CBEK">Bekasi </option>
				<option value="CBDG">Bandung </option>
				</select>
			    </div>
				<div class="col-sm-6">Jumlah : <input type="text" name="jumlah" value="'.$row["jumlah"].'" onkeyup="formatangka(this)"></div><br><br>
								
				<div class="col-sm-6">
                Terbilang :
                </div>
                <div class="col-sm-6">
				Untuk Pembelian :
                </div>
				<div class="col-sm-6">
				<textarea name="terbilang" cols="40" rows="5">'.$row['terbilang'].'</textarea>
				</div>
				<div class="col-sm-6">
				<textarea name="beli" cols="40" rows="5" >'.$row['informasi'].'</textarea>
				</div>
				
                <input type="hidden" name="asal" value="kwitansi">
				<input type="hidden" name="tgpan" value="kwitansi">
				<input type="hidden" name="id" value="'.$row["id"].'">
			</div>
	
				<div class="modal-footer">	
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

