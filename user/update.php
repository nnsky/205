<?php  
include '../koneksi.php';
 if(!empty($_POST))  
 {  
      $output = '';  
      $message = '';  
      $presmi = mysqli_real_escape_string($conn, $_POST["presmi"]);
	  $ck=mysqli_real_escape_string($conn,$_POST["ck"]);
	  $tokped=mysqli_real_escape_string($conn,$_POST["tokped"]);
	  $linktokped=mysqli_real_escape_string($conn,$_POST["linktokped"]);
	  $tokoped=mysqli_real_escape_string($conn,$_POST["tokotokped"]);
	  $bl=mysqli_real_escape_string($conn,$_POST["bl"]);
	  $linkbl=mysqli_real_escape_string($conn,$_POST["linkbl"]);
	  $tokob=mysqli_real_escape_string($conn,$_POST["tokobl"]);
	  $lazada=mysqli_real_escape_string($conn,$_POST["lazada"]);
	  $linklazada=mysqli_real_escape_string($conn,$_POST["linklazada"]);
	  $tokola=mysqli_real_escape_string($conn,$_POST["tokolazada"]);
	  $userck=mysqli_real_escape_string($conn,$_POST["user"]);
	  $id=mysqli_real_escape_string($conn,$_POST["hasil_id"]);
	  $halaman=mysqli_real_escape_string($conn,$_POST["halaman"]);
	  $date=date('dm');
	  if($id != '')  
      {  
	$sql="SELECT * FROM harga where id = '$id'";
		$query1 = mysqli_query($conn, $sql);
		$hasil=mysqli_fetch_array($query1);
  
		if($ck == $hasil['ck'] && $userck==$hasil['userck']){
	$cks=$ck;
	$userck=$hasil['userck'];
	$dateck=$hasil['dateck'];
	
}else{
	$cks=$ck;
	$userck=$userck;
	$dateck=$date;
	
}
if($tokped == $hasil['tokped'] && $linktokped==$hasil['linktokped'] && $tokoped==$hasil['tokotokped']){
	$tokpeds=$tokped;
	$linktokpeds=$linktokped;
	$usertokped=$hasil['usertok'];
	$datetokped=$hasil['datetokped'];
	$tokotokped=$hasil['tokotokped'];
}else{
	$tokpeds=$tokped;
	$linktokpeds=$linktokped;
	$usertokped=$userck;
	$datetokped=$date;
	$tokotokped=$tokoped;
}
if($bl == $hasil['bl'] && $linkbl==$hasil['linkbl'] && $tokob==$hasil['tokobl']){
	$bls=$bl;
	$linkbls=$linkbl;
	$userbl=$hasil['userbl'];
	$datebl=$hasil['datebl'];
	$tokobl=$hasil['tokobl'];
}else{
	$bls=$bl;
	$linkbls=$linkbl;
	$userbl=$userck;
	$datebl=$date;
	$tokobl=$tokob;
}
if($lazada == $hasil['lazada'] && $linklazada==$hasil['linklazada'] && $tokola==$hasil['tokolazada']){
	$lazadas=$lazada;
	$linklazadas=$linklazada;
	$userlazada=$hasil['userlazada'];
	$datelazada=$hasil['datelazada'];
	$tokolazada=$hasil['tokolazada'];
}else{
	$lazadas=$lazada;
	$linklazadas=$linklazada;
	$userlazada=$userck;
	$datelazada=$date;
	$tokolazada=$tokola;
}
	$presmi=$_POST['presmi'];
if($hasil['presmi']==$presmi){
	$presmi1=$presmi;
	$userpresmi=$hasil['userpresmi'];
}else{
	$presmi1=$presmi;
	$userpresmi=$userck;
}
$cks1= str_replace(".", "", $cks);
if($presmi==0 or $presmi==null){
		$disctokped="0%";
		$discbl="0%";
		$disclazada="0%";
	}else{
		$tokped1= str_replace(".", "", $tokpeds);
		$presmi1= str_replace(".", "", $presmi);
		$bl1= str_replace(".", "", $bls);
		$lazada1= str_replace(".", "", $lazadas);
		
		$a=(1-($tokped1/$presmi1))*100;
		$disctokped=number_format($a,2,'.',',')."%";
		$b=(1-($bl1/$presmi1))*100;
		$discbl=number_format($b,2,'.',',')."%";
		$c=(1-($lazada1/$presmi1))*100;
		$disclazada=number_format($c,2,'.',',')."%";
	};

		if($tokpeds==0 or $tokpeds==null){
			$tokpedst=999999999;
		}else
			$tokpedst=$tokped1;
		if($bls==0 or $bls==null){
			$blst=999999999;
		}else
			$blst=$bl1;
		if($lazadas==0 or $lazadas==null){
			$lazadast=999999999;
		}else
			$lazadast=$lazada1;

		$a=min($cks1,$tokpedst,$blst,$lazadast);
		if($a==$cks1){
			$status="Termurah";
		}else
			$status="Bersaing";
	$query="UPDATE harga SET ck = '$cks',tokped='$tokpeds',linktokped='$linktokpeds',bl ='$bls',linkbl='$linkbls',lazada = '$lazadas',linklazada = '$linklazadas',presmi='$presmi',userpresmi='$userpresmi',dateck = '$dateck',datetokped = '$datetokped',datebl='$datebl',datelazada='$datelazada',userck = '$userck',usertok = '$usertokped',userbl = '$userbl',userlazada = '$userlazada',status ='$status',disctok='$disctokped',discbl='$discbl',disclazada='$disclazada',tokotokped='$tokotokped',tokobl='$tokobl',tokolazada='$tokolazada' Where id ='$id'";
		//$conn->query($sql);
		
		   // $query = "  
           // UPDATE harga
           // SET presmi='$presmi',ck='$ck',tokped='$tokped',bl='$bl' 
           // WHERE id='".$_POST["hasil_id"]."'";  
           $message = 'Data Updated';
		   
      }  
      else  
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
             }else if($_POST['type']=='harga'){
			$select_query = "SELECT * FROM harga LIMIT ".$limit_start.",".$limit;	 
			 }
			 $result = mysqli_query($conn, $select_query);  
             $output .= '  
                  <table class="table table-bordered">  
                               <tr>  
                                <th class="a">Nama</th>
								<th class="b">Harga CK</th>
								<th class="e">Tokopedia</th>
								<th class="q">Bukalapak</th>
								<th class="">Lazada</th>
								<th class="h">Action</th>    
                               </tr>  
             ';  
             while($hasil = mysqli_fetch_array($result))  
             {  
		 if($hasil['tokped']==0 or $hasil['tokped']==null){
	$tokped='0 ('.$hasil["datetokped"].')';
	}else{
	$b=$hasil['tokped'];
	$tokped='<a href="'.$hasil["linktokped"].'" target="_blank">Rp '.$hasil["tokped"].'('.$hasil["datetokped"].')</a>';
	}
	if($hasil['bl']==0 or $hasil['bl']==null){
	
	$bl='0 ('.$hasil["datebl"].')';
	}else{
	$c=$hasil['bl'];
	$bl='<a href="'.$hasil["linkbl"].'" target="_blank">Rp '.$hasil["bl"].'('.$hasil["datebl"].')</a>';
	}
	if($hasil['lazada']==0 or $hasil['lazada']==null){
	$lazada='0 ('.$hasil["datelazada"].')';
	}else{
	$lazada='<a href="'.$hasil["linklazada"].'" target="_blank">Rp '.$hasil["lazada"].'('.$hasil["datelazada"].')</a>';
	$d=$hasil['lazada'];
	};
	
	if($hasil['status']== "Termurah"){
		$style='black';
	}else{
		$style='red';
	};
         $output .=
		 '<tr style="color:'.$style.'">
	<td>'.$hasil["nama"].'</td>		
	 <td>Rp '.$hasil["ck"].'('.$hasil["dateck"].')</td>
	 <td>'.$tokped.'</td>
	 <td>'.$bl.'</td>
	 <td>'.$lazada.'</td>
	 <td><input type="button" name="edit" value="'.$hasil["status"].'"id="'.$hasil["id"].'" class="btn btn-primary edit_data" /></td>
	</tr>  ';  
             }  
             $output .= '</table>';  
        }  
        echo $output;  
 }  
 ?>
 
