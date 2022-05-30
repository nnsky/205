<?php
/* Database connection start */
include "../koneksi.php";
session_start();
/* Database connection end */
// storing  request (ie, get/post) global array to a variable  
$requestData= $_REQUEST;


$columns = array( 
// datatable column index  => database column name
	0 => 'nama',
    1 => 'presmi', 
	2 => 'ck',
	3 => 'jualck'
);

// getting total number records without any search
$sql = "SELECT id,nama,presmi,ck,jualck,userck,userpresmi,userjualck";
$sql.=" FROM harga";
$query=mysqli_query($conn, $sql) or die("qharga.php: get InventoryItems");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


if( !empty($requestData['search']['value']) ) {
	// if there is a search parameter
	$sql = "SELECT id,nama,presmi,ck,jualck,userck,userpresmi,userjualck";
	$sql.=" FROM harga";
	$sql.=" WHERE nama LIKE '%".$requestData['search']['value']."%' ";    // $requestData['search']['value'] contains search parameter
	$sql.=" OR presmi LIKE '%".$requestData['search']['value']."%' ";
	$sql.=" OR ck LIKE '%".$requestData['search']['value']."%' ";
	$sql.=" OR jualck LIKE '%".$requestData['search']['value']."%' ";
	$query=mysqli_query($conn, $sql) or die("qharga.php: get PO");
	$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result without limit in the query 

	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   "; // $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc , $requestData['start'] contains start row number ,$requestData['length'] contains limit length.
	$query=mysqli_query($conn, $sql) or die("qharga.php: get PO"); // again run query with limit
	
} else {	

	$sql = "SELECT id,nama,presmi,ck,jualck,userck,userpresmi,userjualck";
	$sql.=" FROM harga";
	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
	$query=mysqli_query($conn, $sql) or die("qharga.php: get PO");
	
}

$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	$nestedData=array(); 

	$nestedData[] = $row["nama"];
    $nestedData[] = $row["presmi"];
	$nestedData[] = $row["ck"];
	$nestedData[] = $row["jualck"];
    $nestedData[] = '
<td><div class="col-sm-2"><a href="#add'.$row['id'].'" data-toggle="modal" class="btn btn-primary edit">Edit</a></div>
</td>
<div id="add'.$row['id'].'" class="modal fade" role="dialog">
<div class="modal-dialog modal-lg">
<form action="cekedit" method="POST">   
   <div class="modal-content">

    	<div class="modal-header">
		 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel"><center><b>'.$row["nama"].'</b></center></h4>
        </div>
		<div class="row" style="margin-left:50px;">
				<div class="col-sm-6">
				<h4>Harga</h4>
				</div>
				<div class"col-sm-6">
				<h4>User</h4>
				</div>
				<br></br>
				<div class="col-sm-6">
				 <label>Presmi &nbsp</label><input type="text" name="presmi" value="'.$row["presmi"].'" onkeyup="formatangka(this)" required>
				</div>
				<div class="col-sm-6">
				 <label>'.$row["userpresmi"].'</label>
				</div>
				<br></br>
				<div class="col-sm-6">
				 Netto CK &nbsp<input type="text" name="ck" value="'.$row["ck"].'" onkeyup="formatangka(this)" required>
				</div>
				<div class="col-sm-6">
				<label> '.$row["userck"].'</label>
				</div>
				<br></br>
				<div class="col-sm-6">
				 JualCK &nbsp<input type="text" name="jualck" value="'.$row["jualck"].'" onkeyup="formatangka(this)" >
				</div>
				<div class="col-sm-6">
				<label>'.$row["userjualck"].'</label>
				</div>
			</div>
				<div class="modal-footer">
				<input type="hidden" name="tgpan" value="harga">
				<input type="hidden" name="id" value="'.$row["id"].'">
				<input type="hidden" name="user" value="'.$_SESSION["username"].'">
				<a href="delete?&perihal=harga&_id='.$row["id"].'" class="btn btn-danger">Hapus</a>
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

