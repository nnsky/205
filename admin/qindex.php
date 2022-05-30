<?php
/* Database connection start */
include "../koneksi.php";
/* Database connection end */
// storing  request (ie, get/post) global array to a variable  
$date=date("d F Y");
$requestData= $_REQUEST;


$columns = array( 
// datatable column index  => database column name
	0 => 'id',
    1 => 'reportid', 
	2 => 'tanggal',
	3 => 'user',
	3 => 'perihal'
);

// getting total number records without any search
$sql = "SELECT *";
$sql.=" FROM aktifitas where tanggal ='".$date."'";
$query=mysqli_query($conn, $sql) or die("qindex.php: get InventoryItems");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


if( !empty($requestData['search']['value']) ) {
	// if there is a search parameter
	$sql = "SELECT *";
	$sql.=" FROM aktifitas";
	$sql.=" WHERE (tanggal LIKE '%".$requestData['search']['value']."%' && tanggal ='".$date."')";    // $requestData['search']['value'] contains search parameter
	$sql.=" OR (sales LIKE '%".$requestData['search']['value']."%' && tanggal ='".$date."')";
	$sql.=" OR (nama LIKE '%".$requestData['search']['value']."%' && tanggal ='".$date."')";
	$sql.=" OR (status LIKE '%".$requestData['search']['value']."%' && tanggal ='".$date."')";
	$sql.=" OR (responid LIKE '%".$requestData['search']['value']."%' && tanggal ='".$date."')";
	$sql.=" OR (perihal LIKE '%".$requestData['search']['value']."%' && tanggal ='".$date."')";
	$query=mysqli_query($conn, $sql) or die("qindex.php: get PO");
	$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result without limit in the query 

	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   "; // $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc , $requestData['start'] contains start row number ,$requestData['length'] contains limit length.
	$query=mysqli_query($conn, $sql) or die("qindex.php: get PO"); // again run query with limit
	
} else {	

	$sql = "SELECT *";
	$sql.=" FROM aktifitas where tanggal ='".$date."'";
	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
	$query=mysqli_query($conn, $sql) or die("qindex.php: get PO");
	
}

$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	$nestedData=array(); 

	$nestedData[] = $row["responid"];
    $nestedData[] = $row["tanggal"];
    $nestedData[] = $row["nama"];
    $nestedData[] = $row["sales"];
    $nestedData[] = $row["perihal"];
	if($row["status"]=="Pending"){
		$nestedData[] = "<label style='color:red'>".$row["status"]."</label>";
	}else{
		$nestedData[] = "<label style='color:blue'>".$row["status"]."</label>";
	}
    
	
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

