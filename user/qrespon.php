<?php
/* Database connection start */
include "../koneksi.php";
date_default_timezone_set('asia/jakarta');
session_start();
/* Database connection end */
// storing  request (ie, get/post) global array to a variable  
$requestData= $_REQUEST;


$columns = array( 
// datatable column index  => database column name
	0 => 'tanggal',
    1 => 'responid', 
	2 => 'nama',
	3 => 'pesan',
	4 => 'untuk'
);

// getting total number records without any search
$sql = "SELECT *";
$sql.=" FROM respon where lokasi ='".$_SESSION['lokasi']."'";
$query=mysqli_query($conn, $sql) or die("qrespon.php: get InventoryItems");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


if( !empty($requestData['search']['value']) ) {
	// if there is a search parameter
	$sql = "SELECT *";
	$sql.=" FROM respon";
	$sql.=" WHERE (tanggal LIKE '%".$requestData['search']['value']."%' && lokasi ='".$_SESSION['lokasi']."')";    // $requestData['search']['value'] contains search parameter
	$sql.=" OR (nama LIKE '%".$requestData['search']['value']."%' && lokasi ='".$_SESSION['lokasi']."')";
	$sql.=" OR (untuk LIKE '%".$requestData['search']['value']."%' && lokasi ='".$_SESSION['lokasi']."')";
	$sql.=" OR (status LIKE '%".$requestData['search']['value']."%' && lokasi ='".$_SESSION['lokasi']."')";
	$sql.=" OR (responid LIKE '%".$requestData['search']['value']."%' && lokasi ='".$_SESSION['lokasi']."')";
	$sql.=" OR (kategori LIKE '%".$requestData['search']['value']."%' && lokasi ='".$_SESSION['lokasi']."')";
	$sql.=" OR (nota LIKE '%".$requestData['search']['value']."%' && lokasi ='".$_SESSION['lokasi']."')";
	$query=mysqli_query($conn, $sql) or die("qrespon.php: get PO");
	$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result without limit in the query 

	$sql.=" ORDER BY status ASC   LIMIT ".$requestData['start']." ,".$requestData['length']."   "; // $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc , $requestData['start'] contains start row number ,$requestData['length'] contains limit length.
	$query=mysqli_query($conn, $sql) or die("qrespon.php: get PO"); // again run query with limit
	
} else {	

	$sql = "SELECT *";
	$sql.=" FROM respon where lokasi ='".$_SESSION['lokasi']."'";
	$sql.=" ORDER BY status ASC,ID Desc LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
	$query=mysqli_query($conn, $sql) or die("qrespon.php: get PO");
	
}
	function limit_words($string, $word_limit){
	$words = explode(" ",$string);
	return implode(" ",array_splice($words,0,$word_limit));}
	$data = array();
while($row=mysqli_fetch_array($query) ) {  // preparing an array
	$jam1=$row["jam"];
	$jam2=$row["hari"];
	$status1=$row['status'];
	$tes=date('ynd');
	if($jam1 <=date('G') or $jam2 <date('ynd')){
		$jam3="benar";
	}else{
		$jam3='salah';
	} 
	if($status1 == 'Pending' and $jam3=="benar"){
		$style="red";
	}elseif($status1 =='Pendings' and $jam2 <= $tes){
		$style="red";
	}else{
		$style="black";
	}
	$nestedData=array(); 
	
	$nestedData[] = '<span style="color:'.$style.'">'.$row["tanggal"].'</span>';
    $nestedData[] = '<span style="color:'.$style.'">'.$row["responid"].'</span>';
    $nestedData[] = '<span style="color:'.$style.'">'.$row["nama"].'</span>';
    $nestedData[] = '<span style="color:'.$style.'">'.$row["nota"].'</span>';
    $nestedData[] = '<span style="color:'.$style.'">'.$row["kategori"].'</span>';
	 $nestedData[] = '<span style="color:'.$style.'">'.$row["kontak"].'</span>';
    $nestedData[] = '<span style="color:'.$style.'">'.$row["untuk"].'</span>';
if($row["status"]=="Complete" or $row["status"]=="selesai" ){
	$nestedData[] = '<td><div class="col-sm-2"><a href="tanggapan?&_id='.$row["responid"].'&user='.$_SESSION["username"].'"  class="btn btn-primary">'.$row["status"].'</a></div>
	</td>';	
	}else if($row["status"]=="proses"){
	$nestedData[] = '<td><div class="col-sm-2"><a href="tanggapan?&_id='.$row["responid"].'&user='.$_SESSION["username"].'"  class="btn btn-success">On-Process</a></div>
	</td>';	
}else{
	$nestedData[] = '<td><div class="col-sm-2"><a href="tanggapan?&_id='.$row["responid"].'&user='.$_SESSION["username"].'"  class="btn btn-danger">'.$row["status"].'</a></div>
	</td>';
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


