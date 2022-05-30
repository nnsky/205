<?php include "../koneksiremote.php"; 
$nama=$_POST['nama']; 
$nota=$_POST['nota'];
$cabang=$_POST['cabang']; 
$kupon=strtoupper($_POST['kupon']);
date_default_timezone_set('asia/jakarta');

$cek=mysqli_query($conn,"select *from produk where kupon_aktif='$kupon'");
 if($cek->num_rows<=0){
    echo "<script type='text/javascript'>alert('Gagal. Kode Kupon : $kupon Tidak Ada Atau Sudah Terpakai')</script>
            <script>setTimeout(function(){location.href='kupon'} , 1); </script>";
}else{
    $cek1=mysqli_fetch_array($cek);
    if($cek1['stock']==0){
        
       echo "<script type='text/javascript'>alert('Gagal. Kode Kupon : $kupon Tidak Dapat Dipakai')</script>
        <script>setTimeout(function(){location.href='kupon'} , 1); </script>";
    }else{
		$pakai=$cek1['pakai']+1;
		$nomor=sprintf("%02d",$pakai+1);
		
		if($cek1["kode_kupon"] == "CKBEKASI2109"){
			$kodekupon=$cek1["kode_kupon"];
		}else {
			$kodekupon=$cek1['kode_kupon'].$nomor;
		}
		
		echo $kodekupon;
		
        $date=date('j M y G:i');
        $id=$cek1['id'];
        $stock=$cek1['stock']-1;
        $jenis=$cek1['nama'];
        
      $insertpakai=$conn->query("insert into pakai (nama,email,kode_kupon,cabang,date,jenis) values ('$nama','$nota','$kupon','$cabang','$date','$jenis')");
       $updatekupon=$conn->query("update produk set pakai='$pakai',kupon_aktif='$kodekupon',stock='$stock' where id='$id'");
    
        echo "<script type='text/javascript'>alert('Berhasil')</script>
                <script>setTimeout(function(){location.href='kupon'} , 1); </script>";
    }
    
   
}

