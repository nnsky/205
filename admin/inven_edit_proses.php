<?php
include "../koneksi.php";
$stock=$_POST['stock'];
$terpakai=$_POST['terpakai'];
$rusak=$_POST['rusak'];
$catatan=$_POST['catatan'];

$user=$_POST['user'];

$lokasi=$_POST['lokasi'];
$kode_produk=$_POST['kode_produk'];
$jenis=$_POST['jenis'];
$type=$_POST['type'];

$count=count($stock)-1;

for ($i=0;$i<=$count;$i++){
  $sql=mysqli_query($conn,"select *from inven_stock where jenis='$jenis' &&  type='$type' && kode_produk='$kode_produk[$i]' && lokasi='$lokasi[$i]' && stock='$stock[$i]' && terpakai='$terpakai[$i]' && rusak='$rusak[$i]' && catatan ='$catatan[$i]' ");

    if($sql->num_rows<=0){
        $update=$conn->query("update inven_stock set stock='$stock[$i]',terpakai='$terpakai[$i]',rusak='$rusak[$i]',catatan='$catatan[$i]',user='$user' where jenis='$jenis' &&  type='$type' && kode_produk='$kode_produk[$i]' && lokasi='$lokasi[$i]'");
    }else{

    }

}

echo "<script type='text/javascript'>alert('Berhasil')</script>
              <script>setTimeout(function(){location.href='inven_edit?edit=".$jenis.'/'.$type."'} , 1); </script>";

?>
