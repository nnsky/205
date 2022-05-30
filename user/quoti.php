<?php
/* Database connection start */
include "../koneksi.php";
session_start();
/* Database connection end */
// storing  request (ie, get/post) global array to a variable  
$requestData= $_REQUEST;


$columns = array( 
// datatable column index  => database column name
	0 => 'tanggal',
	1 => 'quote',
	2 => 'customer',
	3 => 'nama',
	4 => 'berlaku'
);

// getting total number records without any search
$sql = "SELECT id";
$sql.=" FROM quote where lokasi='".$_SESSION['lokasi']."'";
$query=mysqli_query($conn, $sql) or die("quoti.php: get InventoryItems");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


if( !empty($requestData['search']['value']) ) {
	// if there is a search parameter
	$sql = "SELECT *";
	$sql.=" FROM quote";
	$sql.=" WHERE (tanggal LIKE '%".$requestData['search']['value']."%' && lokasi='".$_SESSION['lokasi']."')";    // $requestData['search']['value'] contains search parameter
	$sql.=" OR (quote LIKE '%".$requestData['search']['value']."%' && lokasi='".$_SESSION['lokasi']."')";
	$sql.=" OR (nama LIKE '%".$requestData['search']['value']."%' && lokasi='".$_SESSION['lokasi']."')";
	$sql.=" OR (sales LIKE '%".$requestData['search']['value']."%' && lokasi='".$_SESSION['lokasi']."')";
	$sql.=" OR (perusahaan LIKE '%".$requestData['search']['value']."%' && lokasi='".$_SESSION['lokasi']."')";
	$query=mysqli_query($conn, $sql) or die("quoti.php: get PO");
	$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result without limit in the query 

	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   "; // $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc , $requestData['start'] contains start row number ,$requestData['length'] contains limit length.
	$query=mysqli_query($conn, $sql) or die("quoti.php: get PO"); // again run query with limit
	
} else {	

	$sql = "SELECT *";
	$sql.=" FROM quote where lokasi='".$_SESSION['lokasi']."'";
	$sql.=" ORDER BY id DESC  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
	$query=mysqli_query($conn, $sql) or die("quoti.php: get PO");
	
}

$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	if($row['nama']==null){
		$hasil=$row['perusahaan'];
	}else{
		$hasil=$row['nama'];
	};
	
	$nestedData=array(); 
	$nestedData[] = $row["tanggal"];
    $nestedData[] = $row["lokasi"];
    $nestedData[] = $row["customer"];
    $nestedData[] = $hasil;
    $nestedData[] = $row["berlaku"];
    $nestedData[] = '<a class="btn btn-info" target="_blank" href="editquot?&id='.$row["id"].'">Edit</a> <a target="_blank" href="printpdf?id='.$row["id"].'" class="btn btn-primary">Print</a>';		
	
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


