<?php
include('../koneksi.php'); 
$bulan=$_POST['bulan'];
$tahun=$_POST['tahun'];
$lokasi=$_POST['lokasi'];

$tanggal=$bulan.'-'.$tahun.',';

$select="SELECT tanggal,kategori,nama,nota,untuk,pesan,tanggapan from respon where tanggal like '%$tanggal%'";

$result = mysqli_query($conn, $select);
if (!$result) die('Couldn\'t fetch records');
$num_fields = mysqli_num_fields($result);

$headers ="";
while ($property = mysqli_fetch_field($result)) {
    $headers.= $property->name.",";
}
$headers.="\n";
 
$fp = fopen('php://output', 'w');
if ($fp && $result) {
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="Laporan Instore.csv"');
    header('Pragma: no-cache');
    header('Expires: 0');
    fputcsv($fp, $headers);
    while ($row = $result->fetch_array(MYSQLI_NUM)) {
        fputcsv($fp, array_values($row));
   
 }
    die;
}
?>
