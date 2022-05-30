<?php
$perihal=$_POST["perihal"];
include('../koneksi.php');

$bulan=$_POST['bulan'];
$tahun=$_POST["tahun"];
$hasil=$tahun.$bulan;
$perihal=$_POST["perihal"];
if($perihal=="cabang"){
$select="SELECT voucher,seri,lokasi,exp,user from voucher where bulan=$hasil";
}elseif($perihal=="konsumen"){
$select="SELECT voucher,seri,nota,total,lokasi,user from voucherck where bulan=$hasil";
}elseif($perihal=="kembali"){
$select="SELECT seri,lokasi,user,tanggal from notifvoucher where bulan=$hasil";
}

$result = mysqli_query($conn, $select);
if (!$result){
header("location:vm.php");
}
$num_fields = mysqli_num_fields($result);

$headers ="";
while ($property = mysqli_fetch_field($result)) {
    $headers.= $property->name.",";
}
$headers.="\n";
 
$fp = fopen('php://output', 'w');
if ($fp && $result) {
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="Laporan.csv"');
    header('Pragma: no-cache');
    header('Expires: 0');
    fputcsv($fp, $headers);
    while ($row = $result->fetch_array(MYSQLI_NUM)) {
        fputcsv($fp, array_values($row));
   
 }
    die;
}

?>


