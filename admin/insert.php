<?php  
 include '../koneksi.php';
 if(!empty($_POST))  
 {  
      $output = '';  
      $message = '';  
      $presmi = mysqli_real_escape_string($conn, $_POST["presmi"]);
	  $ck=mysqli_real_escape_string($conn,$_POST["ck"]);
	  $userck=mysqli_real_escape_string($conn,$_POST["user"]);
	  $id=mysqli_real_escape_string($conn,$_POST["hasil_id"]);
	  $halaman=mysqli_real_escape_string($conn,$_POST["halaman"]);
	  $type=mysqli_real_escape_string($conn,$_POST["type"]);
	  $date=date('dm');
	  if($type=="cari" or $type='harga')  
      { 
		$jualck=mysqli_real_escape_string($conn,$_POST["jualck"]);
		$sql1="SELECT * FROM harga where id = '$id'";
		$query1 = mysqli_query($conn, $sql1);
		$hasil1=mysqli_fetch_array($query1);

  
	if($ck == $hasil1['ck']){
	$cks=$ck;
	$userck=$hasil1['userck'];
	$dateck=$hasil1['dateck'];
	
}else{
	$cks=$ck;
	$userck=$userck;
	$dateck=$date;
	
}

if($presmi == $hasil1['presmi']){
	$presmi1=$presmi;
	$userpresmi=$hasil1['userpresmi'];
	$datepresmi=$hasil1['datepresmi'];
	
}else{
	$presmi1=$presmi;
	$userpresmi=$userck;
	$datepresmi=$date;
	
}
if($jualck == $hasil1['jualck']){
	$jualck1=$jualck;
	$userjualck=$hasil1['userjualck'];
	$datejualck=$hasil1['datejualck'];
	
}else{
	$jualck1=$jualck;
	$userjualck=$userck;
	$datejualck=$date;
	
}
$c=str_replace(".","",$ck);
$d=str_replace(".","",$hasil1['tokped']);
$e=str_replace(".","",$hasil1['bl']);
$f=str_replace(".","",$hasil1['lazada']);
if($d==0 or $d==null){
	$d1=999999999;
}else{
	$d1=$d;
}

if($e==0 or $e==null){
	$e1=999999999;
}else{
	$e1=$e;
}

if($f==0 or $f==null){
	$f1=999999999;
}else{
	$f1=$f;
}

$g=min($c,$d1,$e1,$f1);
if($g==$c){
	$status='Termurah';
}else{
	$status='Bersaing';
}
 $query="UPDATE harga SET ck = '$cks',presmi='$presmi1',datepresmi='$datepresmi',userpresmi ='$userpresmi',jualck='$jualck1',userjualck = '$userjualck',datejualck = '$datejualck',dateck = '$dateck',userck = '$userck',status ='$status' Where id ='$id'";
    $conn->query($query);
           $message = 'Data Updated'; 
			
      }else if($type='online')
      {  
           
      }  
       if(mysqli_query($conn, $query))  
       {  
	
             $output .= '<label class="text-success">' . $message . '</label>';  
			 $page = (isset($halaman))? $halaman : 1;
			 $limit = 10; 
			 $limit_start = ($page - 1) * $limit;
			if($_POST['type']=='cari'){
			$select_query = "SELECT * FROM harga where ".$_POST['cari']." like '%".$_POST['search']."%'LIMIT ".$limit_start.",".$limit;	
			}elseif($_POST['type']=="harga"){
			$select_query = "SELECT * FROM harga LIMIT ".$limit_start.",".$limit;	
			};
             $result = mysqli_query($conn, $select_query);  
             $output .= '  
                  <table class="table table-bordered">  
                               <tr>  
                                <th>Nama</th>
								<th>Presmi</th>
								<th>Harga Netto</th>
								<th>Harga Jual CK</th>
								<th>Action</th>   
                               </tr>  
             ';  
             while($hasil = mysqli_fetch_array($result))  
             {  
				if($hasil['presmi']==null){
				$presmi=0;
				}else{
				$presmi=$hasil['presmi'];
				};
				if($hasil['jualck']==null){
				$jualck=0;
				}else{
				$jualck=$hasil['jualck'];
				}
         $output .=
		 '<tr>
			<td>'.$hasil["nama"].'</td>		
			<td>Rp '.$presmi.'('.$hasil["datepresmi"].')</td>		
			<td>Rp '.$hasil["ck"].'('.$hasil["dateck"].')</td>
			<td>'.$jualck.'('.$hasil["datejualck"].')</td>
			<td><input type="button" name="edit" value="Edit" id="'.$hasil["id"].'" class="btn btn-primary edit_data" /></td> 
	</tr>  ';  
             }  
             $output .= '</table>';  
        }  
        echo $output;  
 }  
 ?>
 
